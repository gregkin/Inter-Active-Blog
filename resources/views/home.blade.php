@extends('layouts.app')
    @section('content')
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="text-center">
                             Welcome, great to see you {{ Auth::user()->name }}
                        </div>
                </div>
            </div>

@endsection
