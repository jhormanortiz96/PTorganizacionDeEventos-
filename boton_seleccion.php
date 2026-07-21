<?php

session_start();
include("../Modelo/db.php");


// assuming the logged-in user ID is stored in the session
$idUsuario = $_SESSION['IdUsuario'];

// get user info from 'usuarios'

$query = "SELECT IdUsuario, NumDoc, Nombres, Apellidos, Grado, IdGrupo 
          FROM usuarios
          WHERE IdUsuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc(); // this sets $user




if ($user) {
    // insert into seleccion
    $insert = "INSERT INTO seleccion (IdEstudiante, NumDoc, Nombres, Apellidos, Grado, IdGrupo)
               VALUES (?, ?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($insert);
    $stmt2->bind_param("iissii", 
        $user['IdUsuario'],
        $user['NumDoc'],
        $user['Nombres'],
        $user['Apellidos'],
        $user['Grado'],
        $user['IdGrupo']
    );
    $stmt2->execute();

    if ($stmt2->affected_rows > 0) {
        $success = "✅ Inscripción realizada con éxito.";
    } else {
        $error = "⚠️ Error al realizar la inscripción.";
    }
} else {    
    echo "❌ Usuario no encontrado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inscripción realizada</title>
  <link rel="shortcut icon" href="images/logotemp.jpeg" type="image/jpeg">  
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
                <a class="navbar-brand mx-auto" href="index.php">
                    <img src="images/logotemp.jpeg" alt="" width="50px" height="50px" style="border-radius: 200px; object-fit: cover; border: #fff; border: 1px solid white">
                </a>
            </div> 
  </nav>


    <?php
        if ($success){
            echo '<div class="alert alert-success text-center mx-auto col-5 mt-5" style="position: relative; margin-top: 5rem !important;">' . $success . '</div>';
        }
        else if ($error){
            echo '<div class="alert alert-danger text-center mx-auto col-5 mt-5" style="position: relative; margin-top: 5rem !important;">'. $error. '</div>';
        }
    ?>
    
    </form>

    

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
