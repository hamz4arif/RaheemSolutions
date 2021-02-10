<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asm;

class AsmController extends Controller
{
    public function index()
    {
        $models = Asm::all();


        return view('asm.index', [
            'models' => $models,
        ]);
    }

    public function create(){
        $model = new Asm;
        return view('asm.create', [
            'model' => $model,
        ]);
    }

    public function edit($id){
        $model = Asm::where('role_id', $id)
            ->firstOrFail();
        return view('asm.change', [
            'model' => $model,
        ]);
    }

    public function save(Request $request){

        $model = new Asm();
        $model->name = $request->post('name');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();

        return redirect('/asm/index');
    
    }

    public function modify($id,Request $request){
        $model = Asm::where('role_id', $id)
        ->firstOrFail();
        $model->name = $request->post('name');
        $model->save();

        return redirect('/asm/index');
    
    }

    public function delete($id){
        $model = Asm::find($id);
        $model->delete();
        return redirect('/asm/index');
    }
}
