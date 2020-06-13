@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>List title</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('views.create') }}">Create New title</a>
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
            <th width="300px">Nama Siswa</th>
            <th>Alamat Siswa</th>
            <th width="180px">Action</th>
        </tr>

        @foreach ($udata as $userdata)
        <tr>
            <td><b>{{++$i}}.</b></td>
            <td>{{$userdata->title}}</td>
            <td>{{$userdata->description}}</td>
            <td><img src=`{{$userdata->link}}` alt=`{{$userdata->title}}` /></td>
            <td>
                <form action="{{ route('views.destroy', $userdata->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{route('views.show',$userdata->id)}}">Show</a>
                    <a class="btn btn-sm btn-warning" href="{{route('views.edit',$userdata->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $udata->links() !!}
</div>
@endsection