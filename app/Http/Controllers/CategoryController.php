<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Client;
use App\Models\Type;
use App\Models\CategoryClient;
use App\Models\CategoryType;

class CategoryController extends Controller
{
    public function index()
    {
       
        $models = Category::all();
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $sla_array = array("0"=>"Enable","1"=>"Disable");
            

        return view('category.index', [
            'models' => $models,
            'status' => $status_array,
            'sla' => $sla_array,
        ]);
    }

    public function create(){
       
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $sla_array = array("0"=>"Enable","1"=>"Disable");
        $type_array = Type::all()->keyBy('type_id');
        $client_array = Client::all()->keyBy('clients_id');

        $model = new Category;
        return view('category.create', [
            'model' => $model,
            'status' => $status_array,
            'sla' => $sla_array,
            'type' => $type_array,
            'client' => $client_array
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $sla_array = array("0"=>"Enable","1"=>"Disable");
        $type_array = Type::all()->keyBy('type_id');
        $client_array = Client::all()->keyBy('clients_id');
        $model = Category::find($id);
        
        $category_client = $model->client;
        $category_type = $model->type;
        $category_client_id = array();
        $category_type_id = array();
        foreach ($category_client as $value) {    
            $category_client_id[] = $value->pivot->client_id;
        }
        foreach ($category_type as $value) {
            $category_type_id[] = $value->pivot->type_id;
        }
        return view('category.change', [
            'model' => $model,
            'status' => $status_array,
            'sla' => $sla_array,
            'type' => $type_array,
            'client' => $client_array,
            'client_id' => $category_client_id,
            'type_id' => $category_type_id
        ]);
    }

    public function save(Request $request){

        $model = new Category();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->sla = $request->post('sla');
        $model->created_at = date('Y-m-d H:i:s');
        if($model->save()){
            if(!empty($request->post('client'))){
                foreach($request->post('client') as $client_id){
                    $categoryClientmodel = new CategoryClient();
                    $categoryClientmodel->client_id = $client_id;
                    $categoryClientmodel->category_id = $model->category_id;
                    $categoryClientmodel->save();
                }
            }
            if(!empty($request->post('type'))){
                foreach($request->post('type') as $type_id){
                    $categoryTypemodel = new CategoryType();
                    $categoryTypemodel->type_id = $type_id;
                    $categoryTypemodel->category_id = $model->category_id;
                    $categoryTypemodel->save();
                }
            }
        }

        return redirect('/category/index');
    
    }

    public function modify($id,Request $request){
        $model = Category::where('category_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->sla = $request->post('sla');
        $model->created_at = date('Y-m-d H:i:s');
        if($model->save()){
            CategoryClient::where('category_id',$id)->delete();
            CategoryType::where('category_id',$id)->delete();
            if(!empty($request->post('client'))){
                foreach($request->post('client') as $client_id){
                    $categoryClientmodel = new CategoryClient();
                    $categoryClientmodel->client_id = $client_id;
                    $categoryClientmodel->category_id = $model->category_id;
                    $categoryClientmodel->save();
                }
            }
            if(!empty($request->post('type'))){
                foreach($request->post('type') as $type_id){
                    $categoryTypemodel = new CategoryType();
                    $categoryTypemodel->type_id = $type_id;
                    $categoryTypemodel->category_id = $model->category_id;
                    $categoryTypemodel->save();
                }
            }
        }

        return redirect('/category/index');
    
    }

    public function delete($id){
        $model = Category::find($id);
        $model->delete();
        CategoryClient::where('category_id',$id)->delete();
        CategoryType::where('category_id',$id)->delete();
        return redirect('/category/index');
    }

}
