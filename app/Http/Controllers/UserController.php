<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $company = Company::all()->keyBy('company_id');
        $models = User::all();


        return view('user.index', [
            'models' => $models,
            'status' => $company,
        ]);
    }

    public function create(){
        $model = new User;
        $company = Company::all()->keyBy('company_id');
        return view('user.create', [
            'model' => $model,
            'company' => $company,
        ]);
    }

    public function edit($id){
        $model = User::find($id);
        $company = Company::all()->keyBy('company_id');
        return view('user.change', [
            'model' => $model,
            'company' => $company,
        ]);
    }

    public function save(Request $request){

        $model = new User();
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        if($request->post('password') != ""){
            $model->password = Hash::make($request->post('password'));
        }
        $model->company_id = $request->post('company');
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        $model->save();
        return redirect('/user/index');
    
    }

    public function modify($id,Request $request){
        $model = User::find($id);
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        if($request->post('password') != ""){
            $model->password = Hash::make($request->post('password'));
        }
        $model->company_id = $request->post('company');
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        $model->save();
        $model->save();

        return redirect('/user/index');
    
    }

    public function delete($id){
        $model = User::find($id);
        $model->delete();
        return redirect('/user/index');
    }
}
