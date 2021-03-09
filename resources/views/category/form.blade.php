@if(isset($model->category_id))
<form action="{{ url('/category/modify/'.$model->category_id, [])  }}" method="POST">
@else
<form action="{{ url('/category/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Category</label>
      <input type="text" class="form-control inputbox" id="validationDefault01" placeholder="Category Name" value="{{$model->name}}" name="name">
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
      <label for="validationDefault04">SLA</label>
      <input type="text" class="form-control inputbox" id="validationDefault04" value="{{$model->sla}}" placeholder="Hour (must be in digit e.g 2,8,10... etc)" name="sla" >
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Clients</label>
            <select class="form-control mainselectbox multi-select" id="exampleFormControlSelect1" name="client[]" multiple>
              @foreach($client as $key => $sl)
                @if(!empty($client_id) && in_array($key,$client_id))
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
            <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control mainselectbox multi-select" id="exampleFormControlSelect1" name="type[]" multiple>
              @foreach($type as $key => $sl)
                @if(!empty($type_id) && in_array($key,$type_id))
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
  <a href="/category/index" class="btn btn-primary">Back</a>
</form>