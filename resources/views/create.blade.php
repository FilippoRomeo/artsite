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

    <form action="{{route('store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Title:</strong>
          <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="col-md-12">
          <strong>Alamat Siswa :</strong>
          <textarea class="form-control" name="description" placeholder="Description" name="description" rows="8" cols="80"></textarea>
        </div>
        <div class="col-md-12">
          <strong>Link:</strong>
          <textarea class="form-control" name="link" placeholder="Link" name="description" rows="8" cols="80"></textarea>
        </div>
        

        <div class="col-md-12">
          <a href="{{route('index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection