@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())


@section('content')
    <div class="row bg-light">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Update Location</h4>
              </div>
              <div class="card-body">
                    @include('location.form',[
                        'model' => $model,
                        'zone' => $zone,
                        'type' => $type,
                        'status' => $status,
                        'region' => $region,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection