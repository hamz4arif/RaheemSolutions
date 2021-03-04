@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())
<!-- @section('style')
<link rel="stylesheet" href="{{ asset('css/ticketstyle.css') }}">
<!-- <link rel="stylesheet" href="css/ticketstyle.css"> -->
@endsection -->

@section('content')
<div class="row bg-light">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <a class="btn btn-primary " href="/ticket/index"> <i class="fas fa-arrow-left fa-1x"></i>View All Tickets</a>
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
                'user_array' => $user_array,
                ])
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection