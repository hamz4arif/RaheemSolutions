<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use App\Models\Zone;

class LocationController extends Controller
{
    public function index()
    {
        $zone_array = array("1"=>"North","2"=>"South","3"=>"East","4"=>"West");
        $location_type_array = array("0"=>"Metro","1"=>"Outstanding");
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $region_array = array("0"=>"Region 1","1"=>"Region 2");
        $models = location::all();


        return view('location.index', [
            'models' => $models,
            'zone' => $zone_array,
            'type' => $location_type_array,
            'status' => $status_array,
            'region' => $region_array,
        ]);
    }

    public function create(){
        $zone_array = array("1"=>"North","2"=>"South","3"=>"East","4"=>"West");
        $location_type_array = array("0"=>"Metro","1"=>"Outstanding");
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $region_array = array("0"=>"Region 1","1"=>"Region 2");
        $model = new location;
        return view('location.create', [
            'model' => $model,
            'zone' => $zone_array,
            'type' => $location_type_array,
            'status' => $status_array,
            'region' => $region_array,
        ]);
    }

    public function edit($id){
        $zone_array = array("1"=>"North","2"=>"South","3"=>"East","4"=>"West");
        $location_type_array = array("0"=>"Metro","1"=>"Outstanding");
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $region_array = array("0"=>"Region 1","1"=>"Region 2");
        $model = location::where('location_id', $id)
            ->firstOrFail();
        return view('location.change', [
            'model' => $model,
            'zone' => $zone_array,
            'type' => $location_type_array,
            'status' => $status_array,
            'region' => $region_array,
        ]);
    }

    public function save(Request $request){

        $model = new location();
        $model->name = $request->post('name');
        $model->zone_id = $request->post('zone');
        $model->location_type = $request->post('location_type');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->region_id = $request->post('region');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/location/index');
    
    }

    public function modify($id,Request $request){
        $model = location::where('location_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->zone_id = $request->post('zone');
        $model->location_type = $request->post('location_type');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->region_id = $request->post('region');
        $model->description = $request->post('description');
        $model->save();

        return redirect('/location/index');
    
    }

    public function delete($id){
        $model = location::find($id);
        $model->delete();
        return redirect('/location/index');
    }

}
