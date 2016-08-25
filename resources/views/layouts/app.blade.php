<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="icon" type="image/png" href="images/logo.jpg"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">     
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="css/estilosBanner.css">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .boton_face {
            position: fixed !important;
            bottom: 58% !important;
            right: 0px;
        }
        .boton_inst {
            position: fixed !important;
            bottom: 52% !important;
            right: 0px;
        }
        .boton_twit {
            position: fixed !important;
            bottom: 46% !important;
            right: 0px;
        }
        .boton_mail {
            position: fixed !important;
            bottom: 40% !important;
            right: 0px;
        }
        img {
            color: transparent;
            font-size: 0;
            vertical-align: middle;
            -ms-interpolation-mode: bicubic;
        }
        .imagenRedes {
            width: 39px;
        } 
        .enlace_zopim {
            text-decoration: none !important;
            color: white !important;
            vertical-align: middle !important;
        }

        .main-wrapper {

          position: relative;
          padding-bottom: 0;
        }
        .wrapper1 {
          background:#533359; 
          width: 100%;
          height: 9em;  
          overflow: hidden;
          padding: 0px;
        }
            
        .section .h1  {
          font-size: 1.2em;
          text-align: left;
          font-weight: bold;
          margin: 0.4em;
        }
            
        .section {
          float: left;
          background:#533349; 
          width: 70%;
          color: #B9F700;
          height: 9em;   
        }
            

        footer {
          background: #B9F700;
          /*min-height: 3.5em;
          position: absolute;
          bottom: 0;*/
          position: fixed;
          z-index: 999;
          width: 100%;
          bottom: 0;
          max-height: 10vh;
          width: 100%;
          color: #533359;
        }
        footer h4{
            font-size: 1em;
        }
        .vertical-centered-text {
          -ms-display: flex;
          display: flex;
          /* alineacion vertical */
          align-items: bottom;
           /* alineacion horizontal */
          justify-content: center;
        }
/** ---------------------------------------
 * Responsive 
 ----------------------------------------*/
@media only screen and (max-width: 825px) {
    .container {
        width: 500px;
    }

    .wrapper1 {
        height: 260px;
    }
 }

 @media only screen and (max-width: 535px) {
    .container {
        padding: 5px;
        width: 100%;
        margin: 40px 0 0 0;
    }

    .slider-wrapper {
        height: 200px;
    }
    
    .wrapper .caption {
        display: none;
    }

 }

 @media only screen and (max-width: 410px) {

    footer h4{
            font-size: 0.6em;
        }
        .imagenRedes {
            width: 20px;
        }
        .boton_face {
            position: fixed !important;
            bottom: 69% !important;
            right: 0px;
        }
        .boton_inst {
            position: fixed !important;
            bottom: 66% !important;
            right: 0px;
        }
        .boton_twit {
            position: fixed !important;
            bottom: 63% !important;
            right: 0px;
        }
        .boton_mail {
            position: fixed !important;
            bottom: 60% !important;
            right: 0px;
        }  
 }    
    </style>
</head>
<body id="app-layout">
<header>
        <div class="logo"><a href="https://gopetsstore.com"><img src="images/Logo.jpg" alt="Go! Pets Store"></a></div>
        <div>
            <div class="iniciarsesion"><a href="#"><img src="images/IniciarSesion.png" alt="Iniciar Sesión"></a></div>
            <p><a href="#" title="Iniciar Sesión">Iniciar Sesión</a></p>
            <div class="lineaVertPeq"></div>
            <div class="carrito"><a href="#"><img src="images/carrito.png" alt="Carrito de Compras"></a></div>
        </div>
        <section class="barraMenuSaludo">
            <ul class="menuPrincipal">
                <li><a href="#" title="Inicio">Inicio</a></li>
                <li><a href="#" title="Inicio">Inicio</a></li>
                <li><a href="#" title="Inicio">Inicio</a></li>
                <li><a href="#" title="Productos">Productos</a>
                    <ul id="submenu">
                        <li><a href="#" title="Categoria 1"><div>Categoria 1</div></a></li>
                        <li><a href="#" title="Categoria 2"><div>Categoria 2</div></a></li>
                        <li><a href="#" title="Categoria 3"><div>Categoria 3</div></a></li>
                        <li><a href="#" title="Categoria 4"><div>Categoria 4</div></a></li>
                        <li><a href="#" title="Categoria 5"><div>Categoria 5</div></a></li>         
                    </ul>
                </li>
                <li><a href="#" title="Acerca de Nosotros">Nosotros</a>
                    <ul id="submenu">
                        <li><a href="#" title="Categoria 1"><div>Categoria 1</div></a></li>
                        <li><a href="#" title="Categoria 2"><div>Categoria 2</div></a></li>
                        <li><a href="#" title="Categoria 3"><div>Categoria 3</div></a></li>
                        <li><a href="#" title="Categoria 4"><div>Categoria 4</div></a></li>
                        <li><a href="#" title="Categoria 5"><div>Categoria 5</div></a></li>         
                    </ul>
                    </li>
                <li><a href="#" title="Contacto">Contacto</a></li>
            </ul>
            <div class="phone"><img src="images/telephone.png" alt="Teléfono"><p>+1-954-952-4891</p></div>
        </section>  
    </header>   

   
    @yield('content')
    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="js/proyecto.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('scripts') 
<div>
    <a href="#" class="enlace_zopim">
        <div class="boton_face" id="boton_face"><img class="imagenRedes" src="images/facebook.png"></div>
    </a>
    <a href="#" class="enlace_zopim">
        <div class="boton_inst" id="boton_inst"><img class="imagenRedes" src="images/instagram.png"></div>
    </a>
    <a href="#" class="enlace_zopim">
        <div class="boton_twit" id="boton_twit"><img class="imagenRedes" src="images/twitter.png"></div>
    </a>
    <a href="#" class="enlace_zopim">
        <div class="boton_mail" id="boton_mail"><img class="imagenRedes" src="images/mail.png"></div>
    </a>
    </div>
 <div class="wrapper1 vertical-centered-text">
    <section id="main-section" class="section vertical-centered-text">
    <div class="menuFoot">
        <h1 class="h1">Nosotros</h1>
         <ul class="navFoot">
         <li><a href="{{ url('/home') }}">Opcion 1</a></li>
         <li><a href="{{ url('/home') }}">Opcion 2</a></li>
         <li><a href="{{ url('/home') }}">Opcion 3</a></li>
         </ul>
    </div>
    </section>
 </div>
<footer>
    <div class="vertical-centered-text">
        <h4>Derechos reservados para GoPetsStore    |    Website diseñado por Anysa Tech LLC 2016</h4>
    </div>    
</footer>            
</body>
</html>
    <script type="text/javascript">
        // Scripts para hacer una solucion dinamica

  // Creamos una funcion con variables que obtengan la altura dinamica del footer 
          function footerDinamico() {

            //Obtenemos la altura del footer
            var alturaFooter = $('footer').height();
            var paddingFooter = $('footer').css('padding-top').replace(/[^-\d\.]/g, '');
            var alturaFooterDinamica = parseInt(alturaFooter) + parseInt(paddingFooter);
            //Asiganos a wrapper un padding inferior para que el footer no se encime al contenido
            $('.wrapper1').css({
              'padding-bottom':alturaFooterDinamica
            });
            
          }

          $(document).ready( function() {
            footerDinamico();
          });
          $(window).resize(function() {
            footerDinamico();
          });
    </script>