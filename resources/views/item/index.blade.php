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
                    <h5 class="card-title h5"> Item Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/item/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Item Name
                      </th>
                      <th>
                        Alias
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
                    @foreach ($models as $item)
                        <tr>
                            <td>{{  $item->name }}</td>
                            <td>{{  $item->alias }}</td>
                            <td>{{  isset($status[$item->status]) ? $status[$item->status] : '' }}</td>
                            <td>{{  $item->description }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/item/edit/{{$item->id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/item/delete/{{$item->id}}" class="btn btn-danger">Delete</a>
                              <!-- <a href="/item/delete/{{$item->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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