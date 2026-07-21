<?php
session_start();
include("../Modelo/db.php");
?>

<!doctype html>
<html lang="en">
<title>Media Técnica</title>

<link rel="shortcut icon" href="images/logotemp.jpeg" type="image/jpeg" style="width: 100%; height: 100%; object-fit: cover; transform: scale(10);">




<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
   
   
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://kit.fontawesome.com/923b6588de.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/48dd90bf38.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/350a713b72.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="color: white !important;">
            <div class="container-fluid">
                
                <a class="navbar-brand" href="index.php">
                    <?php 
                        if (isset($_SESSION['IdRol']) && $_SESSION['IdRol'] == 1) {
                        echo '<div style="width: 50px; height: 50px; overflow: hidden; border-radius: 200px; border: 1px solid white;">
                            <img src="images/logotemp.jpeg" alt="" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.25);">
                        </div>';
                        } elseif (isset($_SESSION['IdRol']) && $_SESSION['IdRol'] == 2) {
                            echo '<div style="width: 50px; height: 50px; overflow: hidden; border-radius: 200px; border: 1px solid white;">
                                    <img src="images/adminlogo.jpeg" alt="" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.25);">
                                </div>';
                        } else {
                            echo '<div style="width: 50px; height: 50px; overflow: hidden; border-radius: 200px; border: 1px solid white;">
                            <img src="images/logotemp.jpeg" alt="" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.25);">
                            </div>';
                        }
                    ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link navbar-custom-button-hover" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-custom-button-hover" href="nosotros.php">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-custom-button-hover" href="#Servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-custom-button-hover" href="listado.php">Listado de modalidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-custom-button-hover" aria-disabled="true" href="#Contacto">Contáctenos</a>
                        </li>

                        <!-- <?php if (isset($_SESSION['Nombres'])):?>
                            <li class="nav-item">
                                <a class="nav-link" aria-disabled="true" href="../Controlador/logout.php" style="cursor: default; color: #ffffff; letter-spacing: -1px; border: 1px solid #ffffff; border-radius: 300px; padding-right: 10px;">Cerrar sesión</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-disabled="true" href="login.php">Ingresar</a>
                            </li>
                        <?php endif; ?> -->

                        


                        <!-- <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#exampleModal"
                               style="cursor: pointer;">Ingresar</a>
                        </li> -->
                    </ul>

                    <div class="d-flex align-items-center navbar-nav">

                        
                        
                        <?php
                            if (isset($_SESSION['IdRol']) && $_SESSION['IdRol'] == 1) {
                                echo '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%; border: 1px solid white;">
                                        <img src="images/user-icon.jpg" alt="User" style="width: 100%; height: 100%; object-fit: cover;">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                    <li><span class="dropdown-item disabled" style="cursor: default; color: var(--bs-dropdown-link-color);">Bienvenido, ' . $_SESSION['Nombres'] .'</span></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" aria-disabled="true" href="../Controlador/logout.php">Cerrar sesión</a>
                                   </li>
                                </ul>
                            </div>';
                            } elseif (isset($_SESSION['IdRol']) && $_SESSION['IdRol'] = 2) {
                                echo '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%; border: 1px solid white;">
                                        <img src="images/royal-crown-vector-icon.jpg" alt="User" style="width: 100%; height: 100%; object-fit: cover;">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                    <li><span class="dropdown-item disabled" style="cursor: default; color: var(--bs-dropdown-link-color);">Bienvenido, ' . $_SESSION['Nombres'] .'</span></li>
                                    <li><span class="dropdown-item disabled" style="cursor: default; color: var(--bs-dropdown-link-color);">Rol: <span style="color:#FFD700;">Administrador</span></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="App/index.php" style="color: #FFD700;">Panel de control</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" aria-disabled="true" href="../Controlador/logout.php">Cerrar sesión</a>
                                   </li>
                                </ul>
                            </div>';
                            }
                            else {
                                echo '<a class="nav-link navbar-custom-button-hover" aria-disabled="true" href="login.php">Ingresar</a>';
                            }
                            
                        ?>
                    </div>
                    
                </div>
            </div>
        </nav>



        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="cursor: default;">Ingresar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Ingrese su correo electrónico">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña">
                        </div>
                        <p style="cursor: default;">¿Todavía no te has registrado? <a href="about:blank">REGÍSTRATE</a> </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="dashboard/dashboard2.html">
                            <button type="button" class="btn btn-primary">Ingresar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
    </header>
    <section>
        <!-- Sección con la imagen de fondo -->
        <div class="image-overlay" style="background-image: url('images/desarrollador.png');">
            <!-- Este contenido se puede superponer sobre la imagen si lo deseas -->
            <div class="content">
                   <h1 class="display-1" style= "text-shadow:-2px -2px 0 white, 2px -2px 0 white, -2px 2px 0 white, 2px 2px 0 white;; font-family: ginebra; color: #000000; cursor: default;">BIENVENIDOS</h1>
            </div>
        </div>


        <div class="container paragraph-justify">

            <div class="d-flex justify-content-center mt-5">
                <h2 class="mt-5 Mititulo">Media Técnica</h2>
            </div>
            <div class="row mt-5 mb-5">
                <h2 class="mt-2">¿Qué es la Media Técnica?</h2>
                <div class="col-md-7">
                    <p class="mt-2" style="text-align: justify">La media técnica es una formación académica que prepara a los estudiantes para el trabajo en el sector productivo y de servicios. También les permite continuar sus estudios superiores.</p>
                    <h2 class="mt-5">Objetivos de la Media Técnica</h2>
                    <p class="mt-2">
                        - Preparar a los estudiantes para el trabajo en los sectores de producción y servicios.<br />
                        - Preparar a los estudiantes para continuar sus estudios superiores<br />
                        - Desarrollar competencias laborales.<br />
                        - Fortalecer la capacidad de adaptación a las nuevas tecnologías.<br />
                    </p>
                </div>

                <div class="col-md-3">
                    
                        <img src="images/4.png" alt="Alternate Text" width="440" height="340"  />
                  
                </div>


            </div>
            <div class="row mt-5 mb-5">
               

                <div class="col-md-5">
                    <img src="images/5.png" alt="Alternate Text" width="440" height="340"/>
                </div>
                <div class="col-md-7">
                    <h2 class="mt-2" style="color: #211879;" >Especialidades</h2>
                    <p class="mt-2" style="text-align: justify !important">
                        La Media Técnica esta dirigida a la formación calificada en especialidades tales como: agropecuaria, comercio, finanzas, administración, ecología, medio ambiente, industria, informática, minería, salud, recreación, turismo, deporte y las demás que requiera el sector productivo y de servicios.
                    </p>
                    <h2 class="mt-5" style="color: #211879;">Doble Titulación</h2>
                    <p class="mt-2" style="text-align: justify !important">
                        La doble titulación en la media técnica es un programa que permite a los estudiantes obtener dos títulos: el de bachiller y un certificado técnico. Este programa se lleva a cabo en los grados décimo y once de la educación media.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <section class="mt-5 mb-5" id="Servicios">
        <div class="container">

            <div class="d-flex justify-content-center mt-5 mb-5">
                <h2 class="mb-5 mt-5 Mititulo">Nuestros Servicios</h2>
            </div>

            <div class="row mb-5 ">
                <div class="col-md-6 col-sm-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-regular fa-square-check icono"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #211879;">1.	Test Vocacional Personalizado</h5>
                                    <p class="card-text">Ofrecemos un test vocacional basado en psicometría y análisis de intereses que ayuda a los estudiantes a identificar sus fortalezas, habilidades y preferencias, facilitando una orientación clara sobre las áreas profesionales en las que podrían sobresalir.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-person-chalkboard icono"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #211879;">2.	Orientación sobre Media Técnica</h5>
                                    <p class="card-text" style="text-align:justify">Proporcionamos información detallada sobre las diferentes opciones de media técnica de acuerdo a cada institución educativa en Colombia</p>
                                    <br /><br />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row mb-5">
                <div class="col-md-6 col-sm-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-graduate icono"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #211879;">3.	Selección de la Media Técnica a Matricularse</h5>
                                    <p class="card-text">Las instituciones educativas pueden acceder a herramientas para gestionar los resultados de los estudiantes, realizar seguimientos de su orientación vocacional y ofrecer asesoramiento en tiempo real, a la vez que pueden revisar los resultados en cuanto a la selección de la Media Técnica realizada por sus estudiantes.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-regular fa-chart-bar icono"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #211879;">4.	Sistema de Seguimiento y Retroalimentación</h5>
                                    <p class="card-text">Implementamos un sistema de seguimiento que permite a los estudiantes recibir retroalimentación continua sobre su progreso en el proceso de selección vocacional y académica.</p>
                                    <br /><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-md-6 col-sm-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-regular fa-handshake icono"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #211879;">5. Información de Eventos y Capacitaciones</h5>
                                    <p class="card-text">El aplicativo permite, de acuerdo a cada institución educativa, informar a sus estudiantes sobre eventos y capacitaciones a realizar sobre la Media Técnica</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-laptop-file icono"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #211879;">6. Descarga de Reportes</h5>
                                    <p class="card-text">Cada institución educativa puede descargar los reportes de selección de Media Técnica o test vocacional realizado por sus estudiantes</p>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="mt-5 mb-5" id="Contacto">
        <div class="container-fluid mt-5 mb-5" style=" background-color: rgb(226, 226, 226) !important">
            <div class="d-flex justify-content-center mt-5 mb-5">
                <h2 class="mt-5 Mititulo">Contáctenos</h2>
            </div>
            <div class="container mt-5 mb-5" data-aos="fade-up" data-aos-delay="100">

                <div class="card-body row g-4 g-lg-5 ">
                    <div class="col-lg-5 col-md-12">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="mt-5">Información de Contacto</h2>

                            <div class="info-item mt-5" data-aos="fade-up" data-aos-delay="300">

                                <div class="content mt-5">

                                    <h4><i class="fa-solid fa-location-dot iconoInfo"></i> Nuestra Dirección</h4>
                                    <p>Cl. 84 #74-60, Barrio Robledo López de Mesa</p>
                                    <p>Medellín, Antioquia</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">

                                <div class="content mt-5">
                                    <h4> <i class="fa-solid fa-phone iconoInfo"></i>  Números telefónicos</h4>
                                    <p>+57 3245003357</p>
                                    <p>+57 3122245691</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">

                                <div class="content mt-5">
                                    <h4> <i class="fa-solid fa-envelope iconoInfo"></i>  Correo Electrónico</h4>
                                    <p>lopezdemesa16241@yahoo.es</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="mt-5">Escríbenos</h2>


                            <form action="forms/contact.php" method="post" class="php-email-form mt-5" data-aos="fade-up" data-aos-delay="200">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre Completo" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" required="">
                                    </div>

                                    <div class="col-12">
                                        <input type="text" class="form-control" name="subject" placeholder="Asunto" required="">
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Mensaje" required=""></textarea>
                                    </div>

                                    <div class="col-12 text-center">

                                        <button type="submit" class="btn btn-primary custom-btn">Enviar mensaje</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8450599433772!2d-75.5805127!3d6.2840888999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44292eb929fc61%3A0x33d78c3c6ef01884!2sI.E.%20Luis%20L%C3%B3pez%20de%20Mesa!5e0!3m2!1ses!2sco!4v1740680845728!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


            </div>
        </div>
         
    </section style=" background-color: rgb(177, 177, 177) !important"><!-- /Contact Section -->

    <footer>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="bootstrap" viewBox="0 0 118 94">
                <title>Bootstrap</title>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
            </symbol>
            <symbol id="facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </symbol>
            <symbol id="instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </symbol>
            <symbol id="twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
            </symbol>
        </svg>

        <div class="container style=" style="background-color: rgb(226, 226, 226) !important">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-body-secondary" style="color: #000000 !important;">&copy; 2025 MT</p>

                <a href="index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="images/logotemp.jpeg" alt="" style="border-radius: 200px; object-fit: cover; border: 1px solid white;" width="40" height="40">
                </a>                

                <ul class="nav col-md-4 justify-content-end" style="color: #000000 !important;">
                    <li class="nav-item" style="color: #000000 !important;"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item" style="color: #000000 !important;"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                    <li class="nav-item" style="color: #000000 !important;"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                    <li class="nav-item" style="color: #000000 !important;"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    <li class="nav-item" style="color: #000000 !important;"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
                </ul>
            </footer>
        </div>
    </footer>







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="js/bootstrap.bundle.js"></script>

    <script src="" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>