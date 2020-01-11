<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ACAVUCAB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    
    <style>
    .carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
 .alinear{
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;

 }
 .checkout-mine{
   margin-top: -200px !important;
 }
    .fondo{
    background-color: black;

  }
  .espacio{
    display: inline;
    color: white;
  }
  nav.navbar {
  
    background: #141519;
    background: linear-gradient(to right, #424448, #B7BCCD);
    /*height: 58px; /* aqui escoges el alto que necesites */
 
}
.siz{
    width: 20px;
}
.dropnegro{
  color: #141519;
  text-align: center;
  
}

    </style>
  </head>
  <body class="goto-here">
		
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " >
        <a class="navbar-brand ml-auto" href="/">
          <img src="/add_shopping_cart-24px.svg" width="30" height="30" class="d-inline-block align-top " alt="">
        </a>
	    <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            
            <ul class="navbar-nav mr-auto ">
              <li class="nav-item letra active">
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
              <div class="dropdown">
                        <a class="" href="{{ route('logout') }}">
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropnegro dropdown-item " href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesion') }}
                    </a>
                   
                  <a class="dropnegro dropdown-item" href="/eventos">Mis eventos</a>
                  <a class="dropnegro dropdown-item" href="/ordenes">Mis ordenes</a>
                  <a class="dropnegro dropdown-item" href="/horario">Horarios</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </div>
            </li>
          @endguest
          @endif
            </ul>
            <form class="form-inline my-2 my-lg-0 ">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-dark my-2 my-sm-0 " type="submit">Search</button>
            </form>
          </div>
        </div>

	      
    </nav>
    <!-- END nav -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active " style="background-image: url(/fondoevento.jpg); ">
            <div class="carousel-caption d-none d-md-block alinear ">
              <div class="container fondo col-sm-4  ">
              <h1 class="display-4 checkout-mine">Checkout</h1>
              </div>
              
            </div>
          </div>
        </div>
    
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						
              <h3 class="mb-4 billing-heading">Detalles de facturación</h3>
              <form method="POST" action="/comprar/{{$id_venta}}/venta/{{$id_entrada}}/entrada/{{$correo}}/funciona" class="billing-form">
                @csrf
	          	<div class="row align-items-end" id="creditos" >
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Nombre de banco</label>
	                  <input type="text" class="form-control" placeholder="" name="nombre_banco" required>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Numero de tarjeta</label>
	                  <input type="number" class="form-control" placeholder="" name="numero_tarjeta" required>
	                </div>
                </div>
                <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Fecha de vencimiento</label>
                    <input type="date" class="form-control" placeholder="" name="fecha_vencimiento" required>
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
                </div>
                <button type="submit" class="btn btn-primary py-3 px-4">Efectuar Pago</button>
                
              </div>
            </form><!--Aqui termina el form de tarjeta de credito-->
	          
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$17.60</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Metodo de pago</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" id="trans" name="optradio" class="mr-2"> Transferencia</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" id="cheque" name="optradio" class="mr-2"> Cheque</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" id="credito" name="optradio" class="mr-2"> Tarjeta de Credito</label>
											</div>
										</div>
                  </div>
                  <div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" id="debito" name="optradio" class="mr-2"> Tarjeta de Debito</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

	
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('input:radio[id=credito]').attr('checked',true);
          $('#creditos').show(); // Add this
      $("#credito").on( "click", function() {
          $('#creditos').show(); //muestro mediante id
      });
      $("#trans").on( "click", function() {
        $('#creditos').hide(); //oculto mediante id
      });
    });
    </script>
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>