@extends('layouts.app')
@section('content')
@include('partials.meta-static')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Contact</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      {{ Form::open(['method' => 'POST', 'action' => 'MailController@send']) }}
      @include('partials.error-message')
      <div class="form-group">
          {{ Form::label("name", "Name") }}
          {{ Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Your name here']) }}
      </div>
      <div class="form-group">
          {{ Form::label("email", "E-mail") }}
          {{ Form::email("email", null, ['class' => 'form-control', 'placeholder' => 'Your e-mail here']) }}
      </div>
      <div class="form-group">
          {{ Form::label("subject", "Subject") }}
          {{ Form::text("subject", null, ['class' => 'form-control', 'placeholder' => 'Subject']) }}
      </div>
      <div class="form-group">
          {{ Form::label("mail_message", "Message") }}
          {{ Form::textarea("mail_message", null, ['class' => 'form-control', 'placeholder' => 'Your message here']) }}
      </div>
      <div class="form-group ">
          {{ Form::submit("Send",  ['class' => 'btn btn-primary col-sm-12']) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
</main>


@endsection
