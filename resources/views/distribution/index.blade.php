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
                    <h4 class="card-title"> Distribution Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/distribution/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Distribution Name
                      </th>
                      <th>
                        Location
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        City
                      </th>
                      <th>
                        Area Manager
                      </th>
                      <th>
                        Staff Name
                      </th>
                      <th>
                        Company
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Slab
                      </th>
                      <th>
                        number
                      </th>
                      <th>
                        email
                      </th>
                      <th>
                        KPO
                      </th>
                      <th>
                        Category
                      </th>
                      <th>
                        Company
                      </th>
                      <th>
                        Description
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $distribution)
                        <tr>
                            <td>{{  $distribution->name }}</td>
                            <td>{{  isset($location[$distribution->location_id]) ? $location[$distribution->location_id]->name : '' }}</td>
                            <td>{{  $distribution->username }}</td>
                            <td>{{  $distribution->city }}</td>
                            <td>{{  isset($user[$distribution->area_manager]) ? $user[$distribution->area_manager]->name : '' }}</td>
                            <td>{{  isset($user[$distribution->staff_id]) ? $user[$distribution->staff_id]->name : '' }}</td>
                            <td>{{  isset($company[$distribution->company_id]) ? $company[$distribution->company_id]->name : '' }}</td>
                            <td>{{  isset($status[$distribution->status]) ? $status[$distribution->status] : '' }}</td>
                            <td>{{  $slab[$distribution->slab] }}</td>
                            <td>{{  $distribution->number }}</td>
                            <td>{{  $distribution->email }}</td>
                            <td>{{  $distribution->kpo_name }}</td>
                            <td>{{  $distribution->kpo_number }}</td>
                            <td>{{  $distribution->description }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/distribution/edit/{{$distribution->id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/distribution/delete/{{$distribution->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                              <!-- <a href="/distribution/delete/{{$distribution->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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