@extends('layouts.master')

@section('title', 'Raheem Solutions')

@section('username', \Illuminate\Support\Facades\Auth::user()->getName())

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">

        <div class="row">
          <div class="col-sm-8">
            <a href="/ticket/index" class="btn btn-primary {{request()->is('ticket/index')?"active":""}}">ALL Tickets</a>
            <a href="/ticket/index/Not Started" class="btn btn-primary {{request()->is("ticket/index/Not"." "."Started")?"active":""}} ">Not Started</a>
            <a href="/ticket/index/In Progress" class="btn btn-primary {{request()->is("ticket/index/In"." "."Progress")?"active":""}}">In Progress</a>
            <a href="/ticket/index/Resolved" class="btn btn-primary {{request()->is("ticket/index/Resolved")?"active":""}}">Resolved</a>
            <a href="/ticket/index/Reopen" class="btn btn-primary {{request()->is("ticket/index/Reopen")?"active":""}}">Reopen</a>
            <a href="/ticket/index/Closed" class="btn btn-primary {{request()->is("ticket/index/Closed")?"active":""}}">Closed</a>
          </div>
          

          <div class="col-sm-4 text-right">
            <a href="/ticket/create"><button type="button" class="btn btn-success">Create</button></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @include('tickets.filter_tickets',[
        ])
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
@endsection