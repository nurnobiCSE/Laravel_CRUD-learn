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
                        <h1 class="card-title">Register</h1>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert-success alert" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert-success alert" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif

                        <form action="{{ url('user-registration') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="enter your name" required value="nur">
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="enter your email" required value="nur@gmail.com">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="enter your secret password" required value="123">
                            </div>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <button class="btn-primary btn">Register</button>
                                </div>
                            </div>
                            <div class="d-grid">
                                <a href="{{ url('user-login') }}" class="btn-dark btn text-primary">have account ? to login</a>
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
