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
                    <h4 class="card-title"> Staff Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/staff/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Staff Name
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        email
                      </th>
                      <th>
                        Location
                      </th>
                      <th>
                        Mobile
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Department
                      </th>
                      <th>
                        Company
                      </th>
                      <th>
                        Roles
                      </th>
                      <th>
                        Zone
                      </th>
                      <th>
                      Address
                      </th>
                      <th class="text-right">
                      Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $staff)
                        <tr>
                            <td>{{  $staff->name }}</td>
                            <td>{{  $staff->username }}</td>
                            <td>{{  $staff->country }}</td>
                            <td>{{  $staff->email }}</td>
                            <td>{{  $staff->staff }}</td>
                            <td>{{  $staff->mobile }}</td>
                            <td>{{  $staff->phone }}</td>
                            <td>{{  $departments[$staff->department]->name }}</td>
                            <td>{{  $company[$staff->company]->name }}</td>
                            <td>{{  $roles[$staff->roles]->name }}</td>
                            <td>{{  $zone[$staff->zones]->name }}</td>
                            <td>{{  $staff->address }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/staff/edit/{{$staff->staff_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/staff/delete/{{$staff->staff_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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