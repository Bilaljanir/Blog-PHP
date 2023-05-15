<nav class="navbar navbar-expand-lg bg-white rounded shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-users"></i> Account
                    </a>
                    <ul class="dropdown-menu">
                        @guest
                            <li><a class="dropdown-item" href="{{route('login')}}"><i class="fas fa-sign-in"></i> Login</a></li>
                            <li><a class="dropdown-item" href={{route('register')}}><i class="fas fa-user-plus"></i> Register</a></li>
                        @endguest
                        @auth
                            <li><a class="dropdown-item" href="#">{{auth()->user()->name}}</a></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="document.getElementById('formLogout').submit();"><i class="fas fa-sign-out"></i> Logout</a>
                                <form id="formLogout" action="{{route('logout')}}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
