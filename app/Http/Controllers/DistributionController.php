<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribution;
use App\Models\location;
use App\Models\User;
use App\Models\Company;
use App\Models\Type;
use App\Models\Category;

class DistributionController extends Controller
{
    public function index()
    {
        $slab_array = array("0"=>"Enable","1"=>"Disable");
        $location_array = location::all()->keyBy('location_id');
        $user_array = User::all()->keyBy('id');
        $company_array = Company::all()->keyBy('company_id');
        $type_array = Type::all()->keyBy('type_id');
        $category_array = Category::all()->keyBy('category_id');
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $models = Distribution::all();


        return view('distribution.index', [
            'models' => $models,
            'slab' => $slab_array,
            'location' => $location_array,
            'status' => $status_array,
            'user' => $user_array,
            'company' => $company_array,
            'type' => $type_array,
            'category' => $category_array,
        ]);
    }

    public function create(){
        $slab_array = array("0"=>"Enable","1"=>"Disable");
        $location_array = location::all()->keyBy('location_id');
        $user_array = User::all()->keyBy('id');
        $company_array = Company::all()->keyBy('company_id');
        $type_array = Type::all()->keyBy('type_id');
        $category_array = Category::all()->keyBy('category_id');
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = new Distribution;

        return view('distribution.create', [
            'model' => $model,
            'slab' => $slab_array,
            'location' => $location_array,
            'status' => $status_array,
            'user' => $user_array,
            'company' => $company_array,
            'type' => $type_array,
            'category' => $category_array,
        ]);
    }

    public function edit($id){
        $slab_array = array("0"=>"Enable","1"=>"Disable");
        $location_array = location::all()->keyBy('location_id');
        $user_array = User::all()->keyBy('id');
        $company_array = Company::all()->keyBy('company_id');
        $type_array = Type::all()->keyBy('type_id');
        $category_array = Category::all()->keyBy('category_id');
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = Distribution::where('location_id', $id);
        // ->firstOrFail();
        
        return view('distribution.change',
         [
            'model' => $model,
            'slab' => $slab_array,
            'location' => $location_array,
            'status' => $status_array,
            'user' => $user_array,
            'company' => $company_array,
            'type' => $type_array,
            'category' => $category_array,
        ]
    );
    }

    public function save(Request $request){

        $model = new Distribution();
        $model->name = $request->post('name');
        $model->distributor_id = $request->post('distributor_id');
        $model->location_id = $request->post('location_id');
        $model->username = $request->post('username');
        $model->password = $request->post('password');
        $model->city = $request->post('city');
        $model->area_manager = $request->post('area_manager');
        $model->staff_id = $request->post('staff_id');
        $model->company_id = $request->post('company_id');
        $model->status = $request->post('status');
        $model->description = $request->post('description');
        $model->slab = $request->post('slab');
        $model->number = $request->post('number');
        $model->email = $request->post('email');
        $model->email_password = $request->post('email_password');
        $model->kpo_name = $request->post('kpo_name');
        $model->kpo_number = $request->post('kpo_number');
        $model->business_class = $request->post('business_class');
        $model->category_id = $request->post('category_id');
        $model->type = $request->post('type');
        $model->system_count = $request->post('system_count');
        $model->system_cpu = $request->post('system_cpu');
        $model->system_ram = $request->post('system_ram');
        $model->system_hdd = $request->post('system_hdd');
        $model->operating_system = $request->post('operating_system');
        $model->android_device_count = $request->post('android_device_count');
        $model->auto_pilot = $request->post('auto_pilot');
        $model->npdms_release = $request->post('npdms_release');
        $model->new_release = $request->post('new_release');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/distribution/index');
    
    }

    public function modify($id,Request $request){
        $model = Distribution::where('id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->distributor_id = $request->post('distributor_id');
        $model->location_id = $request->post('location_id');
        $model->username = $request->post('username');
        $model->password = $request->post('password');
        $model->city = $request->post('city');
        $model->area_manager = $request->post('area_manager');
        $model->staff_id = $request->post('staff_id');
        $model->company_id = $request->post('company_id');
        $model->status = $request->post('status');
        $model->description = $request->post('description');
        $model->slab = $request->post('slab');
        $model->number = $request->post('number');
        $model->email = $request->post('email');
        $model->email_password = $request->post('email_password');
        $model->kpo_name = $request->post('kpo_name');
        $model->kpo_number = $request->post('kpo_number');
        $model->business_class = $request->post('business_class');
        $model->category_id = $request->post('category_id');
        $model->type = $request->post('type');
        $model->system_count = $request->post('system_count');
        $model->system_cpu = $request->post('system_cpu');
        $model->system_ram = $request->post('system_ram');
        $model->system_hdd = $request->post('system_hdd');
        $model->operating_system = $request->post('operating_system');
        $model->android_device_count = $request->post('android_device_count');
        $model->auto_pilot = $request->post('auto_pilot');
        $model->npdms_release = $request->post('npdms_release');
        $model->new_release = $request->post('new_release');
        $model->save();

        return redirect('/distribution/index');
    
    }

    public function delete($id){
        $model = Distribution::find($id);
        $model->delete();
        return redirect('/distribution/index');
    }
}
