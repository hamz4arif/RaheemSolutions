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
                    <h5 class="card-title h5"> Priority Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/priority/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Priority
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Base SLA
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Created at
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $priority)
                        <tr>
                            <td>{{  $priority->name }}</td>
                            <td>{{  isset($status[$priority->status]) ? $status[$priority->status] : '' }}</td>
                            <td>{{  $priority->base_sla }}</td>
                            <td>{{  $priority->description }}</td>
                            <td>{{  date("d M, Y" ,strtotime($priority->created_at)) }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/priority/edit/{{$priority->priority_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/priority/delete/{{$priority->priority_id}}" class="btn btn-danger">Delete</a>
                              <!-- <a href="/priority/delete/{{$priority->priority_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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