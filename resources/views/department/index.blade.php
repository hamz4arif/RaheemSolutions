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
                    <h5 class="card-title h5"> Department Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/department/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Department Name
                      </th>
                      <th>
                        Alias
                      </th>
                      <th>
                        type
                      </th>
                      <th>
                        View Tab
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Description
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $department)
                        <tr>
                            <td>{{  $department->name }}</td>
                            <td>{{  $department->alias }}</td>
                            <td>{{  isset($type[$department->type]) ? $type[$department->type] : '' }}</td>
                            <td>{{  isset($tab[$department->view_tab]) ? $tab[$department->view_tab] : '' }}</td>
                            <td>{{  isset($status[$department->status]) ? $status[$department->status] : '' }}</td>
                            <td>{{  $department->description }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/department/edit/{{$department->dprt_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/department/delete/{{$department->dprt_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                              <!-- <a href="/department/delete/{{$department->dprt_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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