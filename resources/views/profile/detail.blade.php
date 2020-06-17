@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Detail Siswa</h3>
      <hr>
    </div>
  </div>
  <div class="row">
  
    <div class="col-md-12">
      <div class="form-group">
        <strong>Name : </strong> {{$udata->name}}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <strong>Located in : </strong> {{$udata->from}}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <strong>Movement : </strong> {{$udata->movement}}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <strong>Started activity in: </strong> {{$udata->active_period}}
      </div>
    </div><div class="col-md-12">
      <div class="form-group">
        <strong>Small bio: </strong> {{$udata->bio}}
      </div>
    </div>
    <div class="col-md-12">
      <a href="/" class="btn btn-sm btn-success">Back</a>
    </div>
  </div>
</div>
@endsection