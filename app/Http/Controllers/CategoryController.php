<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        $model = new Category;
        return view('category.create', [
            'model' => $model,
            'status' => $status_array,
            'sla' => $sla_array,
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $sla_array = array("0"=>"Enable","1"=>"Disable");
        $model = Category::where('category_id', $id)
            ->firstOrFail();
        return view('category.change', [
            'model' => $model,
            'status' => $status_array,
            'sla' => $sla_array,
        ]);
    }

    public function save(Request $request){

        $model = new Category();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->sla = $request->post('sla');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

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
        $model->save();

        return redirect('/category/index');
    
    }

    public function delete($id){
        $model = Category::find($id);
        $model->delete();
        return redirect('/category/index');
    }

}
