<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('app.home.index') }}">Vip2Cars</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('app.home.index') }}">Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Bases de datos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('app.brands.index') }}">Marcas</a></li>
                        <li><a class="dropdown-item" href="{{ route('app.models.index') }}">Modelos</a></li>
                        <li><a class="dropdown-item" href="{{ route('app.clients.index') }}">Clientes</a></li>
                        <li><a class="dropdown-item" href="#">Vehículos</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger">
                    Cerrar sesión
                </a>
            </form>
        </div>
    </div>
</nav>
