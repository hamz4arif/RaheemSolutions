@if(isset($model->staff_id))
<form action="{{ url('/staff/modify/'.$model->staff_id, [])  }}" method="POST">
@else
<form action="{{ url('/staff/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Staff</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Staff Name" value="{{$model->name}}" name="name"required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Zone</label>
            <select class="form-control" id="exampleFormControlSelect1" name="zone">
              @foreach($zone as $key => $st)
                <option value="{{$st->id}}" {{ ( $st->id == $model->zones) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Username</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->username}}" placeholder="Username" name="username" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Password</label>
      <input type="password" class="form-control" id="validationDefault04" value="{{$model->password}}" placeholder="Password" name="password" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Country</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->country}}" placeholder="Country" name="country" required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Location</label>
            <select class="form-control" id="exampleFormControlSelect1" name="location">
              @foreach($location as $key => $st)
                <option value="{{$st->location_id}}" {{ ( $st->location_id == $model->location_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->email}}" placeholder="Email" name="email" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Mobile</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->mobile}}" placeholder="Mobile" name="mobile" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Phone</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->phone}}" placeholder="Phone" name="phone" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Phone Ext</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->phone_ext}}" placeholder="Phone Ext" name="phone_ext" required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Department</label>
            <select class="form-control" id="exampleFormControlSelect1" name="department">
              @foreach($departments as $key => $st)
                <option value="{{$st->dprt_id}}" {{ ( $st->dprt_id == $model->department) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Company</label>
            <select class="form-control" id="exampleFormControlSelect1" name="company">
              @foreach($company as $key => $st)
                <option value="{{$st->company_id}}" {{ ( $st->company_id == $model->company) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Address</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->address}}" placeholder="Address" name="address" required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control" id="exampleFormControlSelect1" name="role">
              @foreach($roles as $key => $st)
                <option value="{{$st->role_id}}" {{ ( $st->role_id == $model->roles) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>