@if(isset($model->role_id))
<form action="{{ url('/asm/modify/'.$model->role_id, [])  }}" method="POST">
@else
<form action="{{ url('/asm/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Client Name" value="{{$model->name}}" name="name">
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>