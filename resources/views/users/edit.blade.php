@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">{{ $user->name }}</h2>
      <p>Edit Profile</p>
    </div>
  </div>

<div class="col-sm-8 col-sm-offset-2">
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->username], 'files' => true]) !!}
        @include('partials.error-message')
        <div class="form-group">
            {!! Form::label("name", "Name") !!}
            {!! Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Your name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("about", "About") !!}
            {!! Form::textarea("about", null, ['class' => 'form-control', 'placeholder' => 'Write about yourself']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("website", "Website") !!}
            {!! Form::text("website", null, ['class' => 'form-control', 'placeholder' => 'Paste your website URL']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("facebook", "Facebook") !!}
            {!! Form::text("facebook", null, ['class' => 'form-control', 'placeholder' => 'Paste your facebook URL']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("twitter", "Twitter") !!}
            {!! Form::text("twitter", null, ['class' => 'form-control', 'placeholder' => 'Paste your twitter URL']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("photo_id", "Profile Picture") !!}
            {!! Form::file("photo_id") !!}
        </div>

        <div class="form-group">
            {!! Form::label("get_email", "Email alert on new Blog post") !!}
            {!! Form::select("get_email", ['1' => 'Yes', '2' => 'No'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>

</main>


@endsection
