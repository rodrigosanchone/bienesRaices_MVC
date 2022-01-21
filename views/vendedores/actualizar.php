<main class="contenedor sección">
    <h1>Actualizar vendedor</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php
    foreach ($errores as $error) :
    ?>
        <div class="alerta error">
            <?php
            echo $error;
            ?>
        </div>

    <?php
    endforeach;
    ?>
    <form class="formulario" method="POST" >
        <?php
          include 'formulario.php';
        ?>
        <input type="submit" value="Registrar" class="boton boton-verde">
    </form>
</main>