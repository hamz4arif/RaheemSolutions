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
                    <h5 class="card-title h5"> ASM Table</h5>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/asm/create"><button type="button" class="btn btn-success">Create</button></a>
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
                        Created at
                      </th>
                      <th class="text-right">
                      Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $roles)
                        <tr>
                            <td>{{  $roles->name }}</td>
                            <td>{{  date("d M, Y" ,strtotime($roles->created_at)) }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/asm/edit/{{$roles->role_id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <a href="/asm/delete/{{$roles->role_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                              <!-- <a href="/asm/delete/{{$roles->role_id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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