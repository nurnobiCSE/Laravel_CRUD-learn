<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel || CRUD</title>
  </head>
  <body>
    <center><h2>Laravel CRUD system</h2></center>
       
    <center><h2>Welcome to {{ Auth::user()->name }}</h2></center>
    
    <div class="container">
        <a href="{{ url('/add-data') }}" class="btn btn-primary my-3">Add Data</a>
        
        <div class="row">
          <div class="col-lg-4">
            <div class="input-group mb-3">

              <form action="{{ url('/') }}" method="GET" class="d-flex">
              <input type="text" class="form-control" name="query" placeholder="Search Here,...." aria-label="search here" aria-describedby="basic-addon2">
              <div class="input-group-append mx-2">
                <button class="btn btn-outline-secondary btn-primary text-light" type="submit">Search</button>
              </div>
              </form>

            </div>
          </div>
           <div class="col-lg-7"></div>
          <div class="col-lg-1">
            <form action="{{ url('logout') }}" method="POST" class="d-flex">
              @csrf
              @method('DELETE') 
    
              <button class="btn-danger btn"> Logout</button>
            </form>
          </div>
        </div>

        @if (Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
        @endif
        
        @if(isset($names))
        <a href="{{ url('/') }}" class="btn btn-dark text-light my-1">Go Back</a>
        
        <table class="table table-dark table-striped">
          <thead>
              <tr>
                <th scope="col">SL.NO</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action/Update</th>
              </tr>
            </thead>
            <tbody>
              @if (count($names) > 0)
              @foreach ($names as $key=>$data )
              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $data->firstname }}</td>
                <td>{{ $data->lastname }}</td>
                <td>{{ $data->email }}</td>
                <td>
                  <a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-info">Edit</a> 
                  <a href="{{ url('/delete-data/'.$data->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                </td>
              </tr>
              @endforeach
              @else
                <tr><td>Data Not Found</td></tr>
              @endif
             
             
            </tbody>
        </table>
        {{ $names-> links() }}
       
        @else
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                  <th scope="col">SL.NO</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action/Update</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allData as $key=>$data )
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <td>{{ $data->firstname }}</td>
                  <td>{{ $data->lastname }}</td>
                  <td>{{ $data->email }}</td>
                  <td>
                    <a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-info">Edit</a> 
                    <a href="{{ url('/delete-data/'.$data->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
          </table>
          {{ $allData-> links() }}
          @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>
