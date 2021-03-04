@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())

@section('content')
    <div class="row bg-light">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Update Ticket</h4>
              </div>
              <div class="card-body">
                    @include('tickets.form',[
                        'currentuser'=>$currentuser,
                        'model' => $model,
                        'priority' => $priority,
                        'department' => $department,
                        'source' => $source,
                        'distribution' => $distribution,
                        'type' => $type,
                        'category' => $category,
                        'staff' => $staff,
                        'approval' => $approval,
                        'tickettype' => $tickettype,
                        'comments_array' => $comments_array,
                        'user_array' => $user_array
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection