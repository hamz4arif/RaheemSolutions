<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $models = Company::all();


        return view('company.index', [
            'models' => $models,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $model = new Company;
        $status_array = array("0"=>"Enable","1"=>"Disable");
        return view('company.create', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $model = Company::find($id);
        $status_array = array("0"=>"Enable","1"=>"Disable");
        return view('company.change', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Company();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();
        return redirect('/company/index');
    
    }

    public function modify($id,Request $request){
        $model = Company::find($id);
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/company/index');
    
    }

    public function delete($id){
        $model = Company::find($id);
        $model->delete();
        return redirect('/company/index');
    }

}
