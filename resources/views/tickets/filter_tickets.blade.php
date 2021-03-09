<div class="table-responsive">
  <table class="table" id="tickettable" >
    <thead class=" text-primary">
      <th>
        ID
      </th>
      <th >
        Title
      </th>
      <th>
        Assigned
      </th>
      <th>
        Priority
      </th>
      <th>
        Type
      </th>
      <th>
        Owner
      </th>
      <th>
        Created at
      </th>
      <th class="text-right">
        Action
      </th>
    </thead>
    <tbody>
      @foreach ($models as $model)
      <tr>
        <td>{{$model->id}}</td>
        <td>{{ isset($model->subject) ? $model->subject : '' }}</td>
        <td>{{ isset($staff[$model->staff_id]) ? $staff[$model->staff_id]->name : '' }}</td>
        <td>{{ isset($priority[$model->priority_id]) ? $priority[$model->priority_id]->name : '' }}</td>
        <td>{{ isset($type[$model->type_id]) ? $type[$model->type_id]->name : '' }}</td>
        <td>{{ isset($user_array[$model->user_id]) ? $user_array[$model->user_id]->name : '' }}</td>
        <td>{{ date('d M, Y H:i:s', strtotime($model->created_at))}}</td>
        <td class="text-right">
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/ticket/edit/{{$model->id}}"><button type="button" class="btn btn-info">Update</button></a>&nbsp;
            <!-- <a href="/ticket/delete/{{$model->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div