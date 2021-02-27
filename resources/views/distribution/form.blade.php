@if(isset($model->id))
<form action="{{ url('/distribution/modify/'.$model->id, [])  }}" method="POST">
@else
<form action="{{ url('/distribution/save', [])  }}" method="POST">
@endif
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Distribution</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Distribution Name" value="{{$model->name}}" name="name">
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Location</label>
            <select class="form-control" id="exampleFormControlSelect1" name="location_id">
              @foreach($location as $key => $st)
                <option value="{{$st->location_id}}" {{ ( $st->location_id == $model->location_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Username</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->username}}" placeholder="Username" name="username" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Password</label>
      <input type="password" class="form-control" id="validationDefault04" value="{{$model->password}}" placeholder="Password" name="password" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">City</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->city}}" placeholder="City" name="city" >
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Area Manager</label>
            <select class="form-control" id="exampleFormControlSelect1" name="area_manager">
              @foreach($user as $key => $st)
                <option value="{{$st->id}}" {{ ( $st->id == $model->area_manager) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->email}}" placeholder="Email" name="email" >
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Email Password</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->email_password}}" placeholder="Email Password" name="email_password" >
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Number</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->number}}" placeholder="Number" name="number" >
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Distributor ID</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->distributor_id}}" placeholder="Distributor ID" name="distributor_id" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">NPDMS Release</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->npdms_release}}" placeholder="NPDMS Release" name="npdms_release" >
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Staff</label>
            <select class="form-control" id="exampleFormControlSelect1" name="staff_id">
            @foreach($user as $key => $st)
                <option value="{{$st->id}}" {{ ( $st->id == $model->staff_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Company</label>
            <select class="form-control" id="exampleFormControlSelect1" name="company_id">
              @foreach($company as $key => $st)
                <option value="{{$st->company_id}}" {{ ( $st->company_id == $model->company) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Description</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->description}}" placeholder="Description" name="description" >
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
              @foreach($category as $key => $st)
                <option value="{{$st->category_id}}" {{ ( $st->category_id == $model->category_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Slab</label>
            <select class="form-control" id="exampleFormControlSelect1" name="slab">
              @foreach($slab as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->slab) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">KPO Name</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->kpo_name}}" placeholder="KPO" name="kpo_name" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">KPO Number</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->kpo_number}}" placeholder="KPO Number" name="kpo_number" >
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
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type">
              @foreach($type as $key => $st)
                <option value="{{$st->type_id}}" {{ ( $st->type_id == $model->type) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Business Class</label>
      <input type="number" class="form-control" id="validationDefault04" value="{{$model->business_class}}" placeholder="Business Class" name="business_class" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">System Count</label>
      <input type="number" class="form-control" id="validationDefault04" value="{{$model->system_count}}" placeholder="System Count" name="system_count" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">System CPU</label>
      <input type="number" class="form-control" id="validationDefault04" value="{{$model->system_cpu}}" placeholder="System CPU" name="system_cpu" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">System Ram</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->system_ram}}" placeholder="System Ram" name="system_ram" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">System HDD</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->system_hdd}}" placeholder="System HDD" name="system_hdd" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Operating System</label>
      <input type="number" class="form-control" id="validationDefault04" value="{{$model->operating_system}}" placeholder="Operating System" name="operating_system" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Android Device Count</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->android_device_count}}" placeholder="Android Device Count" name="android_device_count" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Auto Pilot</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->auto_pilot}}" placeholder="Auto Pilot" name="auto_pilot" >
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">New Release</label>
      <input type="number" class="form-control" id="validationDefault04" value="{{$model->new_release}}" placeholder="New Release" name="new_release" >
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>