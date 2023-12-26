<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laravel Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ms-auto">
        @guest
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">Login-WEB</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('/login-api')) ? 'active' : '' }}" href="{{ url('/login-api') }}">Login-API</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ url('register') }}">Register</a>
        </li>

        @else
        <li class="nav-item ">
          <a class="nav-link {{ (request()->is('crud/list')) ? 'active' : '' }} text-white" href="{{ url('crud/list') }}">CRUD-WEB</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link {{ (request()->is('crud-api/list')) ? 'active' : '' }} text-white" href="{{ url('crud-api/list') }}">CRUD-API</a>
        </li>
        <li class=" nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
            </li>
          </ul>
        </li>
        @endguest
      </ul>

    </div>
  </div>
</nav>