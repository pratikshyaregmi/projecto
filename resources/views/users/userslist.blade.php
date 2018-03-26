@extends('layouts.app')
@section('content')
<main>
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="text-center">Users on Projecto</h2>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page-header">Recent Users</h1>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Joined</th>
                  <th>Role</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td><a href="{{ route('users.show', $user->username) }}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>
                    {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) }}
                    {!! Form::select("role_id", ['1' => 'Administrator', '2' => 'Author', '3' => 'Subscriber'], null, ['class' => 'btn btn-primary']) !!}

                    {{ Form::submit("Submit", ['class' => 'btn btn-success btn-xs']) }}
                    {{ Form::close() }}

                    {{ Form::model($user, ['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) }}
                    {{ Form::submit("Delete", ['class' => 'btn btn-danger btn-xs']) }}
                    {{ Form::close() }}
                  </td>
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
