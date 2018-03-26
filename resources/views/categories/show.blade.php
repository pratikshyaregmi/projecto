@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Category: {{ $category->name }}</h2><a style="float:right;" href="{{ action('CategoryController@edit', [$category->id]) }}">Edit</a>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      <h2 class="text-center"> <strong>Recent Blogs on {{ $category->name }}</strong> </h2>
      <hr>
        @foreach($category->blog as $blog)
          <h2> <a href="{{ action('BlogController@show', [$blog->slug]) }}"> {{ $blog->title }} </a> </h2>
        @endforeach
    </div>
  </div>
</main>

@endsection
