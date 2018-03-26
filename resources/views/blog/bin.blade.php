@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Deleted Blog Posts</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      <article>
        @foreach ($deletedBlogs as $blog)
        <h2>{{ $blog->title }}</h2>
        <p>{{ $blog->body }}</p>

            {!! Form::open([ 'method' => 'Get', 'action' => ['BlogController@restore', $blog->id]]) !!}
            <div class="form-group">
              {!! Form::submit("Restore Blog", ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


            {!! Form::open([ 'method' => 'DELETE', 'action' => ['BlogController@destroyBlog', $blog->id]]) !!}
            <div class="form-group">
              {!! Form::submit("Destroy Blog", ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        @endforeach

      </article>
    </div>
  </div>
</main>


@endsection
