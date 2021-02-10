@if(isset($model->group_id))
<form action="{{ url('/group/modify/'.$model->group_id, [])  }}" method="POST">
@else
<form action="{{ url('/group/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Group</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Group Name" value="{{$model->name}}" name="name"required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
              @foreach($status as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->status) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Alias</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->alias}}" placeholder="Alias" name="alias" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Description</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->description}}" placeholder="Description" name="description" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->email}}" placeholder="Email" name="email" required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="department">
              @foreach($department as $key => $st)
                <option value="{{$st->dprt_id}}" {{ ( $st->dprt_id == $model->department_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>