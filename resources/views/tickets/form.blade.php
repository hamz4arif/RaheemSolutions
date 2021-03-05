@if(isset($model->id))
<form action="{{ url('/ticket/modify/'.$model->id, [])  }}" method="POST" enctype="multipart/form-data">
  @else
  <form action="{{ url('/ticket/save', [])  }}" method="POST" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="form-row ">
      <div class="col-md-8 mb-3 ">
        <label for="validationDefault04">Title</label>
        <input type="text" {{$model->user_id && $model->user_id!=$currentuser?"disabled":""}} class=" tickettextbox form-control" id="validationDefault04" value="{{$model->subject}}" placeholder="Title" name="subject">
      </div>
      <div class="col-md-4 mb-3 ">
        <div class="form-group ">
          <label for="exampleFormControlSelect1">Assign to(staff)</label>
          <select multiple class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="staff_id[]">
            @foreach($staff as $key => $st)
            <option value="{{$st->staff_id}}" {{ ( $st->staff_id == $model->staff_id) ? 'selected' : '' }}>{{$st->name}}</option>
            @endforeach

          </select>


        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Category</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="category_id">
            @foreach($category as $key => $st)
            <option value="{{$st->category_id}}" {{ ( $st->category_id == $model->category_id) ? 'selected' : '' }}>{{$st->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="type_id">
            @foreach($type as $key => $st)
            <option value="{{$st->type_id}}" {{ ( $st->type_id == $model->type_id) ? 'selected' : '' }}>{{$st->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Distribution</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="destribution_id">
            @foreach($distribution as $key => $st)
            <option value="{{$st->id}}" {{ ( $st->id == $model->destribution_id) ? 'selected' : '' }}>{{$st->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="form-row">

      <div class="col-md-4 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Source</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="source">
            @foreach($source as $key => $st)
            <option value="{{$key}}" {{ ( $key == $model->source) ? 'selected' : '' }}>{{$st}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Department</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="department_id">
            @foreach($department as $key => $st)
            <option value="{{$st->dprt_id}}" {{ ( $st->dprt_id == $model->department_id) ? 'selected' : '' }}>{{$st->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Approval</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="approval">
            @foreach($approval as $key => $st)
            <option value="{{$key}}" {{ ( $key == $model->approval) ? 'selected' : '' }}>{{$st}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="form-row">

      <div class="col-md-3 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Ticket Type</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="ticket_type">
            @foreach($tickettype as $key => $st)
            <option value="{{$key}}" {{ ( $key == $model->ticket_type) ? 'selected' : '' }}>{{$st}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationDefault04">Ticket Counter</label>
        <input type="number" class="form-control tickettextbox" id="validationDefault04" value="{{$model->ticket_counter}}" placeholder="Ticket Counter" name="ticket_counter">
      </div>
      <div class="col-md-3 mb-3">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Priority</label>
          <select class="form-control tickettextbox ticketinput" id="exampleFormControlSelect1" name="priority_id">
            @foreach($priority as $key => $st)
            <option value=""></option>
            <option value="{{$st->priority_id}}" {{ ( $st->priority_id == $model->priority_id) ? 'selected' : '' }}>{{$st->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        @if($model->image_name != "")
        <label for="link">Upload Publication File: ({{$model->image_name}})</label>
        @else
        <label for="validationDefault04">file</label>
        @endif
        <input type="file" class="form-control tickettextbox" id="validationDefault04" value="{{$model->image_name}}" placeholder="Image" name="image_name">
      </div>

    </div>
    <!-- <div class="form-row">
    
    
  </div> -->
    <div class="form-row">
      <div class="col-md-12">
        <label for="validationDefault04">Description</label>
        <br>
        <textarea {{$model->user_id && $model->user_id!=$currentuser?"disabled":""}} id="validationDefault04" cols="130" rows="5" value="{{$model->description}}" name="description"></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-12">
        <label for="comments">Comments</label>
        <br>
        <textarea name="comment" {{$model->user_id && $model->user_id!=$currentuser?"disabled":""}} id="ticket_comment" cols="130" rows="5"></textarea>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
    <a href="/ticket/index" class="btn btn-primary">Back</a>
  </form>
  @if(!empty($comments_array))
  <div class="col-md-12">
    <div class="card card-plain">
      <div class="card-header">
        <h4 class="card-title"> User Comments</h4>
        <p class="category"> Comments by users are listed here</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                User Name
              </th>
              <th>
                Created at
              </th>
              <th class="text-right">
                Comment
              </th>
            </thead>
            <tbody>
              @foreach ($comments_array as $user)
              <tr>
                <td>{{ isset($user_array[$user->user_id]) ? $user_array[$user->user_id]->name : '' }}</td>
                <td>{{ date('d M, Y H:i:s', strtotime($user->created_at))}}</td>
                <td class="text-right">{{ wordwrap($user->comment, 70, "\n", true) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif