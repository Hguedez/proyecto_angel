@extends('layouts.listaEventoslayout')
@section('content')


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container">

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav mr-auto ">
              <li class="nav-item active">
                <a class="nav-link " href="/home/{{$correo}}/funciona">Home
                      <span class="sr-only">(current)</span>
                    </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/catalogo">Catalogo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Ayuda</a>
              </li>

            </ul>
            <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->

                    @if ($correo ?? '')
              <li class="nav-item active dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" data-target="dropme" aria-haspopup="true" aria-expanded="false">
                  {{ $correo ?? '' ?? '' }} <span class="caret"></span>
                </a>
                <div class="dropdown"  >
                  <a class="" href="{{ route('logout') }}">
                  <div class="dropdown-menu" id="dropme" aria-labelledby="dropdown04">
                    <a class="dropnegro dropdown-item " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                              {{ __('Cerrar sesion') }}
                    </a>
    
                    <a class="dropnegro dropdown-item" href="/eventos/{{$correo}}/funciona">Mis eventos</a>
                    <a class="dropnegro dropdown-item" href="/ordenes">Mis ordenes</a>
                    <a class="dropnegro dropdown-item" href="/eventos/1/miembros/1/asociados/{{$correo}}/funciona">Miembros</a>
                    <a class="dropnegro dropdown-item" href="/tipoCerveza/{{$correo}}/funciona">Tipo de cerveza</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </div>
              </li>
              @else
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endif

                  @else
                  <li class="nav-item active dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" data-target="dropme" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                  <div class="dropdown"  >
                            <a class="" href="{{ route('logout') }}">
                    <div class="dropdown-menu" id="dropme" aria-labelledby="dropdown04">
                        <a class="dropnegro dropdown-item " href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesion') }}
                        </a>
                        <a class="dropnegro dropdown-item" href="/eventos">Mis eventos</a>
                        <a class="dropnegro dropdown-item" href="/ordenes">Mis ordenes</a>
                        <a class="dropnegro dropdown-item" href="/eventos/1/horarios/1/funciona">Horarios</a>
                        <a class="dropnegro dropdown-item" href="/tipoCerveza">Tipo de cerveza</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  </div>
                </li>
                  @endguest
                  @endif
                </ul>
                <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
                  </div>
                </nav>
    <!-- Page Content -->
    <div class="event">
  <div class="container " >
        
        <h4 class="centro">Miembros</h4>
        <table class="table table-primary table-bordered tope">
            <thead>
              <tr>
                <th scope="col">Razon Social</th>
                <th scope="col">Denominacion Comercial</th>
                <th scope="col">Web</th>
                <th scope="col">Rif</th>
                <th scope="col">Ver Correos</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Persona de contacto</th>
                <th scope="col">Ver telefonos</th>
                <th scope="col">Eventos asociados</th>


              </tr>
            </thead>
        @foreach ($miembros as $item)
            <tr>
                <td>{{$item->razon_social}}</td>
                <td>{{$item->denominacion_comercial}}</td>
                <td>{{$item->web}}</td>
                <td>{{$item->rif}}</td>

                <td width="15%">
                    <div class="container ">
                       <a href="/miembros/{{$item->id_miembro}}/correos/{{$correo}}/funciona" class="btn btn-dark btn-sm">Ver</a>
                       <a href="/correos/{{$item->id_miembro}}/miembros/{{$correo}}/funciona/create" class="btn btn-dark btn-sm">Agregar</a>
                    </div>
                </td>
                <td>
                  <form action={{ route('miembrosDestroy',['id_miembro' => $item->id_miembro]) }} method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-dark btn-sm" type="submit">Eliminar</button>
                      </form>
                </td>
                <td>
                    <a href="/miembros/{{$item->id_miembro}}/contactos/{{$correo}}/funciona" class="btn btn-dark btn-sm">Ver</a>
                    <a href="/miembros/{{$item->id_miembro}}/contactos/{{$correo}}/funciona/create" class="btn btn-dark btn-sm">Agregar</a>
                </td>
                <td width="15%">
                    <div class="container">
                        <a href="/miembros/{{$item->id_miembro}}/telefonos/{{$correo}}/funciona" class="btn btn-dark btn-sm">Ver </a>
                        <a href="/miembros/{{$item->id_miembro}}/telefonos/{{$correo}}/funciona/create" class="btn btn-dark btn-sm">Agregar</a>
                    </div>
                </td>
                <td>
                    <a href="/eventos/{{$id_evento}}/miembros/{{$item->id_miembro}}/miembroevento/{{$correo}}/funciona" class="btn btn-dark btn-sm letra">Ver</a>
                    <a href="/eventos/{{$id_evento}}/miembros/{{$item->id_miembro}}/miembroevento/{{$correo}}/funciona/create" class="btn btn-dark btn-sm letra">Agregar</a>
                </td>
            </tr>

        @endforeach
        </table>
        <a href="/eventos/{{$correo}}/miembros/{{$correo}}/asociados/{{$correo}}/funciona/create" class="btn btn-secondary btn-lg btn-block">Crear Miembro</a>


  </div>
    </div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
@endsection
