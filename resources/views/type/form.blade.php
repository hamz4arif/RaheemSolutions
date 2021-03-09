@if(isset($model->type_id))
<form action="{{ url('/type/modify/'.$model->type_id, [])  }}" method="POST">
@else
<form action="{{ url('/type/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Type</label>
      <input type="text" class="form-control inputbox" id="validationDefault01" placeholder="Type Name" value="{{$model->name}}" name="name">
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
      <label for="validationDefault04">Alias</label>
      <input type="text" class="form-control inputbox" id="validationDefault04" value="{{$model->alias}}" placeholder="Alias" name="alias" >
    </div>
  </div>
  <div class="form-row">


    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Purpose</label>
            <select class="form-control mainselectbox" id="exampleFormControlSelect1" name="purpose">
              @foreach($purpose as $key => $sl)
                <option value="{{$key}}" {{ ( $key == $model->purpose_id) ? 'selected' : '' }}>{{$sl->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Description</label>
      <input type="text" class="form-control inputbox" id="validationDefault04" value="{{$model->alias}}" placeholder="Description" name="description" >
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Item</label>
            <select class="form-control mainselectbox multi-select" id="exampleFormControlSelect1" name="item[]" multiple>
              @foreach($item as $key => $sl)
                @if(!empty($item_id) && in_array($key,$item_id))
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
  <a href="/type/index" class="btn btn-primary">Back</a>
</form>