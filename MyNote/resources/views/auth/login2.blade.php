<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/{{ Config::get('path.css') }}/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/{{ Config::get('path.css') }}/page.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <title>MyNote</title>
  </head>
  <body>
    <div class="login-page">
      {{-- <div class="container">
          <div class="row"> --}}
          <div class="title text-center">
            <h1 class="title-font">MyNote</h1>
            <p>"Create Your Own Note"</p>
          </div>
              <div class="col-md-4 col-md-offset-4">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Login
                        <a class="pull-right reg" href="{{ route('register') }}">Register</a>
                      </div>
                      <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                              {{ csrf_field() }}

                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                  <div class="col-md-7">
                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password" class="col-md-4 control-label">Password</label>

                                  <div class="col-md-7">
                                      <input id="password" type="password" class="form-control" name="password">

                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              {{-- <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                          </label>
                                      </div>
                                  </div>
                              </div> --}}

                              <div class="form-group">
                                  <div class="col-md-8 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary">
                                          Login
                                      </button>

                                      <a class="btn btn-danger" href="{{ route('google.login') }}">
                                          Google
                                      </a>
                                      {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                          Forgot Your Password?
                                      </a> --}}
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
