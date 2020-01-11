@extends('layouts.listaEventoslayout')
@section('content')


     <!-- Navigation -->

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

      <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
              <a class="nav-link tamano" href="/home/{{$correo}}/funciona">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
            <li class="nav-item tamano">
              <a class="nav-link" href="/catalogo">Catalogo</a>
            </li>
            <li class="nav-item tamano">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item tamano">
              <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item tamano">
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
                    @if ($rol != 3)
                    <a class="dropnegro dropdown-item" href="/eventos/1/miembros/1/asociados">Miembros</a>
                    @endif
                    <a class="dropnegro dropdown-item" href="/tipoCerveza">Tipo de cerveza</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </div>
              </li>
            @else
          @guest

          <li class="nav-item tamano">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item tamano">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
              </li>
          @endif

        @else
          <li class="nav-item active dropdown tamano">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" data-target="dropme" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
            <div class="dropdown"  >
                      <a class="" href="{{ route('logout') }}">
              <div class="dropdown-menu" id="dropme" aria-labelledby="dropdown04">
                  <a class="dropnegro dropdown-item tamano" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __(' Cerrar sesion') }}
                  </a>

                <a class="dropnegro dropdown-item tamano" href="/eventos">Mis eventos</a>
                <a class="dropnegro dropdown-item tamano" href="/ordenes">Mis ordenes</a>

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
            <input class="form-control mr-sm-2 tamano" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark my-2 my-sm-0 tamano" type="submit">Search</button>
          </form>
        </div>
      </div>

    </nav>

<!-- Page Content -->

  <div class="container">
      
      <h3 class="centro letra">Horario</h3>
      <table class="table table-light">
          <thead class="thead-dark">
            <tr>
              <th class="letra"scope="col">Dia</th>
              <th class="letra" scope="col">Hora Inicio</th>
              <th class="letra" scope="col">Hora Fin</th>
              @if ($rol != 3)
              <th class="letra" scope="col" id="eliminar">Eliminar</th>
              @endif
              <th class="letra" scope="col">Evento asignado</th>
            </tr>
          </thead>
          @foreach ($horarios as $item)
          <tr>
              <td class="letra">{{$item->dia}}</td>
              <td class="letra">{{$item->hora_inicio}}</td>
              <td class="letra">{{$item->hora_fin}}</td>
              
              @if ($rol != 3)
              <td>
                <form action={{ route('horariosDestroy',['id_horario' => $item->id_horario]) }} method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                      <button class="btn btn-dark btn-sm tamano letra" type="submit">Eliminar</button>
                    </form>
              </td>
              @endif

              <td>
              <a href="/eventos/{{$id_evento}}/horarios/{{$item->id_horario}}/hola/{{$correo}}/funciona" class="btn btn-dark btn-sm letra">Ver</a>
              @if ($rol != 3)
              <a href="/eventos/{{$id_evento}}/horarios/{{$item->id_horario}}/hola/{{$correo}}/funciona/create" class="btn btn-dark btn-sm letra">Agregar</a>
              @endif
            </td>
          </tr>
      @endforeach

      </table>
      <!--<a href="/horario/create" class="btn btn-secondary btn-lg btn-block">Nuevo Horario</a>-->
      
      <!--Todo lo que tiene 1 es para que funcione la ruta y ya hola tambien-->
  </div>

  @endsection
