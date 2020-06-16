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
        <strong>Title : </strong> {{$udata->title}}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <strong>Description : </strong> {{$udata->description}}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <strong>Image : </strong> {{$udata->link}}
      </div>
    </div>
    <div class="col-md-12">
      <a href="{{route('profile.index')}}" class="btn btn-sm btn-success">Back</a>
    </div>
  </div>
</div>
@endsection