@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Categories</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        @foreach($categories as $category)
          @if($category->blog->count()>0)
          <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
          @endif
        @endforeach
    </div>
  </div>
</main>

@endsection
