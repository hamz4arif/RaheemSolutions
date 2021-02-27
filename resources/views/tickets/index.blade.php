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
                    <h4 class="card-title"> Ticket Table</h4>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="/ticket/create"><button type="button" class="btn btn-success">Create</button></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Type
                      </th>
                      <th>
                        Source
                      </th>
                      <th>
                        Staff Name
                      </th>
                      <th>
                        Created at
                      </th>
                      <th>
                        Ticket Counter
                      </th>
                      <th>
                        Subject
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Priority
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td>{{  isset($type[$model->type_id]) ? $type[$model->type_id]->name : '' }}</td>
                            <td>{{  isset($source[$model->source]) ? $source[$model->source] : '' }}</td>
                            <td>{{  isset($staff[$model->staff_id]) ? $staff[$model->staff_id]->name : '' }}</td>
                            <td>{{  date('d M, Y H:i:s', strtotime($model->created_at))}}</td>
                            <td>{{  isset($model->ticket_counter) ? $model->ticket_counter : '' }}</td>
                            <td>{{  isset($model->subject) ? $model->subject : '' }}</td>
                            <td>{{  isset($model->description) ? $model->description : '' }}</td>
                            <td>{{  isset($priority[$model->priority_id]) ? $priority[$model->priority_id]->name : '' }}</td>
                            <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/ticket/edit/{{$model->id}}"><button type="button" class="btn btn-info">Update</button></a>
                              <!-- <a href="/ticket/delete/{{$model->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
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