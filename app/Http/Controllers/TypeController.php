<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Purpose;
use App\Models\Item;
use App\Models\TypeItem;

class TypeController extends Controller
{
    public function index()
    {
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $purpose_array = Purpose::all()->keyBy('id');
        $models = Type::all();


        return view('type.index', [
            'models' => $models,
            'purpose' => $purpose_array,
            'status' => $status_array,
        ]);
    }

    public function create(){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $purpose_array = Purpose::all()->keyBy('id');
        $item_array = Item::all()->keyBy('id');
        $model = new Type;
        return view('type.create', [
            'model' => $model,
            'purpose' => $purpose_array,
            'status' => $status_array,
            'item' => $item_array
        ]);
    }

    public function edit($id){
        $status_array = array("0"=>"Enable","1"=>"Disable");
        $purpose_array = Purpose::all()->keyBy('id');
        $item_array = Item::all()->keyBy('id');
        $model = Type::find($id);
        
        $type_items = $model->item;
        $type_items_id = array();
        foreach ($type_items as $value) {
            $type_items_id[] = $value->pivot->item_id;
        }

        return view('type.change', [
            'model' => $model,
            'purpose' => $purpose_array,
            'status' => $status_array,
            'item' => $item_array,
            'item_id' => $type_items_id
        ]);
    }

    public function save(Request $request){

        $model = new Type();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->purpose_id = $request->post('purpose');
        $model->description = $request->post('description');
        $model->created_at = date('Y-m-d H:i:s');
        if($model->save()){
            if(!empty($request->post('item'))){
                foreach($request->post('item') as $item_id){
                    $TypeItemmodel = new TypeItem();
                    $TypeItemmodel->type_id = $model->type_id;
                    $TypeItemmodel->item_id = $item_id;
                    $TypeItemmodel->save();
                }
            }
        }

        return redirect('/type/index');
    
    }

    public function modify($id,Request $request){
        $model = Type::where('Type_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->status = $request->post('status');
        $model->alias = $request->post('alias');
        $model->purpose_id = $request->post('purpose');
        $model->description = $request->post('description');
        if($model->save()){
            TypeItem::where('type_id',$id)->delete();
            if(!empty($request->post('item'))){
                foreach($request->post('item') as $item_id){
                    $TypeItemmodel = new TypeItem();
                    $TypeItemmodel->type_id = $model->type_id;
                    $TypeItemmodel->item_id = $item_id;
                    $TypeItemmodel->save();
                }
            }
        }

        return redirect('/type/index');
    
    }

    public function delete($id){
        $model = Type::find($id);
        $model->delete();
        TypeItem::where('type_id',$id)->delete();
        return redirect('/type/index');
    }
}
