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
                        <h6><b>Producer</b> {{$image->created_by}}</h6>
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
                        
                        <h6><b>Producer</b> {{$image->size}}</h6>
                        <h6><b>Located in</b> {{$image->created_at}}</h6>
                        <h6><b>Period</b> {{$image->added_by}}</h6>
                        <h6><b>Description</b> {{$image->description }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-9 text-center">
                <div class="card card-block d-flex">

                    <div class="card-header">
                        <h3>{{$image->title}}</h3>
                    </div>
                    <div class="card-body">
                        <img width="70%" height="70%" src="{{Storage::disk('s3')->url($image->path)}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection