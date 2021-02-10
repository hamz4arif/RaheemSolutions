@extends('layouts.master')

@section('title', 'Raheem Solutions')
@section('username', \Illuminate\Support\Facades\Auth::user()->getName())

@section('content')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h4 class="card-title"> Client Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/client/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Name
                      </th>
                      <th>
                        Alias
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Slab
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $client)
                        <tr>
                            <td>{{  $client->name }}</td>
                            <td>{{  $client->alias }}</td>
                            <td>{{  $status[$client->status] }}</td>
                            <td>{{  $slab[$client->slabs] }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/client/edit/{{$client->clients_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/client/delete/{{$client->clients_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
    
@endsection