<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>{{auth()->user()->userData[0]->name}} Profile</h3>
        </div>        
        @if(!count(auth()->user()->userData))
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('profile.create') }}">Add more data to your profile</a>
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

        
        </tr>

        

        <tr>

           
            <td></td>
            <td>
                
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