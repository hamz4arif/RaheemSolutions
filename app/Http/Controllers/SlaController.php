<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sla;
use App\Models\Group;

class SlaController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $group_array = Group::all()->keyBy('group_id');
        $models = Sla::all();


        return view('sla.index', [
            'models' => $models,
            'status' => $status_array,
            'group' => $group_array
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $group_array = Group::all()->keyBy('group_id');
        $model = new Sla;
        return view('sla.create', [
            'model' => $model,
            'status' => $status_array,
            'group' => $group_array
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $group_array = Group::all()->keyBy('group_id');
        $model = Sla::where('id', $id)
            ->firstOrFail();
        return view('sla.change', [
            'model' => $model,
            'status' => $status_array,
            'group' => $group_array
        ]);
    }

    public function save(Request $request){

        $model = new Sla();
        $model->name = $request->post('name');
        $model->time = $request->post('time');
        $model->group_id = $request->post('group');
        $model->status = $request->post('status');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/sla/index');
    
    }

    public function modify($id,Request $request){
        $model = Sla::where('id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->time = $request->post('time');
        $model->group_id = $request->post('group');
        $model->status = $request->post('status');
        $model->save();

        return redirect('/sla/index');
    
    }

    public function delete($id){
        $model = Sla::find($id);
        $model->delete();
        return redirect('/sla/index');
    }
}
