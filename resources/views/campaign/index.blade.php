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
                    <h4 class="card-title"> Campaign Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/campaign/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Campaign Name
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Date
                      </th>
                      <th class="text-right">
                        action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $campaign)
                    <tr>
                            <td>{{  $campaign->campaign_name }}</td>
                            <td>{{  isset($status[$campaign->status]) ? $status[$campaign->status] : '' }}</td>
                            <td>{{  $campaign->description }}</td>    
                            <td>{{  date("d M, Y" ,strtotime($campaign->created_at)) }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/campaign/edit/{{$campaign->campaign_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/campaign/delete/{{$campaign->campaign_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                              <!-- <a href="/campaign/delete/{{$campaign->campaign_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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