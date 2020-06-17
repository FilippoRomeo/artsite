@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload New File</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('success')}}
                    </div>
                    @endif
                    <form action="{{ route('uploadfile') }}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="file" id="" multiple accept="image/*" require>
                            <span class="help-block text-danger">{{$errors->first('file')}}</span>
                        </div>

                        <div class="form-group">
                            <input placeholder="Title" type="text" name="title" id="title" class="form-control" require />
                            <span class="help-block text-danger">{{$errors->first('title')}}</span>
                        </div>

                        <div class="form-group">
                            <input placeholder="Created by" type="text" name="created_by" id="created_by" class="form-control" require />
                            <span class="help-block text-danger">{{$errors->first('created_by')}}</span>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="Description" name="description" id="description" class="form-control" require></textarea>
                            <span class="help-block text-danger">{{$errors->first('description')}}</span>
                        </div>

                        <div class="form-group">
                            <input placeholder="Period" type="text" name="manufacturing_period" id="manufacturing_period" class="form-control" require />
                            <span class="help-block text-danger">{{$errors->first('manufacturing_period')}}</span>
                        </div>

                        <div class="form-group">
                            <input placeholder="Location" type="text" name="location" id="location" class="form-control" require />
                            <span class="help-block text-danger">{{$errors->first('location')}}</span>
                        </div>

                        <div class="form-group">
                            <input placeholder="Craft type" type="text" name="manufacturing_type" id="manufacturing_type" class="form-control" require />
                            <span class="help-block text-danger">{{$errors->first('manufacturing_type')}}</span>
                        </div>

                        <div class="form-group">
                            <input placeholder="Created on dd/mm/yyyy" type="date" name="manufacturing_date" id="manufacturing_date" class="form-control" require></textarea>
                            <span class="help-block text-danger">{{$errors->first('manufacturing_date')}}</span>
                        </div>

                </div>
                <button class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection