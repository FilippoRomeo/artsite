@extends('layouts.app')
@section('content')

<div class="container">
    <div class="container">
        <div class="row text-center">
            <div class="col-3">

                @if(!count(auth()->user()->userData))
                <div class="col-sm-2">
                    <a class="btn btn-sm btn-success" href="{{ route('profile.create') }}">Add more data to your profile</a>
                </div>
                @endif
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Profile</b></h4>
                    </div>
                    <div class="card-body">
                        <h6><b>Name</b> {{auth()->user()->userData[0]->name}}</h6>
                        <h6><b>Located in</b> {{auth()->user()->userData[0]->from}}</h6>
                        <h6><b>Period</b> {{auth()->user()->userData[0]->movement}}</h6>
                        <h6><b>Started activity in</b> {{auth()->user()->userData[0]->active_period}}</h6>
                    </div>
                </div>
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Bio</b></h4>
                    </div>
                    <div class="card-body">

                        {{auth()->user()->userData[0]->bio}}
                    </div>
                </div>
                <form style="margin-top: 5%;" action="{{ route('profile.destroy', auth()->user()->userData[0]->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{route('profile.show',auth()->user()->userData[0]->id)}}">Show</a>
                    <a class="btn btn-sm btn-warning" href="{{route('profile.edit',auth()->user()->userData[0]->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                <div class="card" style="margin-top: 5%;">
                    <div class="card-header">
                        <h4><b>Description</b></h4>
                    </div>
                    <div class="card-body">

                        <h6><b>Producer</b> </h6>
                        <h6><b>Located in</b> </h6>
                        <h6><b>Period</b> </h6>
                        <h6><b>Description</b> </h6>
                    </div>
                </div>
            </div>

            <div class="col-9 text-center">
                <div class="card card-block d-flex">

                    <div class="card-header">
                        <h3></h3>
                    </div>
                    <div class="card-body">
                        <img width="70%" height="70%" src="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection