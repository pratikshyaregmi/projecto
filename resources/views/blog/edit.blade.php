@extends('layouts.app')
@section('content')
@include('partials.tinymce')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Edit blog post</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id], 'files' => true] ) !!}

        <div class="form-group">

          @include('partials.error-message')
          
          {!! Form::label("title", "Title:") !!}
          {!! Form::text("title", null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label("body", "Body:") !!}
          {!! Form::textarea("body", null, ['class' => 'form-control my-editor']) !!}
        </div>

        <div class="form-group">
          {!! Form::label("photo_id", "Featured Image:") !!}
          {!! Form::file("photo_id", ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label("category_id", "Category:") !!}
          {!! Form::select("category_id[]", $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label("meta_desc", "Meta Description:") !!}
          {!! Form::text("meta_desc", null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit("Edit Blog", ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}

      {!! Form::open([ 'method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id] ]) !!}
      <div class="form-group">
        {!! Form::submit("Delete Blog", ['class' => 'btn btn-danger']) !!}
      </div>
    {!! Form::close() !!}
    </div>
  </div>
</main>

@endsection
