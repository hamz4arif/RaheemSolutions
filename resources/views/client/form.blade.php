@if(isset($model->clients_id))
<form action="{{ url('/client/modify/'.$model->clients_id, [])  }}" method="POST">
@else
<form action="{{ url('/client/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Client</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Client Name" value="{{$model->name}}" name="name">
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
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->alias}}" placeholder="Alias" name="alias" >
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
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Campaign</label>
            <select class="form-control multi-select" id="exampleFormControlSelect1" name="campaign[]" multiple>
              @foreach($campaign as $key => $sl)
                @if(!empty($campaign_id) && in_array($key,$campaign_id))
                <option value="{{$key}}" selected>{{$sl->campaign_name}}</option>
                @else
                <option value="{{$key}}">{{$sl->campaign_name}}</option>
                @endif
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>