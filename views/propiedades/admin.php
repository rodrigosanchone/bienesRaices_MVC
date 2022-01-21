<main class="contenedor sección">
  <?php
  if ($resultado) {
    $mensaje = mostrarNotificaciones(intval($resultado));
    if ($mensaje) { ?>
      <p class="alerta exito"><?php echo s($mensaje) ?></p>
  <?php }
  } ?>
  <h1>Administrador de propiedades</h1>
  <a href="/propiedades/crear" class="boton boton-verde">Crear Nueva Propiedad</a>

  <!--Mostrar los resultados -->
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <!--Mostrar los resultados -->
      <?php
      foreach ($propiedades as $propiedad) :
      ?>
        <tr>
          <td><?php echo $propiedad->id; ?></td>
          <td><?php echo $propiedad->titulo; ?></td>
          <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="" class="imagenTabla"></td>
          <td>$ <?php echo $propiedad->precio; ?></td>
          <td>
            <form method="POST" class="w1-00" action="/propiedades/eliminar">
              <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input class="boton-rojo-block" type="submit" value="Eliminar">
            </form>

            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
  <h2>Vendedores</h2>
       <a href="/vendedores/crear" class="boton boton-amarillo">Ingresar un nuevo vendedor</a>
       <table class="propiedades">
         <thead>
           <tr>
             <th>ID</th>
             <th>Nombre</th>
             <th>Teléfono</th>
             <th>Acciones</th>
           </tr>
         </thead>
         <tbody><!--Mostrar los resultados -->
           <?php 
             foreach($vendedores as $vendedor):
            ?>
            

           <tr>
             <td><?php echo $vendedor->id;?></td>
             <td><?php echo $vendedor->nombre . " " .$vendedor->apellido  ;?></td>
             <td><?php echo $vendedor->telefono;?></td>
             <td>
               <form method="POST" class="w1-00" action="/vendedores/eliminar">
                <input type="hidden" name="id" value="<?php echo $vendedor->id?>">  
                <input type="hidden" name="tipo" value="vendedor">  
                <input  class="boton-rojo-block" type="submit" value="Eliminar">
               </form>
               
               <a href="/vendedores/actualizar?id=<?php  echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
             </td>
           </tr>
           <?php endforeach;?>
    
         </tbody>
       </table>
</main>