<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">

            <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Startup</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link ">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('service') }}" class="nav-item nav-link">Services</a>
                <a href="{{ route('pages.index') }}" class="nav-item nav-link">Blog</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i
                    class="fa fa-search"></i></button>



            @auth

                <div>
                    {{ auth()->user()->name }}
                </div>


                <a href="{{ route('pages.create') }}" class="btn btn-primary py-2 px-4 ms-3">Create Post </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger py-2 px-4 ms-3">logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 ms-3">Login</a>
            @endauth

        </div>
    </nav>
