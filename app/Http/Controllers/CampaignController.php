<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $models = Campaign::all();
        $status_array = array("0"=>"Enable","1"=>"Disable");


        return view('campaign.index', [
            'models' => $models,
            'status' => $status_array,
        ]);
    }
    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = new Campaign;
        return view('campaign.create', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = Campaign::find($id);
        return view('campaign.change', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Campaign();
        $model->campaign_name = $request->post('name');
        $model->status = $request->post('status');
        $model->description = $request->post('description');
        $model->save();

        return redirect('/campaign/index');
    
    }

    public function modify($id,Request $request){
        $model = Campaign::find($id);
        $model->campaign_name = $request->post('name');
        $model->status = $request->post('status');
        $model->description = $request->post('description');
        $model->save();

        return redirect('/campaign/index');
    
    }

    public function delete($id){
        $model = Campaign::find($id);
        $model->delete();
        return redirect('/campaign/index');
    }
}
