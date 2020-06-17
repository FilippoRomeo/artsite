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

                <div class="col-sm-12">
                    @if(!count(auth()->user()->userData))
                    <a class="btn btn-sm btn-success inline-block" href="{{ route('profile.create') }}">Complete profile</a>
                    @endif
                    <a href="/" class="btn btn-sm btn-primary inline-block">Home</a>
                </div>

                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Profile</b></h4>
                    </div>
                    <div class="card-body">
                    @if(count(auth()->user()->userData))
                        <h6><b>Name</b> {{auth()->user()->userData[0]->name}}</h6>
                        <h6><b>Located in</b> {{auth()->user()->userData[0]->from}}</h6>
                        <h6><b>Period</b> {{auth()->user()->userData[0]->movement}}</h6>
                        <h6><b>Since</b> {{auth()->user()->userData[0]->active_period}}</h6>
                    @endif
                    </div>
                </div>
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Bio</b></h4>
                    </div>
                    <div class="card-body">
                    @if(count(auth()->user()->userData))
                        {{auth()->user()->userData[0]->bio}}
                        @endif
                    </div>
                </div>
                @if(count(auth()->user()->userData))
                <form style="margin-top: 5%;" action="{{ route('profile.destroy', auth()->user()->userData[0]->id) }}" method="post">
                    <a class="btn btn-sm btn-warning" href="{{route('profile.edit',auth()->user()->userData[0]->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                @endif
               
            </div>

            <div class="col-9 text-center">
                <div class="card card-block d-flex">

                    <div class="card-header">
                        <h3>Pictures</h3>
                    </div>
                    <div class="card-body">


                        <div class="container">
                            <div class="row imagetiles align-items-center">
                                @foreach(auth()->user()->images as $image)
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6" style="margin: auto; margin-top:3%;">
                                    <a href="/images/{{$image->id}}"> <img src={{$image->url}} class="img-responsive" style="width: 100%;">

                                        <div class="centered"><b> {{$image->title}} </b></div>
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

    @endsection