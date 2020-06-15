@extends('layouts.app')

@section('content')

<div class="container">
    <?php $image = $image[0] ?>
    <div class="container">
        <div class="row text-center">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Info</b></h4>
                    </div>
                    <div class="card-body">
                        <h6>Producer <b> {{$image->created_by}}</b></h6>
                        <h6>Located in <b>{{$image->location}}</b></h6>
                        <h6>Period <b>{{$image->manufacturing_period}}</b></h6>
                        <h6>Date <b>{{$image->manufacturing_date}}</b></h6>
                    </div>
                </div>
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Description</b></h4>
                    </div>
                    <div class="card-body">
                        <td>{{$image->size}} KB</td>
                        <td>{{$image->created_at}}</td>
                        <td>{{$image->added_by}}</td>
                        <td>{{$image->description }}</td>
                    </div>
                </div>
            </div>
            <div class="col-9 text-center my-auto">
                <div class="card card-block d-flex">

                    <div class="card-header">
                        <h3>{{$image->title}}</h3>
                    </div>
                    <div class="card-body">
                        <img width="50%" height="50%" src="{{Storage::disk('s3')->url($image->path)}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection