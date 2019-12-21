<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrapV4.4.1cerulean.css')}}">
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrapV4.4.1.min.js')}}"></script>
  </head>

  <body class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
  <a class="navbar-brand" href="{{route('home.index')}}">AIUB Film Club</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home.index')}}">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userlist" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User List
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('user.committeelist')}}">Committee List</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('user.generalMemberlist')}}">General Member List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="id" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Post
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('post.main')}}">View All</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('post.create')}}">Create</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('post.personal', session('uid'))}}">View Personal</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('event.index')}}">Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('notice.index')}}">Notices</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="id" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gallery
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('gallery.albumlist')}}">My Gallery</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('gallery.create')}}">Create Album</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Galleries</a>
        </div>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('user.profileDetails', session('uid'))}}">View</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('user.profileEdit', session('uid'))}}">Edit</a>
        </div>
      </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout.index')}}">Logout<span class="sr-only"></span></a>
          </li>
        </ul>
  </div>
</nav>
    <br><br>

    <div class="container" style="min-height: 600px">
      @yield('content')
    </div>

    <br>

    <div class="row">
      <div class="col-md-12 text-center bg-secondary">
        AIUB Film Club Copyright-2019 
      </div>
    </div>
  </body>
</html>