@extends('layouts.app')
@section('content')

<style>
  div.imagetiles div.col-lg-3.col-md-3.col-sm-3.col-xs-6 {
    padding: 0px !important;
  }

  /* Container holding the image and the text */
  .container {
    position: relative;
    text-align: center;
  }

  /* Centered text */
  .centered {
    position: absolute;
    left: 50%;
    bottom: 8px;
    transform: translate(-50%, -50%);
    color: white;
    background-color: black;
  }
</style>



<div class="container">
  <div class="container">
    <div class="row text-center">
      <div class="col-3">

      @if (\Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>×</span>
                    <span class="sr-only">Close</span>
                </button>

                {!! \Session::get('error') !!}
            </div>
            @endif
            @if (\Session::has('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>×</span>
                    <span class="sr-only">Close</span>
                </button>

                {!! \Session::get('success') !!}
            </div>
            @endif
<?php
if (auth()->user()) {
  $user = auth()->user();
  $userdataid = $udata->id;
  $uid = $user->id;
} else {
  $userdata = null;
  $uid = null;
}
?>
        <div class="col-sm-12">
          <a href="/" class="btn btn-sm btn-primary inline-block">Home</a>
          @if(Gate::check('isAdmin') || Gate::check('update-post', $udata->id, $uid))
          @if(isset($usedataid))
          <a class="btn btn-sm btn-success inline-block" href="{{ route('profile.create') }}">Complete profile</a>
          @endif
          <a class="btn btn-sm btn-warning inline-block" href="{{route('profile.edit',$userdataid)}}">Edit</a>
          <button class="btn btn-sm btn-danger inline-block" data-target="#delete" data-toggle="modal">Delete info</button>

          @endif
        </div>

        <div class="card" style="margin-top: 5%;">
          <div class="card-header">
            <h4><b>Profile</b></h4>
          </div>
          <div class="card-body">
            <h6><b>Name :</b> {{$udata->name}}</h6>
            <h6><b>Movement :</b> {{$udata->movement}}</h6>
            <h6><b>Located in :</b> {{$udata->from}}</h6>
            <h6><b>Since: </b> {{$udata->active_period}}</h6>
          </div>
        </div>
        <div class="card" style="margin-top: 5%;">
          <div class="card-header">
            <h4><b>Bio</b></h4>
          </div>
          <div class="card-body">
            {{$udata->bio}}
          </div>
        </div>
      </div>

      <div class="col-9 text-center">
        @if (!empty($message))
        <div class="alert alert-info">

          <button type="button" class="close" data-dismiss="alert">
            <span>×</span>
            <span class="sr-only">Close</span>
          </button>

          {{ $message }}
        </div>
        @endif
        <div class="card card-block d-flex">

          <div class="card-header">
            <h3>Pictures</h3>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row imagetiles align-items-center">
                
                @if(!isset($images[0]))
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6" style="margin: auto; margin-top:3%;">
                  <h4>Sorry no images</h4>
                </div>
                @endif
                @foreach($images as $img)
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6" style="margin: auto; margin-top:3%;">
                  <a href="/images/{{$img->id}}"> <img src="{{Storage::disk('s3')->url($img->path)}}" class="img-responsive" style="width: 100%;">

                    <div class="centered"><b> {{$img->title}} </b></div>
                  </a>
                </div>
                @endforeach
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(Gate::check('isAdmin') || Gate::check('update-post', $udata->id, $uid))
  <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModellabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><b>Delete Post</b></h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
              &times;
            </span>
          </button>
        </div>
        <div class="model-body">
          <form action="{{ route('profile.destroy', $userdataid) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              <h4>
                Are you sure you want to delete this?
              </h4>
              <input type="hidden" name="category_id" id="cat_id" value="" />
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" type="submit">Yes, delete</button>
              <button class="btn btn-success" type="button" data-dismiss="modal">No, cancel</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <script>
    $(".preview").on('click', function() {
      $('#changeMe').prop('src', this.src)
    });
  </script>
  @endif

  @endsection