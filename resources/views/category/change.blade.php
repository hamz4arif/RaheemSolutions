@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())


@section('content')
    <div class="row bg-light">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Update Category</h4>
              </div>
              <div class="card-body">
                    @include('category.form',[
                        'model' => $model,
                        'status' => $status,
                        'sla' => $sla,
                        'type' => $type,
                        'client' => $client,
                        'client_id' => $client_id,
                        'type_id' => $type_id
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection