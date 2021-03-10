@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())


@section('content')
    <div class="row bg-light">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title h5"> Update Department</h5>
              </div>
              <div class="card-body">
                    @include('department.form',[
                        'model' => $model,
                        'tab' => $tab,
                        'type' => $type,
                        'status' => $status
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection