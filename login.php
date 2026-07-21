<?php
session_start();
include("../Modelo/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $NumDoc = $_POST["NumDoc"];
  $Contrasena = $_POST["Contrasena"];

  $NumDoc = mysqli_real_escape_string($conn, $NumDoc);
  $Contrasena = mysqli_real_escape_string($conn, $Contrasena);

  $query = "SELECT IdUsuario, IdRol, Nombres, NumDoc, Contrasena 
          FROM usuarios 
          WHERE NumDoc = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $NumDoc);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  
    
  if ($user) {
    if ($Contrasena === $user["Contrasena"]) {
      $_SESSION["IdRol"] = $user["IdRol"];
      $_SESSION["Nombres"] = $user["Nombres"];
      $_SESSION["NumDoc"]  = $user["NumDoc"];
      $_SESSION["IdUsuario"] = $user["IdUsuario"];
      if (isset($_SESSION['IdRol']) && $_SESSION['IdRol'] == 1) {
        header("Location: index.php");
        exit();
      }
      elseif (isset($_SESSION['IdRol']) && $_SESSION['IdRol'] == 2) {
        header("Location: App/index.php");
      }
    } else {
         $_SESSION['error'] = "❌ Contraseña incorrecta.";
         header("Location: login.php"); 
         exit();
    }
  
  } else {
    $_SESSION['error'] = "❌ Usuario no encontrado";
    header("Location: login.php"); 
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="shortcut icon" href="images/logotemp.jpeg" type="image/jpeg">  
  <link rel="stylesheet" href="color_style.css">
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://kit.fontawesome.com/923b6588de.js" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/48dd90bf38.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/350a713b72.js" crossorigin="anonymous"></script>
  
</head>
<body class="">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="color: white !important;">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href="index.php"><img src="images/logotemp.jpeg" alt="" width="50px" height="50px" style="border-radius: 200px; object-fit: cover; border: #fff; border: 1px solid white"></a> 
  </nav>

  <?php
    // Show any alert messages and collect whether we need the small top margin
    $hasAlert = false;
    // Show only one alert: invalid_session has priority over no_permission
    if (isset($_SESSION['invalid_session'])) {
      echo '<div class="alert alert-danger text-center mx-auto col-5 mt-5" style="position: relative;">' . htmlspecialchars($_SESSION['invalid_session']) . '</div>';
      $hasAlert = true;
      unset($_SESSION['invalid_session']);
    } elseif (isset($_SESSION['no_permission'])) {
      echo '<div class="alert alert-danger text-center mx-auto col-5 mt-5" style="position: relative;">' . htmlspecialchars($_SESSION['no_permission']) . '</div>';
      $hasAlert = true;
      unset($_SESSION['no_permission']);
    }

    // Single container: smaller top margin when there's an alert, otherwise larger margin
    $marginTop = $hasAlert ? '1%' : '7%';
    echo '<div class="container col-4" style="margin-top: ' . $marginTop . '">';
  ?>
    <h3 style="text-align: center;">Iniciar sesión</h1>
    
    <form method="POST" class="form mx-auto col-10" onsubmit="return validateForm()">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Número de documento</label>
        <input type="text" class="form-control" name="NumDoc" required oninvalid="this.setCustomValidity('Por favor rellena este campo.')" oninput="this.setCustomValidity('')">
      </div>
      <div class="mb-1">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="Contrasena" required oninvalid="this.setCustomValidity('Por favor rellena este campo.')" oninput="this.setCustomValidity('')">
      </div>
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center">
          <?= $_SESSION['error']; ?>
          <br> <a href="" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#olvidaste-tu-contrasena" style="color:#FFD700; text-decoration:none">¿Olvidaste tu contraseña?</a>
        </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>


      <button type="submit" class="boton-seleccionar mt-4 mb-2" style="border-radius: var(--bs-border-radius) !important;">Entrar</button>
      <button type="button" class="btn btn-secondary align-items-center mx-auto" data-bs-toggle="modal" data-bs-target="#info-cuentas">¿No tienes una cuenta?</button>
      
    </form>

    <!-- Modal -->
        <div class="modal" tabindex="-1" id="info-cuentas" style="margin-top: 7%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Las cuentas en este sitio solo pueden ser creadas por los encargados de cada institución educativa. Contacta al área directiva en caso de que no poseas una cuenta o no encontremos tu usuario.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

      <!-- Modal 2 -->

     <div class="modal" tabindex="-1" id="olvidaste-tu-contrasena" style="margin-top: 7%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Si has olvidado tu contraseña, deberás contactar al encargado de la gestión de esta página en tu institución.</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
              </div>
          </div>
       </div>
      

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  
</body>
</html>
