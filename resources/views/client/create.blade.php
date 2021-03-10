@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())


@section('content')
    <div class="row bg-light">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title h5"> Create Client</h5>
              </div>
              <div class="card-body">
                    @include('client.form',[
                        'model' => $model,
                        'slab' => $slab,
                        'status' => $status,
                        'location'=>$location,
                        'campaign'=>$campaign
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection