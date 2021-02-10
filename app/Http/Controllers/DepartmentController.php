<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $tab_array = array("0"=>"Enable","1"=>"Disable");
        $type_array = array("0"=>"User","1"=>"Staff");
        $models = Department::all();


        return view('department.index', [
            'models' => $models,
            'tab' => $tab_array,
            'type' => $type_array,
            'status' => $status_array
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $tab_array = array("0"=>"Enable","1"=>"Disable");
        $type_array = array("0"=>"User","1"=>"Staff");
        $model = new Department;
        return view('department.create', [
            'model' => $model,
            'tab' => $tab_array,
            'type' => $type_array,
            'status' => $status_array
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $tab_array = array("0"=>"Enable","1"=>"Disable");
        $type_array = array("0"=>"User","1"=>"Staff");
        $model = Department::where('dprt_id', $id)
            ->firstOrFail();
        return view('department.change', [
            'model' => $model,
            'tab' => $tab_array,
            'type' => $type_array,
            'status' => $status_array
        ]);
    }

    public function save(Request $request){

        $model = new Department();
        $model->name = $request->post('name');
        $model->type = $request->post('type');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->view_tab = $request->post('tab');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/department/index');
    
    }

    public function modify($id,Request $request){
        $model = Department::where('dprt_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->type = $request->post('type');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->view_tab = $request->post('tab');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/department/index');
    
    }

    public function delete($id){
        $model = Department::find($id);
        $model->delete();
        return redirect('/department/index');
    }
}
