@if(isset($model->clients_id))
<form action="{{ url('/client/modify/'.$model->clients_id, [])  }}" method="POST">
@else
<form action="{{ url('/client/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Client</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Client Name" value="{{$model->name}}" name="name"required>
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
        <div class="form-group">
            <label for="exampleFormControlSelect1">Slab</label>
            <select class="form-control" id="exampleFormControlSelect1" name="slab">
              @foreach($slab as $key => $sl)
                <option value="{{$key}}" {{ ( $key == $model->slabs) ? 'selected' : '' }}>{{$sl}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>