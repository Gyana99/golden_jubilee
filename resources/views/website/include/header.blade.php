<nav class="navbar navbar-expand-lg navbar-dark bg-gradient" style="background: linear-gradient(to right, #24cdcd, #1e90ff);">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">MyWebsite</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
.navbar .nav-link.active {
    font-weight: bold;
    color: #fff;
    border-bottom: 2px solid #fff;
}
</style>
