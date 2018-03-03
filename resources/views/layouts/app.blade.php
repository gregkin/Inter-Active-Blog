<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
    @yield('styles')
</head>
<style>
body  {
    background-color: rgb(0,42,58);
}    
    
.panel-heading {
    text-align: center;
    font-weight: bold;
}
.panel-body {
    font-weight: bold;
    color: #0e2f44; 
}
.table tr:hover {
   background-color: rgba(255,251,48,.9);
}
th {
    font-weight: bold;
    color: #000;
}
a:link {
    text-decoration: none;
}
.panel .list-group .list-group-item:hover {
    background-color: rgba(255,48,52,.9);
}
.panel {
    border: 2px solid #1e88e5;
    /*border: 2px solid rgb(255,251,48);*/
}
.list-group-item>a {
    color: black;
    font-weight: bold;
}
.form-group label {
    font-weight: bold;
    color: #000;
}
.panel-body td {
    font-weight: bold;
    color: #000;
}
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}
select#category {
   font-weight: bold;
    color: #0e2f44; 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
  <div id="app">
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
            </a>
        </div><!--Navbar-Header-End-->
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            &nbsp;
          </ul>
        <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
          @guest
            <li>
              <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
              <a href="{{ route('register') }}">Register</a>
            </li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expandedbe = "true">
               {{ Auth::user()->name }} 
               <span class="caret"></span>
              </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
            </li>
          @endguest
          </ul>
        </div><!--collapse-navbar-collapse-->
      </div><!--Container-End-->
    </nav><!--Navbar Navbar-Inverse-End--> 
    <div class="container">
      <div class="row">
          @if(Auth::check())
              <div class="col-lg-4">
                  <div class="panel panel-primary">
                      <div class="panel-heading">Navigation Menu</div>
                          <ul class="list-group ">
                              <li class="list-group-item">
                                  <a href="{{ route('home') }}">Home</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('categories') }}">Categories</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('tags') }}">Tags</a>
                              </li>
                              @if(Auth::user()->admin)
                                  <li class="list-group-item">
                                  <a href="{{ route('users') }}">Users</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('user.create') }}">New User</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('user.profile') }}">My Profile</a>
                              </li>
                              @endif
                              
                              <li class="list-group-item">
                                  <a href="{{ route('tag.create') }}">Create Tag</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('posts') }}">Published Posts</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('posts.trashed') }}">Trash Bin</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('category.create') }}">Create New Category</a>
                              </li>
                              <li class="list-group-item">
                                  <a href="{{ route('post.create') }}">Create New Post</a>
                              </li>
                                @if(Auth::user()->admin)
                                  <li class="list-group-item">
                                  <a href="{{ route('settings') }}">Settings</a>
                              </li>
                                @endif
                          </ul>
                      </div>
                  </div>
              @endif
          <div class="col-lg-8">
              @yield('content')
          </div>
      </div>
    </div><!--container-end-->
  </div><!--Id=App-End-->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('info'))
            toastr.options = {"positionClass": "toast-top-center",
                              "progressBar": true,
                              "timeOut": "3000",
                              };
            toastr.info("{{ Session::get('info') }}");
        @endif
        @if(Session::has('success'))
            toastr.options = {"positionClass": "toast-top-center",
                              "progressBar": true,
                              "timeOut": "3000",
                              };
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
    @yield('scripts')
</body>
</html>
