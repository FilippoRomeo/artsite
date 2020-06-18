@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8" style="width: 100%; height: 70vh;">


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

            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if(!empty($image[0]))
                    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>

                    <li data-target="#carouselIndicators" data-slide-to="1"></li>

                    <li data-target="#carouselIndicators" data-slide-to="2"></li>
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if(isset($image[0]))
                    <div class="carousel-item active">
                        <img class="d-block w-50 mx-auto" src="{{Storage::disk('s3')->url($image[0])}}" alt="First slide">
                    </div>
                    @endif
                    @if(isset($image[1]))
                    <div class="carousel-item">
                        <img class="d-block w-50 mx-auto" src="{{Storage::disk('s3')->url($image[1])}}" alt="Second slide">
                    </div>
                    @endif
                    @if(isset($image[2]))
                    <div class="carousel-item">
                        <img class="d-block w-50 mx-auto" src="{{Storage::disk('s3')->url($image[2])}}" alt="Third slide">
                    </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">
        <span class="col-md-8 glyphicon glyphicon-chevron-down" style="font-size: 100px; text-align: center;" aria-hidden="true">⌄</span>

        <div class="row justify-content-center">
            <div class="col-md-6" style="width: 100vh; height: 95vh;">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>Recent makers</b></div>
                    <div class="card-body mx-auto" style="padding: 0">
                        <table class="table table-hover" style="width: 60vh;">
                            <tr>
                                <th>Name</th>
                                <th>From</th>
                                <th>Period</th>
                            </tr>

                            @foreach($udata as $user)
                            <tr>
                                <td><a href="profile/{{$user->id}}">
                                        <div>{{$user->name}}</div>
                                    </a>
                                </td>
                                <td>{{$user->from}}</td>
                                <td>{{$user->movement}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="width: 100vh; height: 95vh;">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>Recent work uploaded</b></div>
                    <div class="card-body mx-auto" style="padding: 0">
                        <table class="table table-hover" style="width: 60vh;">
                            <tr>
                                <th>Title</th>
                                <th>Period</th>
                                <th>Location</th>
                            </tr>
                            @foreach ($imageInfo as $data)
                            <tr>
                                <td>
                                    <a href="/images/{{$data->id}}"> {{$data->title}} </a> </td>
                                <td>{{$data->manufacturing_period}}</td>
                                <td>{{$data->location}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection