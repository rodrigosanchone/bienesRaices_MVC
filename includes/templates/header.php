<?php

if (!isset($_SESSION)) {
  session_start();
}
// var_dump($_SESSION);

$auth = $_SESSION['login'] ?? false;

//var_dump($auth);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices</title>
  <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
  <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">
          <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
        </a>

        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="menu-hamburguesa">
        </div>
        <div class="derecha">
          <img src="/build/img/dark-mode.svg" class="dark-mode-boton">
          <nav class="navegacion">
            <a href="nosotros.php">
              Nosotros
            </a>
            <a href="/anuncios.php">
              Anuncios
            </a>
            <a href="/blog.php">
              Blog
            </a>
            <a href="/contacto.php">
              Contacto
            </a>
            <?php if (!$auth) : ?>
            <a href="/login.php">
              Login
            </a>
            <?php endif; ?>
            <?php if ($auth) : ?>
              <a href="/cerrar-sesion.php">
                 Cerrar Sesión
              </a>
            <?php endif; ?>
          </nav>
        </div>

      </div>
      <!--Cierre de la barra-->

      <?php
      if ($inicio) {
        echo "<h1> Ventas de casas y departamentos de lujos</h1>";
      }
      ?>

    </div>
  </header>