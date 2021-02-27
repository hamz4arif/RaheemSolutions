@if(isset($model->id))
<form action="{{ url('/sla/modify/'.$model->id, [])  }}" method="POST">
@else
<form action="{{ url('/sla/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">SLA</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="SLA Name" value="{{$model->name}}" name="name">
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
      <label for="validationDefault04">Time</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->time}}" placeholder="(hh:mm:ss)" name="time" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Group</label>
            <select class="form-control" id="exampleFormControlSelect1" name="group">
              @foreach($group as $key => $st)
                <option value="{{$st->group_id}}" {{ ( $st->group_id == $model->group_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Location</label>
            <select class="form-control multi-select" id="exampleFormControlSelect1" name="location[]" multiple>
              @foreach($location as $key => $sl)
                @if(!empty($location_id) && in_array($key,$location_id))
                <option value="{{$key}}" selected>{{$sl->name}}</option>
                @else
                <option value="{{$key}}">{{$sl->name}}</option>
                @endif
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>