<nav class="navbar navbar-expand-lg navbar-light">
    <div class="logo-wrap d-flex flex-column align-items-center">
        <img class="logo" src="{{ asset('img/logo-jadi-domasno.png') }}" alt="">
        <a class="navbar-brand " id="text-logo" href="{{ route('dashboard') }}">Јади Домашно</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('homepage') }}">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        @auth
            <ul class="navbar-nav ml-auto d-flex">

                <div class="avatar">
                    <img src="{{ Auth::user()->profile_img_url}}" alt="Profile Image">
                </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Welcome {{ Auth::user()->name . ' ' . Auth::user()->surname }}
                    </a>
                    <div class="dropdown-menu">
                        {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a> --}}
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>

            </ul>
        @endauth
    </div>
</nav>
