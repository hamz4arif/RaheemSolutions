<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\status;
use App\Models\Ticket;

class statusController extends Controller
{
    function index()
    {
        $status_array = status::all();
        return view('status.index', [
            "status_array" => $status_array,
        ]);
    }
    function create()
    {
        $model = new status();
        return view('status.create',[
            'model'=>$model,
        ]);
    }
    function save(Request $request){
        $status=new status();
        $status->name=$request->post('status_name');
        if($status->save()){

            return redirect('status/index');
        }
    }
    public function edit($id){
        $model=status::find($id);
        return view('status/change',[
            "model"=>$model,
        ]);
    }
    public function modify(Request $request,$id){
        $model=status::find($id);
        $model->name=$request->post('status_name');
        $model->save();
        return redirect('/status/index');
    }
    function delete($id){
        $model=status::find($id);
        $model->delete();
        return redirect("/status/index");

    }
}
