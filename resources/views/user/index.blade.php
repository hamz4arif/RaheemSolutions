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
                    <h5 class="card-title h5"> Profile</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <!-- <a href="/user/create"><button type="button" class="btn btn-success">Create</button></a> -->
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Created Date
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{  $model->id }}</td>
                            <td>{{  $model->name }}</td>
                            <td>{{  $model->email }}</td>
                            <td>{{  $model->created_at }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/user/edit/{{$model->id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <!-- <a href="/user/delete/{{$model->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
                            </div>
                            </td>
                        </tr>
                    
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