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
                    <a href="/user/create"><button type="button" class="btn btn-success {{\Illuminate\Support\Facades\Auth::user()->getId()==3||\Illuminate\Support\Facades\Auth::user()->getId()==15||\Illuminate\Support\Facades\Auth::user()->getId()==17?"":"hidden"}}">Create</button></a>
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
                      Role
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
                    @foreach ($models as $user)
                        <tr>
                            <td>{{  $user->id }}</td>
                            <td>{{  $user->name }}</td>
                            <td>{{  $user->role }}</td>
                            <td>{{  $user->email }}</td>
                            <td>{{  $user->created_at }}</td>
            
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                             
                              <a href="/user/edit/{{$user->id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <!-- <a href="/user/delete/{{$user->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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