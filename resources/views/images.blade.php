@extends('layouts.app')

@section('content')

<div class="container">
<?php print_r($images[0]) ?>
    <div class="row justify-content-center">
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
                            <td>{{$image->title}}</td>
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
</div>
@endsection