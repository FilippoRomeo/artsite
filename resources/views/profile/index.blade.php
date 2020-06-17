@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>{{auth()->user()->userData[0]->name}} Profile</h3>
        </div>        
        @if(!count(auth()->user()->userData))
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('profile.create') }}">Create New title</a>
        </div>
        @endif
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <table class="table table-hover table-sm">

        <tr>

            <th width="300px">{{ auth()->user()->email }}</th>
            <th>{{ auth()->user()->name }} </th>
            <th>Profession </th>
            <th width="180px">Work</th>
        </tr>

        

        <tr>

            <td>{{auth()->user()->userData[0]->name}}</td>
            <td>{{auth()->user()->userData[0]->from}}</td>
            <td>{{auth()->user()->userData[0]->movement}}</td>
            <td>{{auth()->user()->userData[0]->active_period}}</td>
            <td>{{auth()->user()->userData[0]->bio}}</td>
            <td>
                <form action="{{ route('profile.destroy', auth()->user()->userData[0]->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{route('profile.show',auth()->user()->userData[0]->id)}}">Show</a>
                    <a class="btn btn-sm btn-warning" href="{{route('profile.edit',auth()->user()->userData[0]->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        
    </table>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Pics</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Uploaded time</th>
                        <th>Created by</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Manufactured period</th>
                        <th>Manufactured type</th>
                        <th>Manufactured date</th>
                    </tr>
                    @foreach (auth()->user()->images as $image)
                    <tr>
                        <th><img width="100px" src="{{$image->url}}" alt="$image->title"></th>
                        <td><a href="images/{{$image->id}}"> {{$image->title}}</a></td>
                        <td>{{$image->size_in_kb}} KB</td>
                        <td>{{$image->uploaded_time}}</td>
                        <td>{{$image->added_by}}</td>
                        <td>{{$image->created_by}}</td>
                        <td>{{$image->description }}</td>
                        <td>{{$image->location}}</td>
                        <td>{{$image->manufacturing_period}}</td>
                        <td>{{$image->manufacturing_type}}</td>
                        <td>{{$image->manufacturing_date}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection