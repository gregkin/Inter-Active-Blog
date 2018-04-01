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
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
    @yield('styles')
</head>
<style>
body  {
  background-image: url({{ asset('uploads/posts/grnbg.png') }});
  background-size: cover;
}

.dark-green {
  color: #063836;
  font-family: 'Oswald', sans-serif;
  font-size: 17px;
  background-color: rgba(255,255,255,.5);
}
a.dropdown-toggle {
  color: #063836;
  font-family: 'Oswald', sans-serif;
  font-size: 20px;
}
.nav-menu {
  color: #063836;
  font-family: 'Oswald', sans-serif;
  font-size: 20px;
  line-height: 25px;
}
.dropdown-menu {
  font-family: 'Oswald', sans-serif;
  background: rgba(51,255,189,.7);
} 
.dropdown-menu:hover {

}  
.panel-heading {
    text-align: center;
    font-weight: bold;
}
.panel-body {
    background-color: rgba(255,255,255,.7);
    font-weight: bold;
    color: #0F414C; 
}
.table tr {
  transition: background .75s ease-in-out;
}
.table tr:hover {
    background: rgba(51,255,189,.2);
    border-radius: 12px;
    border: 1px solid white;
}
th {
    font-weight: bold;
    color: #063836;
    font-family: 'Oswald', sans-serif;
    font-size: 16px;
}
.navbar-brand {
  color: #33ffbd;
  font-weight: bold;
  font-family: 'Oswald', sans-serif;
  font-size: 28px;
  text-shadow:
    -1px -1px 0 #063836,
     1px -1px 0 #063836,
    -1px 1px 0 #063836,
    1px 1px 0 #063836;
}
.navbar-brand:hover {
  color: #33ffbd;
}
.navbar-custom {
    background-color: rgba(51,255,189,.6);
}
.panel-custom {
  background-color: rgba(51,255,189,.6);
}
a:link {
  text-decoration: none;`
}
.panel .list-group .list-group-item {
  transition: background .5s ease-in-out;
}
.panel .list-group .list-group-item:hover {
background: rgba(51,255,189,.35);
}
.panel {
    border: 2px solid #33FFBD;
}
.list-group-item a {
    color: #063836;
    font-weight: bold;
}
.form-group label {
    font-weight: bold;
    color: color: #063836;
    font-family: 'Oswald', sans-serif;
    font-size: 15px;
}
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}
.lg a {
  font-size: 18px;
  text-align: center;
}
select#category {
   font-weight: bold;
    color: #0e2f44; 
}
.nav>li>a:focus, .nav>li>a:hover {
  background: rgba(51,255,189,.1);
  border-radius: 6px;
}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
  background-color: rgba(51,255,189,.7);
}
.btn-custom {
  background: rgba(51,255,189,.7);
}
div.checkbox {
  display: inline-block;
  margin-left: 6px;
}
td {
  color: #0056bd;
  font-family: 'Oswald', sans-serif;
  font-size: 14px;
}
li.dropdown {
  background-color: rgba(51,255,189,.0);
}
.ind {
  text-indent: 15px;
}
.animated {
            /*background-image: url({{ asset('uploads/posts/eye.png') }});*/
            /*background-repeat: no-repeat;*/
            /*background-position: left top;*/
            /*-webkit-animation-duration: 5s;*/
            /*animation-duration: 5s;*/
            /*-webkit-animation-fill-mode: both;*/
            /*animation-fill-mode: both;*/
         }
         /*@-webkit-keyframes fadeIn {*/
            /*0% {opacity: 0;}*/
            /*100% {opacity: 1;}*/
         }
         .fadeIn {
            /*-webkit-animation-name: fadeIn;*/
            /*animation-name: fadeIn;*/
        }
.navbar-custom {
    border-bottom: 3px solid #063836; 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
  <div id="app">
    <nav class="navbar navbar-custom navbar-static-top">
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
            {{ config('app.name', 'Lavavel') }}
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
                  <li class = "lg">
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
    </nav><!--Navbar Navbar-Custom-End--> 
    
    <!-- <div id="animated-example" class="animated fadeIn" style="background-color: rgba(255,0,0,1); width:300px; height:100px; position:relative; top:10px; left:80px; z-index:2">
    </div>
    <div class="animated fadeIn" style="background-color:rgba(255,255,0,1); width:300px; height:100px; position:relative; top:-60px; left:35px; z-index:1;">
    </div>
    <div class="animated fadeIn" style="background-color:rgba(0,255,0,1); width:300px; height:100px; position:relative; top:-220px; left:120px; z-index:3;">
    </div> -->
    <div class="container">
      <div class="row">
          @if(Auth::check())
              <div class="col-lg-4">
                  <div class="panel panel-custom">
                      <div class="panel-heading nav-menu">Navigation Menu</div>
                          <ul class="list-group ">
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('home') }}">Home</a>
                              </li>
                              <li class="list-group-item dark-green dark-green">
                                  <a href="{{ route('categories') }}">Categories</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('tags') }}">Tags</a>
                              </li>
                              @if(Auth::user()->admin)
                                  <li class="list-group-item dark-green">
                                  <a href="{{ route('users') }}">Users</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('user.create') }}">New User</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('user.profile') }}">My Profile</a>
                              </li>
                              @endif

                              
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('tag.create') }}">Create Tag</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('posts') }}">Published Posts</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('posts.trashed') }}">Trash Bin</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('category.create') }}">Create New Category</a>
                              </li>
                              <li class="list-group-item dark-green">
                                  <a href="{{ route('post.create') }}">Create New Post</a>
                              </li>
                                @if(Auth::user()->admin)
                                  <li class="list-group-item dark-green">
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
        function myFunction() {
            location.reload();
        }
      
    </script>
    @yield('scripts')
</body>
</html>
