<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('list.products') }}">Productos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto float-left">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('list.products') }}">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('create.product') }}">Nuevo</a>
      </li>
    </ul>
    <div class="my-12 my-lg-0">
      <ul class="navbar-nav mr-auto float-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="options" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="options">
            <a class="dropdown-item" href="{{ route('session.finish') }}">Cerrar sesión</a>
          </div>
        </li>
        <form class="form-inline my-2 my-lg-0" action="{{ route('search.product') }}" method="post">
          @csrf
          <input class="form-control mr-sm-2" type="search" id="slug" name="slug" placeholder="Ingresa un código o un nombre" size="23">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </ul>
    </div>
  </div>
</nav>