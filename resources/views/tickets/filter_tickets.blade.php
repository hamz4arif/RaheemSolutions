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
        Distribution
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
        Status
      </th>
      <th class="text-right">
        Action
      </th>
    </thead>
    <tbody>
      @foreach ($models as $model)
      <tr style="line-height: 30px;">
        <td class="text-center highlightedTest "><a class="text-decoration-none  " href="/ticket/edit/{{$model->id}}">{{$model->id}}</a></td>
        <td class="highlightedTest"> <a class="text-decoration-none " href="/ticket/edit/{{$model->id}}">{{ isset($model->subject) ? $model->subject : '' }}</a></td>
        <td class="text-center">{{isset($distribution[$model->destribution_id])?$distribution[$model->destribution_id]->name:"" }}</td>
        <td class="text-center">{{ isset($staff[$model->staff_id]) ? $staff[$model->staff_id]->name : '' }}</td>
        <td class="text-center">{{ isset($priority[$model->priority_id]) ? $priority[$model->priority_id]->name : '' }}</td>
        <td class="text-center">{{ isset($type[$model->type_id]) ? $type[$model->type_id]->name : '' }}</td>
        <td class="text-center">{{isset($model->status) ? $model->status : '' }}</td>
        <td class="text-center">
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/ticket/edit/{{$model->id}}" class="px-3"><i  class="fas fa-edit fa-sm "></i></a>&nbsp;
            <!-- <a href="/ticket/delete/{{$model->id}}"><button type="button" class="btn btn-danger">Delete</button></a> -->
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div