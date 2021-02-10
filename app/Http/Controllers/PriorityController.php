<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;

class PriorityController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $models = Priority::all();


        return view('priority.index', [
            'models' => $models,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = new Priority;
        return view('priority.create', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = Priority::where('priority_id', $id)
            ->firstOrFail();
        return view('priority.change', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Priority();
        $model->name = $request->post('name');
        $model->base_sla = $request->post('base_sla');
        $model->status = $request->post('status');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/priority/index');
    
    }

    public function modify($id,Request $request){
        $model = Priority::where('priority_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->base_sla = $request->post('base_sla');
        $model->status = $request->post('status');
        $model->description = $request->post('description');
        $model->save();

        return redirect('/priority/index');
    
    }

    public function delete($id){
        $model = Priority::find($id);
        $model->delete();
        return redirect('/priority/index');
    }
}
