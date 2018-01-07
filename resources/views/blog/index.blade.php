@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: All Blog Posts</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      <article>
        @foreach ($blogs as $blog)
        <h2> <a href="{{ action('BlogController@show', [$blog->id]) }}">{{ $blog->title }}</a> </h2>
        <p>{{ $blog->body }}</p>
        @endforeach
      </article>
    </div>
  </div>
</main>


@endsection
