@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Photos</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        @foreach($photos as $photo)
          <li style="list-style:none;">
            <img height="100" src="/images/{{ $photo->photo }}" alt="">
            {{ Form::open([ 'method' => 'DELETE', 'action' => ['PhotosController@destroy', $photo->id] ]) }}
            {!! Form::submit("Delete Photo", ['class' => 'btn btn-danger']) !!}
            {{ Form::close() }}
          </li>
        @endforeach
    </div>
  </div>
</main>

@endsection
