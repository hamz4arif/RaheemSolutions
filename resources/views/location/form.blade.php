@if(isset($model->location_id))
<form action="{{ url('/location/modify/'.$model->location_id, [])  }}" method="POST">
@else
<form action="{{ url('/location/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Location</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Location Name" value="{{$model->name}}" name="name"required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Zone</label>
            <select class="form-control" id="exampleFormControlSelect1" name="zone">
                @foreach($zone as $key => $zo)
                <option value="{{$key}}" {{ ( $key == $model->zone_id) ? 'selected' : '' }}>{{$zo->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Location Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="location_type">
              @foreach($type as $key => $ty)
                <option value="{{$key}}" {{ ( $key == $model->location_type) ? 'selected' : '' }}>{{$ty}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
              @foreach($status as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->status) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Alias</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->alias}}" placeholder="Alias" name="alias" required>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Region</label>
            <select class="form-control" id="exampleFormControlSelect1" name="region">
              @foreach($region as $key => $re)
                <option value="{{$key}}" {{ ( $key == $model->region_id) ? 'selected' : '' }}>{{$re}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 mb-3">  
      <label for="validationDefault05">Description</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->description}}" placeholder="Description" name="description" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>