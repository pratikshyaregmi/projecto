@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Categories</h2>
    </div>
    <div class="col-sm-8">
      <h2>Create:</h2>
      {!! Form::open( ['method' => 'POST', 'action' => 'CategoryController@store'] ) !!}
        @include('partials.error-message')
        <div class="form-group">
          {!! Form::label("name", "Name:") !!}
          {!! Form::text("name", null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit("Create category", ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}
    </div>


    <div class="col-sm-4">
      <h2>List of categories</h2>
      @foreach ($categories as $category)
      <li style="list-style-type:none;">
        <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
        {!! Form::open([ 'method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id] ]) !!}
        <div class="form-group">
          {!! Form::submit("Delete", ['class' => 'btn btn-danger btn-xs']) !!}
        </div>
      {!! Form::close() !!}
    </li>
    <hr>
      @endforeach
    </div>
    </div>

</main>

@endsection
