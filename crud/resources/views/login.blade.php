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
    <center><h2>Laravel Registration system</h2></center>
    
    <div class="container">
        <div class="justify-content-center mt-5 row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Login</h1>
                    </div>
                    <div class="card-body">
                        
                        
                        @if(Session::has('error'))
                        <div class="alert-danger alert" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif


                        <form action="{{ url('user-login') }}" method="POST">
                            @csrf
                            
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="enter your email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="enter your secret password" required>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <button class="btn-primary btn">Login</button>
                                </div>
                                <div class="mb-3 my-3">
                                    <div class="d-grid">
                                        <a href="{{ url('user-registration') }}" class="btn-dark btn text-primary">Registration</a>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>
