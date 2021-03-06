@if(isset($model->campaign_id))
<form action="{{ url('/campaign/modify/'.$model->campaign_id, [])  }}" method="POST">
@else
<form action="{{ url('/campaign/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Campaign</label>
      <input type="text" class="form-control inputbox" id="validationDefault01" placeholder="Campaign Name" value="{{$model->campaign_name}}" name="name">
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control mainselectbox" id="exampleFormControlSelect1" name="status">
              @foreach($status as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->status) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">  
      <label for="validationDefault05">Description</label>
      <input type="text" class="form-control inputbox" id="validationDefault04" value="{{$model->description}}" placeholder="Description" name="description" >
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  <a href="/campaign/index" class="btn btn-primary">Back</a>
</form>