@extends('layouts.app')

@section('content')

<div class="container">
    <?php $image = $image[0] ?>
    <div class="container">
        <div class="row text-center">
            <div class="col-3">
                <div class="col-sm-12">
                    <a href="/" class="btn btn-sm btn-primary inline-block">Home</a>
                </div>
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Info</b></h4>
                    </div>

                    <div class="card-body">
                        <h6><b>Created by</b><a href="../profile/{{$user[0]->id}}"> {{$user[0]->name}}</a></h6>
                        <h6><b>Located in</b> {{$image->location}}</h6>
                        <h6><b>Period</b> {{$image->manufacturing_period}}</h6>
                        <h6><b>Date</b> {{$image->manufacturing_date}}</h6>
                    </div>
                </div>
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Description</b></h4>
                    </div>
                    <div class="card-body">

                        {{$image->description }}
                    </div>

                </div>
                
                <?php
                if (auth()->user()) {
                    $user = auth()->user();
                    $imageId = $image->added_by;
                    $uid = $user->id;
                } else {
                    $imageId = null;
                    $uid = null;
                }
                ?>

                @if(Gate::check('isAdmin') || Gate::check('update-post', $imageId, $uid))
                <button style="margin-top: 5%;" class="btn btn-sm btn-danger inline-block" data-target="#delete" data-toggle="modal">Delete Image</button>
                @endif
            </div>
            <div class="col-9 text-center">
                <div class="card card-block d-flex">

                    <div class="card-header">
                        <h3>{{$image->title}}</h3>
                    </div>
                    <div class="card-body">
                        <img width="100%" height="100%" src="{{Storage::disk('s3')->url($image->path)}}">
                    </div>
                </div>
            </div>


            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> there where some problems with your input.<br>
                <ol>
                    @foreach ($errors as $error)
                    <li>{{$error}}</li>

                    @endforeach
                    <li>{{$errors}}</li>
                </ol>
            </div>
            @endif
            
            
            @if(Gate::check('isAdmin') || Gate::check('update-post', $imageId, $uid))
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
                            <form action="/images/{{$image->id, url($image->path)}}" method="post">
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
           

        </div>
    </div>
</div>

@endsection