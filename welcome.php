<?php
session_start();
if (!isset($_SESSION['Nombres'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenida</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombres']); ?>!</h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="index.php">Volver a la página principal</a>
    <br>
    <a href="logout.php" class="btn logout">Cerrar sesión</a>
  </div>
</body>
</html>

