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
                    <h5 class="card-title h5"> SLA Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/sla/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        SLA
                      </th>
                      <th>
                        time
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Group
                      </th>
                      <th>
                        Created at
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $sla)
                        <tr>
                            <td>{{  $sla->name }}</td>
                            <td>{{  $sla->time }}</td>
                            <td>{{  isset($status[$sla->status]) ? $status[$sla->status] : '' }}</td>
                            <td>{{  isset($group[$sla->group_id]) ? $group[$sla->group_id]->name : '' }}</td>
                            <td>{{  date("d M, Y" ,strtotime($sla->created_at)) }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/sla/edit/{{$sla->id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/sla/delete/{{$sla->id}}"><button class="btn btn-primary" type="button">Delete</button></a>
                              <!-- <a href="/sla/delete/{{$sla->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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