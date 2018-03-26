@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <div class="container-fluid ">
        <div class="jumbotron col-sm-12">
          <div class="col-sm-8 text-center">
            <h2 >Hello {{ Auth::user()->name }}</h2>
            <p >{{ Auth::user()->role->name }}</p>
            @if (Auth::user()->role->id == 2)
            <button class="btn btn-primary link btn-xs" > <a style="color:#fff;" href="{{ url('/blog/create') }}">Create Blog</a> </button>
            @endif
            <button class="btn btn-success link btn-xs" > <a style="color:#fff;" href="{{ action('UserController@edit', Auth::user()->username) }}">Profile Setting</a> </button>
          </div>
          <div class="col-sm-4">
            <img class="img-circle" height="100" width="100" src="/images/{{ Auth::user()->photo ? Auth::user()->photo->photo : 'profile.png' }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-7">
        <h1 class="page-header">Latest Blogs</h1>
        @if ($user = Auth::user())
          @if ($user->blog)
              <ul>
                @foreach ($blog as $blog)
                  @if ($blog->user_id == $user->id)

                      <li style="list-style-type:none;">
                        <button class="btn btn-success btn-xs">{{ $blog->status == 0 ? 'Draft' : 'Published' }}</button>
                        <a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a> </li>
                  @endif
                @endforeach
              </ul>
          @endif
        @endif
      </div>

      <div class="col-sm-5">
          @include('partials.user-sidebar')
      </div>
    </div>
  </div>

</main>


@endsection
