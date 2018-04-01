@extends('layouts.app')
    @section('content')
      <div class="col-lg-3">
        <div class="panel panel-custom">
          <div class="panel-heading nav-menu text-center">
            Published Posts
          </div>
          <div class="panel-body">
            <h1 class="text-center">{{ $post_count }}</h1>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="panel panel-custom">
          <div class="panel-heading nav-menu text-center">
            Trashed Posts
          </div>
          <div class="panel-body">
            <h1 class="text-center">{{ $trashed_count }}</h1>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="panel panel-custom">
          <div class="panel-heading nav-menu text-center">
            Users
          </div>
          <div class="panel-body">
            <h1 class="text-center">{{ $users_count }}</h1>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="panel panel-custom">
          <div class="panel-heading nav-menu text-center">
            Categories
          </div>
          <div class="panel-body">
            <h1 class="text-center">{{ $categories_count }}</h1>
          </div>
        </div>
      </div>
    @endsection
