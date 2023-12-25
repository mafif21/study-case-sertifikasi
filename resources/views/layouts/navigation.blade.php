<nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
    <div class="container">
        <a class="navbar-brand" href="/home">Notes App</a>

        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->username }}
                </a>

                <ul class="dropdown-menu">
                    @if (Auth::user()->is_admin == 1)
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a></li>
                    @endif
                    <li class="dropdown-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn text-right p-0">Logout</button>
                        </form>
                    </li>
                </ul>

            </div>

        </div>
    </div>
</nav>
