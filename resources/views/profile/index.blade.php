@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>List title</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('profile.create') }}">Create New title</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif


    <table class="table table-hover table-sm">
     
        <tr>
            <th width="50px"><b>No.</b></th>
            <th width="300px">{{ auth()->user()->email }}</th>
            <th>{{ auth()->user()->name }} </th>
            <th>Profession </th>
            <th width="180px">Work</th>
        </tr>
   



        @foreach ($udata as $userdata)
        <tr>
            <td><b>{{++$i}}.</b></td>
            <td>{{$userdata->title}}</td>
            <td>{{$userdata->description}}</td>
            <td><img src="{{$userdata->link}}" alt="{{$userdata->title}}" width="500" height="600" /></td>
            <td>
                <form action="{{ route('profile.destroy', $userdata->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{route('profile.show',$userdata->id)}}">Show</a>
                    <a class="btn btn-sm btn-warning" href="{{route('profile.edit',$userdata->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
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
                        @foreach ($images as $image)
                        <tr>
                            <th><img width="100px" src="{{$image->url}}"></th>
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