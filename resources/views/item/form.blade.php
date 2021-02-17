@if(isset($model->id))
<form action="{{ url('/item/modify/'.$model->id, [])  }}" method="POST">
@else
<form action="{{ url('/item/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Item Name" value="{{$model->name}}" name="name"required>
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
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>