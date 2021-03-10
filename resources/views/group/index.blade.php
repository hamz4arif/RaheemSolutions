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
                    <h5 class="card-title h5"> Group Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/group/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                     <th>
                        Group Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Department
                      </th>
                      <th>
                        alias
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
                    @foreach ($models as $group)
                        <tr>
                            <td>{{  $group->name }}</td>
                            <td>{{  $group->email }}</td>
                            <td>{{  isset($department[$group->department_id]) ? $department[$group->department_id]->name : '' }}</td>
                            <td>{{  $group->alias }}</td>
                            <td>{{  isset($status[$group->status]) ? $status[$group->status] : '' }}</td>
                            <td>{{  $group->description }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/group/edit/{{$group->group_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/group/delete/{{$group->group_id}}"><button class="btn btn-danger" type="button">Delete</button></a>
                              <!-- <a href="/group/delete/{{$group->group_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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