<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-mail received from contact page at Projecto!</title>
  </head>
  <body style="padding: 0 10%;">
    <h1 style="text-align: center; background-color:#eee; color:#737373; padding: 10px;"><small>You have received a new message from</small> {{ $name }}</h1>
    <blockquote cite="http://">
      <h2>{{ $email }}</h2>
      <h3>Subject:</h3>
      <h3><small>{{ $subject }}</small> </h3>
      <p>{{ $mail_message }}</p>
    </blockquote>
    <h5 style="text-align: center; background-color:#eee; color:#737373; padding: 10px;">This message was sent to you using the contact form at projecto.dev</h5>
  </body>
</html>
