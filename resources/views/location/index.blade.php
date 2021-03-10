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
                    <h5 class="card-title h5"> Location Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/location/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Location Name
                      </th>
                      <th>
                        Alias
                      </th>
                      <th>
                        Zone
                      </th>
                      <th>
                        Region
                      </th>
                      <th>
                        Location Type
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Created at
                      </th>
                      <th>
                        Description
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $location)
                        <tr>
                            <td>{{  $location->name }}</td>
                            <td>{{  $location->alias }}</td>
                            <td>{{  isset($zone[$location->zone_id]) ? $zone[$location->zone_id]->name : '' }}</td>
                            <td>{{  isset($region[$location->region_id]) ? $region[$location->region_id] : '' }}</td>
                            <td>{{  isset($type[$location->location_type]) ? $type[$location->location_type] : '' }}</td>
                            <td>{{  isset($status[$location->status]) ? $status[$location->status] : '' }}</td>
                            <td>{{  date("d M, Y" ,strtotime($location->created_at)) }}</td>
                            <td>{{  $location->description }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/location/edit/{{$location->location_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/location/delete/{{$location->location_id}}"><button class="btn btn-danger" type="button">Delete</button></a>
                              <!-- <a href="/location/delete/{{$location->location_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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