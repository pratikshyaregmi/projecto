@extends('layouts.app')
@include('partials.meta-static')
@section('content')
    <dib id="welcome">
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    Projecto
                </div>

                <div class="links">
                    <a href="{{ url('/blog') }}">Blog</a>
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            </div>
        </div>
    </div>
</html>
    @endsection
