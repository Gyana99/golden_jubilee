<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #24cdcd, #1e90ff);">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">U.G. ବିଦ୍ୟାପୀଠ, ନରେନ୍ଦ୍ରପୁର</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('event-deatils') ? 'active' : '' }}" href="{{ url('event-deatils') }}">କାର୍ୟକ୍ରମ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contribution-deatils') ? 'active' : '' }}" href="{{ url('contribution-deatils') }}">ଦାନ</a>
        </li>
         <!-- <li class="nav-item"> -->
          <!-- <a class="nav-link {{ request()->is('writing') ? 'active' : '' }}" href="{{ url('writing') }}">ଲେଖନ</a> -->
        <!-- </li> -->
         <li class="nav-item">
          <a class="nav-link {{ request()->is('alumni-registration') ? 'active' : '' }}" href="{{ url('alumni-registration') }}">ପୂର୍ବ ଛାତ୍ରଛାତ୍ରୀ ପଞ୍ଜିକରଣ</a>
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
