<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\location;
use App\Models\Campaign;
use App\Models\UserLocation;
use App\Models\UserCampaign;

class ClientController extends Controller
{
    protected $slab_arr;
    public function __construct()
    {
        $this->slab_arr = array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
    }
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $slab_array = $this->slab_arr;
        $location_array = location::all()->keyBy('location_id');
        $campaign_array = Campaign::all()->keyBy('campaign_id');
        $models = Client::all();


        return view('client.index', [
            'models' => $models,
            'slab' => $slab_array,
            'status' => $status_array,
            'location'=>$location_array,
            'campaign'=>$campaign_array
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $slab_array = $this->slab_arr;
        $location_array = location::all()->keyBy('location_id');
        $campaign_array = Campaign::all()->keyBy('campaign_id');

        $model = new Client;
        return view('client.create', [
            'model' => $model,
            'slab' => $slab_array,
            'status' => $status_array,
            'location'=>$location_array,
            'campaign'=>$campaign_array
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $slab_array = $this->slab_arr;
        $location_array = location::all()->keyBy('location_id');
        $campaign_array = Campaign::all()->keyBy('campaign_id');
        $model = Client::find($id);

        $client_locations = $model->locations;
        $client_campaigns = $model->campaign;
        $client_campaigns_id = array();
        $client_locations_id = array();
        foreach ($client_campaigns as $value) {
            $client_campaigns_id[] = $value->pivot->campaign_id;
        }
        foreach ($client_locations as $value) {
            $client_locations_id[] = $value->pivot->location_id;
        }
        return view('client.change', [
            'model' => $model,
            'slab' => $slab_array,
            'status' => $status_array,
            'location'=>$location_array,
            'campaign'=>$campaign_array,
            'location_id'=>$client_locations_id,
            'campaign_id'=>$client_campaigns_id
        ]);
    }

    public function save(Request $request){

        $model = new Client();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->slabs = $request->post('slab');
        if($model->save()){
            if(!empty($request->post('campaign'))){
                foreach($request->post('campaign') as $camp_id){
                    $UserCampaignmodel = new UserCampaign();
                    $UserCampaignmodel->client_id = $model->clients_id;
                    $UserCampaignmodel->campaign_id = $camp_id;
                    $UserCampaignmodel->save();
                }
            }
            if(!empty($request->post('location'))){
                foreach($request->post('location') as $loc_id){
                    $UserCampaignmodel = new UserLocation();
                    $UserCampaignmodel->client_id = $model->clients_id;
                    $UserCampaignmodel->campaign_id = $loc_id;
                    $UserCampaignmodel->save();
                }
            }
        }

        return redirect('/client/index');
    
    }

    public function modify($id,Request $request){
        $model = Client::find($id);
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->slabs = $request->post('slab');
        if($model->save()){
            UserCampaign::where('client_id',$id)->delete();
            UserLocation::where('client_id',$id)->delete();
            if(!empty($request->post('campaign'))){
                foreach($request->post('campaign') as $camp_id){
                    $UserCampaignmodel = new UserCampaign();
                    $UserCampaignmodel->client_id = $model->clients_id;
                    $UserCampaignmodel->campaign_id = $camp_id;
                    $UserCampaignmodel->save();
                }
            }
            if(!empty($request->post('location'))){
                foreach($request->post('location') as $loc_id){
                    $UserCampaignmodel = new UserLocation();
                    $UserCampaignmodel->client_id = $model->clients_id;
                    $UserCampaignmodel->campaign_id = $loc_id;
                    $UserCampaignmodel->save();
                }
            }
        }

        return redirect('/client/index');
    
    }

    public function delete($id){
        $model = Client::find($id);
        $model->delete();
        UserCampaign::where('client_id',$id)->delete();
        UserLocation::where('client_id',$id)->delete();
        return redirect('/client/index');
    }
}
