@if(isset($model->id))
<form action="{{ url('/user/modify/'.$model->id, [])  }}" method="POST">
@else
<form action="{{ url('/user/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Client</label>
      <input type="text" class="form-control inputbox" id="validationDefault01" placeholder="User Name" value="{{$model->name}}" name="name">
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="text" class="form-control inputbox" id="validationDefault04" value="{{$model->email}}" placeholder="Email" name="email" >
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Company</label>
            <select class="form-control mainselectbox" id="exampleFormControlSelect1" name="company">
              @foreach($company as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->company_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    
  </div>
  <div class="form-row">
  <div class="col-md-4 mb-3">
      <label for="validationDefault04">Password</label>
      <input type="text" class="form-control inputbox" id="validationDefault04" value="" placeholder="password" name="password" {{$model->password == "" ? "" : "" }}>
      @if($model->password != "")
        <div>if you want to update password then fill this if not then leave it blank!</div>
      @endif
    </div>
  <div class="col-md-4 mb-3 ">
        <div class="form-group {{\Illuminate\Support\Facades\Auth::user()->role=="admin"||\Illuminate\Support\Facades\Auth::user()->role=="manager"?"":"d-none"}}">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control mainselectbox" id="exampleFormControlSelect1" name="role">
              <option value="guest" {{$model->role=="guest"?"selected":""}}>Guest</option>
              <option value="staff" {{$model->role=="staff"?"selected":""}}>Staff</option>
              <option value="manager" {{$model->role=="manager"?"selected":""}}>Manager</option>
              <option value="admin" {{$model->role=="admin"?"selected":""}}>Admin</option>
            </select>
        </div>
    </div>
   
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  <a href="/user/index" class="btn btn-primary">Back</a>
</form>