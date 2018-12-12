<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-100 bg-info d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card border-dark">
          <div class="card-header text-center bg-dark text-light">
            <h4>LOGIN LARAVUE</h4>
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group">
                <input id="email" type="email" 
                class="form-control mb-4{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Alamat Email">

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group">
                <input id="password" type="password" class="form-control mb-4
                {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Masukan Password">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-dark btn-block">
                  {{ __('Login') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>