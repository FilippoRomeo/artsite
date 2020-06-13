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
        <strong>Whoops! </strong> there where some problems with your input.<br>
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
          <strong>Nama Siswa :</strong>
          <input type="text" name="title" class="form-control" value="{{$udata->title}}">
        </div>
        <div class="col-md-12">
          <strong>Alamat Siswa :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$udata->description}}</textarea>
        </div>
        <div class="col-md-12">
          <strong>Alamat Siswa :</strong>
          <textarea class="form-control" name="link" rows="4" cols="80">{{$udata->link}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('profile.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection