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
                    <h4 class="card-title"> Company Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/company/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Company Name
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Created Date
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $company)
                        <tr>
                            <td>{{  $company->name }}</td>
                            <td>{{  $status[$company->status] }}</td>
                            <td>{{  date("d M, Y" ,strtotime($company->created_at)) }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/company/edit/{{$company->company_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <!-- <a href="/company/delete/{{$company->company_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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