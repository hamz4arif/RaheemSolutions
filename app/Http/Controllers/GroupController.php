<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Department;

class GroupController extends Controller
{
    public function index()
    {
        $department_array = Department::all()->keyBy('dprt_id');
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $models = Group::all();


        return view('group.index', [
            'models' => $models,
            'department' => $department_array,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $department_array = Department::all()->keyBy('dprt_id');
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = new Group;
        return view('group.create', [
            'model' => $model,
            'department' => $department_array,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $department_array = Department::all()->keyBy('dprt_id');
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = Group::where('group_id', $id)
            ->firstOrFail();
        return view('group.change', [
            'model' => $model,
            'department' => $department_array,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Group();
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        $model->department_id = $request->post('department');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/group/index');
    
    }

    public function modify($id,Request $request){
        $model = Group::where('group_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        $model->department_id = $request->post('department');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->description = $request->post('description');
        $model->save();

        return redirect('/group/index');
    
    }

    public function delete($id){
        $model = Group::find($id);
        $model->delete();
        return redirect('/group/index');
    }
}
