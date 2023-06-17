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
    
    <div class="container">
        <a href="{{ url('/add-data') }}" class="btn btn-primary my-3">Add Data</a>
        @if (Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
        @endif
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
                  <td><a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-info">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
               
              </tbody>
          </table>
          {{ $allData-> links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>
