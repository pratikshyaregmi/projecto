@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Create a blog post</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      {!! Form::open( ['method' => 'POST', 'action' => 'Blogcontroller@store'] ) !!}
      {{ csrf_field() }}
        <div class="form-group">
          {!! Form::label("title", "Title:") !!}
          {!! Form::text("title", null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label("body", "Body:") !!}
          {!! Form::textarea("body", null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit("Create a Blog", ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</main>

@endsection
