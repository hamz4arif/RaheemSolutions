<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Company;
use App\Models\Asm;
use App\Models\Zone;
use App\Models\location;

class StaffController extends Controller
{
    public function index()
    {
        $zone_array = Zone::all()->keyBy('id');
        $roles = Asm::all()->keyBy('role_id');
        $department_array =Department::all()->keyBy('dprt_id');
        $company_array =Company::all()->keyBy('company_id');
        $models = Staff::all();


        return view('staff.index', [
            'models' => $models,
            'zone' => $zone_array,
            'roles' => $roles,
            'departments' => $department_array,
            'company' => $company_array,
        ]);
    }

    public function create(){
        $location_array = location::all()->keyBy('location_id');
        $zone_array = Zone::all()->keyBy('id');
        $roles = Asm::all()->keyBy('role_id');
        $department_array =Department::all()->keyBy('dprt_id');
        $company_array =Company::all()->keyBy('company_id');
        $model = new Staff;
        return view('staff.create', [
            'model' => $model,
            'location' => $location_array,
            'zone' => $zone_array,
            'roles' => $roles,
            'departments' => $department_array,
            'company' => $company_array,
        ]);
    }

    public function edit($id){
        $location_array = location::all()->keyBy('location_id');
        $zone_array = Zone::all()->keyBy('id');
        $roles = Asm::all()->keyBy('role_id');
        $department_array =Department::all()->keyBy('dprt_id');
        $company_array =Company::all()->keyBy('company_id');
        $model = Staff::where('staff_id', $id)
            ->firstOrFail();
        return view('staff.change', [
            'model' => $model,
            'location' => $location_array,
            'zone' => $zone_array,
            'roles' => $roles,
            'departments' => $department_array,
            'company' => $company_array,
        ]);
    }

    public function save(Request $request){

        $model = new Staff();
        $model->name = $request->post('name');
        $model->username = $request->post('username');
        $model->zones = $request->post('zone');
        $model->password = $request->post('password');
        $model->country = $request->post('country');
        $model->location_id = $request->post('location');
        $model->email = $request->post('email');
        $model->mobile = $request->post('mobile');
        $model->phone = $request->post('phone');
        $model->phone_ext = $request->post('phone_ext');
        $model->department = $request->post('department');
        $model->company = $request->post('company');
        $model->address = $request->post('address');
        $model->roles = $request->post('role');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/staff/index');
    
    }

    public function modify($id,Request $request){
        $model = Staff::where('staff_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->username = $request->post('username');
        $model->zones = $request->post('zone');
        $model->password = $request->post('password');
        $model->country = $request->post('country');
        $model->location_id = $request->post('location');
        $model->email = $request->post('email');
        $model->mobile = $request->post('mobile');
        $model->phone = $request->post('phone');
        $model->phone_ext = $request->post('phone_ext');
        $model->department = $request->post('department');
        $model->company = $request->post('company');
        $model->address = $request->post('address');
        $model->roles = $request->post('role');
        $model->save();

        return redirect('/staff/index');
    
    }

    public function delete($id){
        $model = Staff::find($id);
        $model->delete();
        return redirect('/staff/index');
    }
}
