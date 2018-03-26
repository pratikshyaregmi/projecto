@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid ">
    <div class="jumbotron col-sm-12">
      <div class="col-sm-8 text-center">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->role->name }}</p>
        @if($user->blog->count() > 0) <button class="btn btn-primary btn-xs">{{ $user->blog->count() > 0 }} Blogs</button> @endif
      </div>
      <div class="col-sm-4">
        <img class="img-circle" height="100" width="100" src="/images/{{ $user->photo ? $user->photo->photo : 'profile.png' }}" alt="">
      </div>
    </div>
  </div>

  <div class="container-fluid col-sm-12">
    <div class="row">
      <div class="col-sm-7">
        @if($user->blog->count() > 0)
        <h1 >Latest Blogs by <small><a href="{{ route('users.show', $user->username) }}">{{ $user->name }}</a> </small> </h1>
          <hr>
          @foreach ($user->blog->reverse() as $blog)
          <h2> <a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a> </h2>
          <p>{!! str_limit($blog->body, 300) !!}<a href="{{ action('BlogController@show', [$blog->slug]) }}">Read More</a></p>
          <p>
             <i class="fa fa-btn fa-clock-o"></i> Posted <strong>{{ $blog->created_at->diffForHumans() }}</strong> on
             @if ($blog->category)
             @foreach($blog->category as $category) <i class="fa fa-btn fa-cubes"></i> <a href="{{ route('categories.show', $category->slug)}}">{{ $category->name }}</a> @endforeach
             @endif
           </p>
          @endforeach
        @endif
      </div>

      <div class="col-sm-5">
        @include('partials.user-sidebar')
    </div>
    </div>
  </div>

</main>


@endsection
