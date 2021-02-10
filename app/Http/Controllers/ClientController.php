<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $slab_array = array("0"=>"Enable","1"=>"Disable");
        $models = Client::all();


        return view('client.index', [
            'models' => $models,
            'slab' => $slab_array,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $slab_array = array("0"=>"Enable","1"=>"Disable");
        $model = new Client;
        return view('client.create', [
            'model' => $model,
            'slab' => $slab_array,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $slab_array = array("0"=>"Enable","1"=>"Disable");
        $model = Client::find($id);
        return view('client.change', [
            'model' => $model,
            'slab' => $slab_array,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Client();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->slabs = $request->post('slab');
        $model->save();

        return redirect('/client/index');
    
    }

    public function modify($id,Request $request){
        $model = Client::find($id);
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->slabs = $request->post('slab');
        $model->save();

        return redirect('/client/index');
    
    }

    public function delete($id){
        $model = Client::find($id);
        $model->delete();
        return redirect('/client/index');
    }
}
