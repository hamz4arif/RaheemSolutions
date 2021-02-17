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
                    <h4 class="card-title"> Category Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/category/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Category
                      </th>
                      <th>
                        Alias
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Created at
                      </th>
                      <th>
                        SLA
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $cat)
                        <tr>
                            <td>{{  $cat->name }}</td>
                            <td>{{  $cat->alias }}</td>
                            <td>{{  $status[$cat->status] }}</td>
                            <td>{{  $cat->created_at }}</td>
                            <td>{{  $cat->sla }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/category/edit/{{$cat->category_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/category/delete/{{$cat->category_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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