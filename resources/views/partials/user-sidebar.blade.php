@if ($user->about)
  <div>
    <h2>About</h2>
    <hr>
    <p>{{ $user->about }}</p>
  </div>
@endif

<div>
  <h2>URL</h2>
  <a href="http://projecto.dev/{{ $user->username }}">projecto.dev/{{ $user->username }}</a>
</div>

@if ($user->website)
  <div>
    <h2>Website</h2>
    <hr>
    <a href="http://{{ $user->website }}">{{ $user->website }}</a>
  </div>
@endif

@if ($user->facebook || $user->twitter)
  <div>
    <h2>Get Social</h2>
    <hr>
    <ol class="list-unstyled">
      @if ($user->facebook)
      <li><a href="http://{{ $user->facebook }}">Facebook</a></li>
      @endif
      @if ($user->twitter)
      <li><a href="http://{{ $user->twitter }}">Twitter</a></li>
      @endif
    </ol>
  </div>
@endif
