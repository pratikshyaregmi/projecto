@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <article>
    <div class="jumbotron">
      <h2 class="text-center">{{ $blog->title }}</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">

        <p>{{ $blog->body }}</p>
    </div>
    </article>
  </div>
</main>


@endsection
