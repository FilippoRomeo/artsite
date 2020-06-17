@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3>Edit name</h3>
    </div>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops! </strong> check for errors!<br>
    <ul>
      @foreach ($errors as $error)
      <?php var_dump("<li>{{$error}}</li>") ?>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{route('profile.update',$udata->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">

      <div class="col-md-12">
        <strong>Name : </strong>
        <input type="text" name="name" id="name" class="form-control" value="{{$udata->name}}">
      </div>
      <div class="col-md-12">
        <strong>Located in : </strong>
        <input class="form-control" name="from" id="from" value="{{$udata->from}}" />
      </div>
      <div class="col-md-12">
        <strong>Movement : </strong>
        <input class="form-control" name="movement" id="movement" value="{{$udata->movement}}" />
      </div>
      <div class="col-md-12">
        <strong>Started activity in: </strong>
        <input class="form-control" name="active_period" id="active_period" value="{{$udata->active_period}}" />
      </div>
      <div class="col-md-12">
        <strong>Small bio: </strong>
        <input class="form-control" name="bio" id="name" value="{{$udata->bio}}" />
      </div>

      <div class="col-md-12">
        <a href="{{route('profile.index')}}" class="btn btn-sm btn-success">Back</a>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection