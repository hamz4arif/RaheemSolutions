@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())


@section('content')
    <div class="row bg-light">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title h5"> Update Client</h5>
              </div>
              <div class="card-body">
                    @include('client.form',[
                        'model' => $model,
                        'slab' => $slab,
                        'status' => $status,
                        'location'=>$location,
                        'campaign'=>$campaign,
                        'location_id'=>$location_id,
                        'campaign_id'=>$campaign_id
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection