<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR ABSEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-5 py-5">
                <main class="form-signin mb-2">
                    @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
        
                    @if(session()->has('loginError'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
        
                    <form action="/login" method="post">
                      @csrf
                      <h1 class="h3 mb-3 fw-normal">Please Login</h1>
                      <div class="form-floating mb-2">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>
        
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-floating mb-2">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                      </div>
                      <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>