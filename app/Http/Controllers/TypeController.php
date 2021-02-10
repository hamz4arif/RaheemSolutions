<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $purpose_array = array("0"=>"Region 1","1"=>"Region 2");
        $models = Type::all();


        return view('type.index', [
            'models' => $models,
            'purpose' => $purpose_array,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $purpose_array = array("0"=>"Region 1","1"=>"Region 2");
        $model = new Type;
        return view('type.create', [
            'model' => $model,
            'purpose' => $purpose_array,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $purpose_array = array("0"=>"Region 1","1"=>"Region 2");
        $model = Type::where('Type_id', $id)
            ->firstOrFail();
        return view('type.change', [
            'model' => $model,
            'purpose' => $purpose_array,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Type();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->purpose_id = $request->post('purpose');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/type/index');
    
    }

    public function modify($id,Request $request){
        $model = Type::where('Type_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->purpose_id = $request->post('purpose');
        $model->description = $request->post('description');
        $model->save();

        return redirect('/type/index');
    
    }

    public function delete($id){
        $model = Type::find($id);
        $model->delete();
        return redirect('/type/index');
    }
}
