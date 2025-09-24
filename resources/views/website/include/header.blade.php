<nav class="navbar navbar-expand-lg navbar-dark"
     style="background: linear-gradient(to right, #24cdcd, #1e90ff); position: relative; min-height:90px;">
    <div class="container position-relative d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <a class="navbar-brand logo-section" href="{{ url('/') }}">
            <img src="{{ asset('img/icon.png') }}"
                 alt="U.G. ବିଦ୍ୟାପୀଠ Logo"
                 class="logo-img">
        </a>

        <!-- Menu Button -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse menu-section" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"><i class="fa-solid fa-house"></i></a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('event-deatils') ? 'active' : '' }}" href="{{ url('event-deatils') }}">କାର୍ୟକ୍ରମ</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('all-members') ? 'active' : '' }}" href="{{ url('all-members') }}">ସଦସ୍ୟ</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contribution-deatils') ? 'active' : '' }}" href="{{ url('contribution-deatils') }}">ଦାନ</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('alumni-registration') ? 'active' : '' }}" href="{{ url('alumni-registration') }}">ପୂର୍ବ ଛାତ୍ରଛାତ୍ରୀ ପଞ୍ଜିକରଣ</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('school-story') ? 'active' : '' }}" href="{{ url('school-story') }}">ବିଦ୍ୟାଳୟ କାହାଣୀ</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('add-magazines') ? 'active' : '' }}" href="{{ url('add-magazines') }}">Magazines</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Logo */
    .logo-img {
        height: 85px;
        width: auto;
    }

    /* Active menu highlight */
    .navbar .nav-link.active {
        font-weight: bold;
        color: #fff;
        border-bottom: 2px solid #fff;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
        .logo-section {
            position: relative;
            z-index: 1050;
        }
        .logo-img {
            height: 70px;
        }
        .navbar-toggler {
            z-index: 1100;
            margin-left: auto;
        }
        .menu-section {
            width: 100%;
            text-align: center;
            background: linear-gradient(to right, #24cdcd, #1e90ff); /* ensures dropdown is visible */
            padding: 10px 0;
             z-index: 1100;
        }
        .menu-section .nav-link {
            display: block;
            padding: 10px;
        }
    }
</style>
