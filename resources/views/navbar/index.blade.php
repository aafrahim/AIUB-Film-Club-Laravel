<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrapV4.4.1cerulean.css')}}">
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrapV4.4.1.min.js')}}"></script>
  </head>

  <body class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{route('home.loggedout')}}">AIUB Film Club</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="nav navbar-nav navbar-right">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('login.index')}}">Login<span class="sr-only"></span></a>
          </li>
        </ul>
  </div>
</nav>
    <br><br>

    @yield('content')

  </body>
</html>