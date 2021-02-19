@if(isset($model->id))
<form action="{{ url('/user/modify/'.$model->id, [])  }}" method="POST">
@else
<form action="{{ url('/user/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Client</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="User Name" value="{{$model->name}}" name="name"required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Company</label>
            <select class="form-control" id="exampleFormControlSelect1" name="company">
              @foreach($company as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->company) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->email}}" placeholder="Email" name="email" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Password</label>
      @if($model->password != "")
        <div>if you want to update password then fill this if not then leave it blank!</div>
      @endif
      <input type="text" class="form-control" id="validationDefault04" value="" placeholder="password" name="password" {{$model->password == "" ? "required" : "" }}>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>