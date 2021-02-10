<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $models = Item::all();


        return view('item.index', [
            'models' => $models,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = new Item;
        return view('item.create', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $model = Item::where('id', $id)
            ->firstOrFail();
        return view('item.change', [
            'model' => $model,
            'status' => $status_array,
        ]);
    }

    public function save(Request $request){

        $model = new Item();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/item/index');
    
    }

    public function modify($id,Request $request){
        $model = Item::where('id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/item/index');
    
    }

    public function delete($id){
        $model = Item::find($id);
        $model->delete();
        return redirect('/item/index');
    }
}
