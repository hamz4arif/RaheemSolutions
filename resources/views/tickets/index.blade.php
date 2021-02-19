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
                        Distribution
                      </th>
                      <th>
                        Category
                      </th>
                      <th>
                        Type
                      </th>
                      <th>
                        Source
                      </th>
                      <th>
                        Department
                      </th>
                      <th>
                        Staff Name
                      </th>
                      <th>
                        Approval
                      </th>
                      <th>
                        Ticket Type
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
                            <td>{{  $distribution[$model->destribution_id]->name }}</td>
                            <td>{{  $category[$model->category_id]->name }}</td>
                            <td>{{  $type[$model->type_id]->name }}</td>
                            <td>{{  $source[$model->source] }}</td>
                            <td>{{  $department[$model->department_id]->name }}</td>
                            <td>{{  $staff[$model->staff_id]->name }}</td>
                            <td>{{  $approval[$model->approval] }}</td>
                            <td>{{  $tickettype[$model->ticket_type] }}</td>
                            <td>{{  $model->ticket_counter }}</td>
                            <td>{{  $model->subject }}</td>
                            <td>{{  $model->description }}</td>
                            <td>{{  $priority[$model->priority_id]->name }}</td>
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