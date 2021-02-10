<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Priority;
use App\Models\Department;
use App\Models\Type;
use App\Models\Category;
use App\Models\Staff;
use App\Models\Distribution;

class TicketController extends Controller
{
    public function index()
    {
        $priority_array = Priority::all()->keyBy('priority_id');
        $department_array = Department::all()->keyBy('dprt_id');
        $type_array = Type::all()->keyBy('type_id');
        $staff_array = Staff::all()->keyBy('staff_id');
        $category_array = Category::all()->keyBy('category_id');
        $distribution_array = Distribution::all()->keyBy('id');
        $source_array = array("0"=>"web","1"=>"app");
        $approval_array = array("0"=>"No","1"=>"Yes");
        $tickettype_array = array("0"=>"online","1"=>"on Site");
        $models = Ticket::all();


        return view('tickets.index', [
            'models' => $models,
            'priority' => $priority_array,
            'department' => $department_array,
            'source' => $source_array,
            'distribution' => $distribution_array,
            'type' => $type_array,
            'category' => $category_array,
            'staff' => $staff_array,
            'approval' => $approval_array,
            'tickettype' => $tickettype_array,
        ]);
    }

    public function create(){
        $priority_array = Priority::all()->keyBy('priority_id');
        $department_array = Department::all()->keyBy('dprt_id');
        $type_array = Type::all()->keyBy('type_id');
        $staff_array = Staff::all()->keyBy('staff_id');
        $category_array = Category::all()->keyBy('category_id');
        $distribution_array = Distribution::all()->keyBy('id');
        $source_array = array("0"=>"web","1"=>"app");
        $approval_array = array("0"=>"No","1"=>"Yes");
        $tickettype_array = array("0"=>"online","1"=>"on Site");
        $model = new Ticket;

        return view('tickets.create', [
            'model' => $model,
            'priority' => $priority_array,
            'department' => $department_array,
            'source' => $source_array,
            'distribution' => $distribution_array,
            'type' => $type_array,
            'category' => $category_array,
            'staff' => $staff_array,
            'approval' => $approval_array,
            'tickettype' => $tickettype_array,
        ]);
    }

    public function edit($id){
        $priority_array = Priority::all()->keyBy('priority_id');
        $department_array = Department::all()->keyBy('dprt_id');
        $type_array = Type::all()->keyBy('type_id');
        $staff_array = Staff::all()->keyBy('staff_id');
        $category_array = Category::all()->keyBy('category_id');
        $distribution_array = Distribution::all()->keyBy('id');
        $source_array = array("0"=>"web","1"=>"app");
        $approval_array = array("0"=>"No","1"=>"Yes");
        $tickettype_array = array("0"=>"online","1"=>"on Site");
        $model = Ticket::where('id', $id)
            ->firstOrFail();
        
        return view('tickets.change', [
            'model' => $model,
            'priority' => $priority_array,
            'department' => $department_array,
            'source' => $source_array,
            'distribution' => $distribution_array,
            'type' => $type_array,
            'category' => $category_array,
            'staff' => $staff_array,
            'approval' => $approval_array,
            'tickettype' => $tickettype_array,
        ]);
    }

    public function save(Request $request){

        $model = new Ticket();
        $model->staff_id = $request->post('staff_id');
        $model->category_id = $request->post('category_id');
        $model->type_id = $request->post('type_id');
        $model->destribution_id = $request->post('destribution_id');
        $model->source = $request->post('source');
        $model->department_id = $request->post('department_id');
        $model->approval = $request->post('approval');
        $model->ticket_type = $request->post('ticket_type');
        $model->ticket_counter = $request->post('ticket_counter');
        $model->subject = $request->post('subject');
        $model->description = $request->post('description');
        $model->priority_id = $request->post('priority_id');
        $model->image_name = $request->post('image_name');
        $model->created_at = date('Y-m-d H:i:s');
        $model->save();
        if ($request->hasFile('photo')) {
            $image      = $request->file('photo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            // $img = Image::make($image->getRealPath());
            // $img->resize(120, 120, function ($constraint) {
            //     $constraint->aspectRatio();                 
            // });

            // $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $image, 'public');
        }
        return redirect('/ticket/index');
    
    }

    public function modify($id,Request $request){
        $model = Ticket::where('id', $id)
        ->firstOrFail();
        $model->staff_id = $request->post('staff_id');
        $model->category_id = $request->post('category_id');
        $model->type_id = $request->post('type_id');
        $model->destribution_id = $request->post('destribution_id');
        $model->source = $request->post('source');
        $model->department_id = $request->post('department_id');
        $model->approval = $request->post('approval');
        $model->ticket_type = $request->post('ticket_type');
        $model->ticket_counter = $request->post('ticket_counter');
        $model->subject = $request->post('subject');
        $model->description = $request->post('description');
        $model->priority_id = $request->post('priority_id');
        if ($request->hasFile('image_name')) {
            $image      = $request->file('image_name');
            $model->image_name = $image->hashName();
            $folderName = "uploaded";
            // $img = Image::make($image->getRealPath());
            // $img->resize(120, 120, function ($constraint) {
            //     $constraint->aspectRatio();                 
            // });

            // $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('images/1/smalls'.'/'.$folderName, $image, 'public');
        }
        $model->save();
        return redirect('/ticket/index');
    
    }

    public function delete($id){
        $model = Ticket::find($id);
        $model->delete();
        return redirect('/ticket/index');
    }
}
