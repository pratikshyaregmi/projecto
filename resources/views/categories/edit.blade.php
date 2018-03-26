@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Edit category</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoryController@update', $category->id]] ) !!}
      {{ csrf_field() }}
        <div class="form-group">
          {!! Form::label("name", "Name:") !!}
          {!! Form::text("name", null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
          {!! Form::submit("Edit category", ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}

      {!! Form::open([ 'method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id] ]) !!}
      <div class="form-group">
        {!! Form::submit("Delete Category", ['class' => 'btn btn-danger']) !!}
      </div>
    {!! Form::close() !!}
    </div>
  </div>
</main>

@endsection
