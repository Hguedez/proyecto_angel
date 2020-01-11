@extends('layouts.registerlayout')

@section('content')
    
 <!-- Navigation -->

 @inject('lugares','App\Services\Lugares')

 <div class="container">
  <div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
      <div class="card card-signin flex-row my-5">
        <div class="card-img-left d-none d-md-flex">
          <!-- Background image for card set in CSS! -->
       </div>
              <div class="card-body col-sm-6">
                  <h5 class="card-title text-center">Registrarse</h5>
                  
                  <form method="POST" action="/loginAdmin">
                      @csrf
                      <ul class="nav nav-tabs linea">
                        <li class="nav-item">
                          <a class="nav-link active" href="/register">Admin y clientes</a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link" href="/empleado/create">Empleados</a>
                        </li>
                      </ul>
                      <br>
                            <input type="radio" id="admin" value="administrador" name="tipo">
                            <label for="admin">Admin</label>
                            <input type="radio" id="natural" value="natural" name="tipo">
                            <label for="natural">Cliente Natural</label>
                            <input type="radio" id="juridico" value="juridico" name="tipo">
                            <label for="juridico">Cliente juridico</label>
                            <!--<input type="radio" id="empleado" value="empleado" name="tipo">
                            <label for="empleado">Empleado</label>-->
                           
        
                      <div class="form-group row" id="email">
                          <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                          <div class="col-md-7">
                              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      

                      <div class="form-group row" id="password">
                          <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-7">
                              <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>


                      <div class="form-group row" id="password_C">
                          <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                          <div class="col-md-7">
                              <input id="password-confirm" type="password" placeholder="Confirm-Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>
                   
                              <button  id="boton" type="submit" class="btn btn-lg btn-dark btn-block text-uppercase">
                                  {{ __('Registrarse') }}
                              </button>
                  </form>   
                <form method="POST" action="/clienteNatural">
                    @csrf
                   <!-- Aqui empieza cliente natural--------------------------------------------------->
                    
                   <div class="form-group row " id="nombre1">
                    <label for="name" class="col-md-5 col-form-label text-md-right tamano" >Primer Nombre</label>

                    <div class="col-md-7">
                         
                        <input id="name" type="text" placeholder="Primer Nombre" class="form-control @error('name') is-invalid @enderror tamano" name="primer_nombre"  required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row" id="nombre2">
                    <label for="name2" class="col-md-5 col-form-label text-md-right tamano" >Segundo Nombre</label>

                    <div class="col-md-7">
                          
                        <input id="name2" type="text" placeholder="Segundo Nombre" class="form-control tamano" name="segundo_nombre" required autocomplete="name2">

                    </div>
                </div>
                

                <div class="form-group row" id="apellido_1">
                    <label for="apellido" class="col-md-5 col-form-label text-md-right tamano" >Primer Apellido</label>

                    <div class="col-md-7">
                        <input id="apellido" type="text" placeholder="Primer Apellido" class="form-control tamano" name="primer_apellido" required autocomplete="apellido">

                    </div>
                </div>

                <div class="form-group row" id="apellido_2">
                    <label for="apellido2" class="col-md-5 col-form-label text-md-right tamano" >Segundo Apellido</label>

                    <div class="col-md-7">
                        <input id="apellido2" type="text" placeholder="Segundo Apellido" class="form-control tamano" name="segundo_apellido" required autocomplete="apellido2">

                    </div>
                </div>

                <div class="form-group row" id="cedula_1">
                    <label for="cedula" class="col-md-5 col-form-label text-md-right tamano" >Cedula</label>

                    <div class="col-md-7">
                        <input id="cedula" type="number" placeholder="Cedula" class="form-control tamano" name="cedula" required autocomplete="cedula">

                    </div>
                </div>

                <div class="form-group row" id="rif_1">
                    <label for="rif" class="col-md-5 col-form-label text-md-right tamano" >Rif</label>

                    <div class="col-md-7">
                        <input id="rif" type="text" placeholder="Rif" class="form-control tamano" name="rif" required autocomplete="rif">

                    </div>
                </div>

                <div class="form-group row" id="numero_carnet">
                  <label for="carnet" class="col-md-5 col-form-label text-md-right tamano" >Numero Carnet</label>

                  <div class="col-md-7">
                      <input id="carnet" type="number" placeholder="Numero de Carnet" class="form-control tamano" name="numero_carnet" required autocomplete="cedula">

                  </div>
              </div>
              <!--Aqui va el correo-->
              
              <div class="form-group row" id="email_1">
                <label for="email" class="col-md-5 col-form-label text-md-right tamano">Email</label>

                <div class="col-md-7">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror tamano" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            

            <div class="form-group row" id="password_1">
                <label for="password" class="col-md-5 col-form-label text-md-right tamano">{{ __('Password') }}</label>

                <div class="col-md-7">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror tamano" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row" id="password_c2">
                <label for="password-confirm" class="col-md-5 col-form-label text-md-right tamano">{{ __('Confirm Password') }}</label>

                <div class="col-md-7">
                    <input id="password-confirm" type="password" placeholder="Confirm-Password" class="form-control tamano" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div id="direccion">
            <div class="form-group row">
                <label for="lugar" class="col-md-8 col-form-label text-md-right">DIRECCION</label>
              </div>

              <div class="form-group row">
                <label for="lugar" class="col-md-5 col-form-label text-md-right">Estado</label>

                <div class="col-md-6">
                    <select id="estado" name="id_lugar" class="form-control{{ $errors->has('id_lugar') ? ' is-invalid' : '' }}">
                        @foreach($lugares->get() as $index => $lugar)
                            <option value="{{ $index }}" {{ old('id_lugar') == $index ? 'selected' : '' }}>
                                {{ $lugar }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('id_lugar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_lugar') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="lugar" class="col-md-5 col-form-label text-md-right">Municipio</label>

                <div class="col-md-6">
                    <select id="municipio" data-old="{{ old('id_lugar') }}" name="id_lugar" class="form-control{{ $errors->has('id_lugar') ? ' is-invalid' : '' }}"></select>

                    @if ($errors->has('id_lugar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_lugar') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="lugar" class="col-md-5 col-form-label text-md-right">Parroquia</label>

                <div class="col-md-6">
                    <select id="parroquia" data-old="{{ old('id_lugar') }}" name="parroquia" class="form-control{{ $errors->has('id_lugar') ? ' is-invalid' : '' }}"></select>

                    @if ($errors->has('id_lugar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_lugar') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
            </div>
              <!--Aqui termina el correo-->
              <button  id="boton2" type="submit" class="btn btn-lg btn-dark btn-block text-uppercase btn-tamano">
                {{ __('Registrarse') }}
            </button>
              <!--Aqui termina cliente natural-->

                </form>
                <!--Aqui empieza cliente juridico----------------------------------------------->
        <div id="muestra_juridico">
            <form method="POST" action="/clienteJuridico">
              @csrf
          
             <div class="form-group row ">
              <label for="name" class="col-md-5 col-form-label text-md-right tamano" >Denominacion comercial</label>

              <div class="col-md-7">
                   
                  <input id="name" type="text" placeholder="Denominacion comercial" class="form-control @error('name') is-invalid @enderror tamano" name="denominacion_comercial"  required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row" >
              <label for="name2" class="col-md-5 col-form-label text-md-right tamano" >Razon social</label>

              <div class="col-md-7">
                    
                  <input id="name2" type="text" placeholder="Razon social" class="form-control tamano" name="razon_social" required autocomplete="name2">

              </div>
          </div>
          

          <div class="form-group row" >
              <label for="apellido" class="col-md-5 col-form-label text-md-right tamano" >Web</label>

              <div class="col-md-7">
                  <input id="apellido" type="url" placeholder="Web" class="form-control tamano" name="web" required autocomplete="apellido">

              </div>
          </div>

          <div class="form-group row" >
              <label for="apellido2" class="col-md-5 col-form-label text-md-right tamano" >Capital</label>

              <div class="col-md-7">
                  <input id="apellido2" type="number" placeholder="Capital" class="form-control tamano" name="capital" required autocomplete="apellido2">

              </div>
          </div>

          <div class="form-group row" >
              <label for="cedula" class="col-md-5 col-form-label text-md-right tamano" >Direccion Fiscal</label>

              <div class="col-md-7">
                  <input id="cedula" type="text" placeholder="Direccion fiscal" class="form-control tamano" name="direccion_fiscal" required autocomplete="cedula">

              </div>
          </div>

          <div class="form-group row" >
              <label for="rif" class="col-md-5 col-form-label text-md-right tamano" >Rif</label>

              <div class="col-md-7">
                  <input id="rif" type="text" placeholder="Rif" class="form-control tamano" name="rif" required autocomplete="rif">

              </div>
          </div>

          <div class="form-group row" >
            <label for="carnet" class="col-md-5 col-form-label text-md-right tamano" >Numero Carnet</label>

            <div class="col-md-7">
                <input id="carnet" type="number" placeholder="Numero de Carnet" class="form-control tamano" name="numero_carnet" required autocomplete="cedula">

            </div>
        </div>
        <!--Aqui va el correo-->
        
        <div class="form-group row" >
          <label for="email" class="col-md-5 col-form-label text-md-right tamano">Email</label>

          <div class="col-md-7">
              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror tamano" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
          <label for="password" class="col-md-5 col-form-label text-md-right tamano">{{ __('Password') }}</label>

          <div class="col-md-7">
              <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror tamano" name="password" required autocomplete="new-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
          <label for="password-confirm" class="col-md-5 col-form-label text-md-right tamano">{{ __('Confirm Password') }}</label>

          <div class="col-md-7">
              <input id="password-confirm" type="password" placeholder="Confirm-Password" class="form-control tamano" name="password_confirmation" required autocomplete="new-password">
          </div>
      </div>
      <div id="direccion_1">
      <div class="form-group row">
          <label for="lugar" class="col-md-8 col-form-label text-md-right">DIRECCION NATURAL</label>
        </div>

        <div class="form-group row">
          <label for="lugar" class="col-md-5 col-form-label text-md-right">Estado</label>

          <div class="col-md-6">
              <select id="estado2" name="id_lugar" class="form-control{{ $errors->has('id_lugar') ? ' is-invalid' : '' }}">
                  @foreach($lugares->get() as $index => $lugar)
                      <option value="{{ $index }}" {{ old('id_lugar') == $index ? 'selected' : '' }}>
                          {{ $lugar }}
                      </option>
                  @endforeach
              </select>

              @if ($errors->has('id_lugar'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('id_lugar') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="lugar" class="col-md-5 col-form-label text-md-right">Municipio</label>

          <div class="col-md-6">
              <select id="municipio2" data-old="{{ old('id_lugar') }}" name="id_lugar" class="form-control{{ $errors->has('id_lugar') ? ' is-invalid' : '' }}"></select>

              @if ($errors->has('id_lugar'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('id_lugar') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="lugar" class="col-md-5 col-form-label text-md-right">Parroquia</label>

          <div class="col-md-6">
              <select id="parroquia2" data-old="{{ old('id_lugar') }}" name="parroquia" class="form-control{{ $errors->has('id_lugar') ? ' is-invalid' : '' }}"></select>

              @if ($errors->has('id_lugar'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('id_lugar') }}</strong>
                  </span>
              @endif
          </div>
        </div>
    </div>
        <!--Aqui termina el correo-->
        <button  type="submit" class="btn btn-lg btn-dark btn-block text-uppercase btn-tamano">
          {{ __('Registrarse') }}
      </button>
          </form>
            </div>
            <!--Aqui termina cliente juridico-->
            <!---------------Aqui empieza Empleado ------------------------------------------------------------->
    
            <!--Aqui termina cliente empleado-->
                         
                          </div>
                      </div>
              </div>
              </div>
            </div>
          </div>
        </div>
          
@endsection

@section('script')
    <script>
            $('#estado').on('change',function(){
                var id_estado = $(this).val();
                if ($.trim(id_estado) != ''){
                    $.get('municipios',{id_lugar:id_estado},function(municipios){
                        $("#municipio").find('option').remove();
                        $('#municipio').append("<option value=''>Selecciona un municipio</option>");
                        $.each(municipios,function(index,valor){
                            $('#municipio').append("<option value='" + index + "'>" + valor + "</option>")
                        });
                    });
                }
            });
    </script>

    <script>
            $('#municipio').on('change',function(){
                var id_municipio = $(this).val();
                if ($.trim(id_municipio) != ''){
                    $.get('parroquias',{id_lugar:id_municipio},function(parroquias){
                        $("#parroquia").find('option').remove();
                        $('#parroquia').append("<option value=''>Selecciona una parroquia</option>");
                        $.each(parroquias,function(index,valor){
                            $('#parroquia').append("<option value'" + index + "'>" + valor + "</option>")
                        });
                    });
                }
            });
    </script>
    <script>
        $('#estado2').on('change',function(){
            var id_estado = $(this).val();
            if ($.trim(id_estado) != ''){
                $.get('municipios',{id_lugar:id_estado},function(municipios){
                    $("#municipio2").find('option').remove();
                    $('#municipio2').append("<option value=''>Selecciona un municipio</option>");
                    $.each(municipios,function(index,valor){
                        $('#municipio2').append("<option value='" + index + "'>" + valor + "</option>")
                    });
                });
            }
        });
</script>

<script>
        $('#municipio2').on('change',function(){
            var id_municipio = $(this).val();
            if ($.trim(id_municipio) != ''){
                $.get('parroquias',{id_lugar:id_municipio},function(parroquias){
                    $("#parroquia2").find('option').remove();
                    $('#parroquia2').append("<option value=''>Selecciona una parroquia</option>");
                    $.each(parroquias,function(index,valor){
                        $('#parroquia2').append("<option value'" + index + "'>" + valor + "</option>")
                    });
                });
            }
        });
</script>
@endsection