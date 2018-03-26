<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-mail from Projecto</title>
  </head>
  <body style="padding: 0 10%;">
    <h1 style="text-align: center; background-color:#eee; color:#737373; padding: 10px;">Projecto</h1>
    <blockquote cite="http://">
      <h2>Hi {{ $user->name }}</h2>
      <h3>A new blog <a href="{{ action('BlogController@show', [$blog->slug]) }}"><strong>{{ $blog->title }}</strong></a> has been posted in Projecto</h3>
      <h4>Category: @foreach($blog->category as $category) <span><a href="{{ route('categories.show', [$category->slug]) }}"><strong>{{ $category->name }}</strong></a></span> @endforeach</h4>
      <p><a href="{{ action('BlogController@show', [$blog->slug]) }}">Read full article...</a></p>
    </blockquote>
    <h5 style="text-align: center; background-color:#eee; color:#737373; padding: 10px;">Thank you for being part of Projecto!</h5>
  </body>
</html>
