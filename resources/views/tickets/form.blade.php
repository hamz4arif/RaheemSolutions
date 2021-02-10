@if(isset($model->id))
<form action="{{ url('/ticket/modify/'.$model->id, [])  }}" method="POST" enctype="multipart/form-data">
@else
<form action="{{ url('/ticket/save', [])  }}" method="POST" enctype="multipart/form-data">
@endif
@csrf
  <div class="form-row">
  <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Staff</label>
            <select class="form-control" id="exampleFormControlSelect1" name="staff_id">
              @foreach($staff as $key => $st)
                <option value="{{$st->staff_id}}" {{ ( $st->staff_id == $model->staff_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
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
            <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type_id">
              @foreach($type as $key => $st)
                <option value="{{$st->type_id}}" {{ ( $st->type_id == $model->type_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Distribution</label>
            <select class="form-control" id="exampleFormControlSelect1" name="destribution_id">
              @foreach($distribution as $key => $st)
                <option value="{{$st->id}}" {{ ( $st->id == $model->destribution_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Source</label>
            <select class="form-control" id="exampleFormControlSelect1" name="source">
              @foreach($source as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->source) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Department</label>
            <select class="form-control" id="exampleFormControlSelect1" name="department_id">
              @foreach($department as $key => $st)
                <option value="{{$st->dprt_id}}" {{ ( $st->dprt_id == $model->department_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Approval</label>
            <select class="form-control" id="exampleFormControlSelect1" name="approval">
              @foreach($approval as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->approval) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Ticket Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="ticket_type">
              @foreach($tickettype as $key => $st)
                <option value="{{$key}}" {{ ( $key == $model->ticket_type) ? 'selected' : '' }}>{{$st}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Ticket Counter</label>
      <input type="number" class="form-control" id="validationDefault04" value="{{$model->ticket_counter}}" placeholder="Ticket Counter" name="ticket_counter" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Subject</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->subject}}" placeholder="Subject" name="subject" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Description</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{$model->description}}" placeholder="Description" name="description" required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Priority</label>
            <select class="form-control" id="exampleFormControlSelect1" name="priority_id">
            @foreach($priority as $key => $st)
                <option value="{{$st->priority_id}}" {{ ( $st->priority_id == $model->priority_id) ? 'selected' : '' }}>{{$st->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
    @if($model->image_name != "")
    <label for="link">Upload Publication File: ({{$model->image_name}})</label>
    @else
    <label for="validationDefault04">file</label>
    @endif
      <input type="file" class="form-control" id="validationDefault04" value="{{$model->image_name}}" placeholder="Image" name="image_name">
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>