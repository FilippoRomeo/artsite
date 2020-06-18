@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3>New name</h3>
    </div>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops! </strong> there where some problems with your input.<br>
    <ul>
      @foreach ($errors as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{route('profile.store')}}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <strong>Name:</strong>
        <input class="form-control" id="name" placeholder="Name" name="name"/>
      </div>
      <div class="col-md-12">
        <strong>Located in: </strong>
        <input class="form-control"  id="from" placeholder="In what city do you live?" name="from" />
      </div>
      <div class="col-md-12">
        <strong>Movement: </strong>
        <input class="form-control" id="movement" placeholder="What is the movement that you work on?" name="movement" />
      </div>
      <div class="col-md-12">
        <strong>When did you start? </strong>
        <input class="form-control" id="active_period" placeholder="Since?" name="active_period" />
      </div>
      <div class="col-md-12">
        <strong>Bio: </strong>
        <textarea id="bio" placeholder="Bio" name="bio" class="form-control" rows="4" cols="150" require></textarea>
      </div>

      <div class="col-md-12">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-success">Back</a>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      </div>
    </div>
  </form>

</div>
@endsection