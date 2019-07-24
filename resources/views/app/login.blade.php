<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{url("favicon.ico")}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login Sistem</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{url("assets/js/require.min.js")}}"></script>
    <script>
      requirejs.config({
          baseUrl: '{{url("")}}'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="{{url("assets/css/dashboard.css")}}" rel="stylesheet" />
    <script src="{{url("assets/js/dashboard.js")}}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{url("assets/plugins/charts-c3/plugin.css")}}" rel="stylesheet" />
    <script src="{{url("assets/plugins/charts-c3/plugin.js")}}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{url("assets/plugins/maps-google/plugin.css")}}" rel="stylesheet" />
    <script src="{{url("assets/plugins/maps-google/plugin.js")}}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{url("assets/plugins/input-mask/plugin.js")}}"></script>
  </head>
  <style media="screen">
    .login-bg {
      background-image: url({{url("img/logo.png")}});
      background-position: center;
    }
    .account-bg{
      background-image: url({{url("img/bg.jpg")}});
      background-size: auto 100%;
    }
  </style>
  <body class="account-bg">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="login-bg"></div>
            <div class="col col-login mx-auto">
             
              @if(session()->has("msg"))
              <div class="alert alert-success">{{session()->get("msg")}}</div>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
               @endif
              <form class="card" action="{{route("login_action")}}" method="post">
                @csrf
                <div class="card-body p-6">
                   <div class="text-center mb-6">
                <img src="{{url("img/logo.png")}}" class="h-9" alt="">
              </div>
                  <div class="card-title">Login E-SKP KEJAKSAAN</div>
                  <div class="form-group">
                    <label class="form-label">Username / NIP</label>
                    <input type="text" class="form-control"  name="username" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                    </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
