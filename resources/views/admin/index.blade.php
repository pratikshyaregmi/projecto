@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Projecto: Admin Control Panel</h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
      <article class="admin">
        <button class="btn btn-primary link" > <a style="color:#fff;" href="{{ url('/blog/create') }}">Create Blog</a> </button>
        <button class="btn btn-danger link" > <a style="color:#fff;" href="{{ url('/blog/bin') }}">Trashed Blogs</a> </button>
      </article>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page-header">Recent Blogs</h1>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Blog Title</th>
                  <th>Blog Content</th>
                  <th>Status</th>
                  <th>Setting</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($blog as $blog)
                {{ Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) }}
                @include('partials.error-message')
                <tr>
                  <td>{!! Form::text("title", null, ['class' => 'form-control']) !!}
                  <a class="btn btn-danger btn-xs" href="{{ action('BlogController@edit', [$blog->id]) }}">Edit</a></td>
                  <td>{!! Form::textarea("body", null, ['class' => 'form-control', 'size' => '20x5']) !!}</td>
                  <td>{!! Form::select("status", ['0' => 'Draft', '1' => 'Publish'], null, ['class' => 'btn btn-primary']) !!}</td>
                  <td>{{ Form::submit("Submit", ['class' => 'btn btn-success btn-xs']) }}</td>


                    {{ Form::close() }}
                    </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
      </div>

    </div>
  </div>

</main>


@endsection
