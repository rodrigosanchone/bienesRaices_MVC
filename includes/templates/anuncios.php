<?php
   use App\Propiedad;


   
   if($_SERVER['SCRIPT_NAME'] === '/anuncios.php')  {
    $propiedades= Propiedad::all();
   }else{
    $propiedades= Propiedad::get(3);
    
   }
  
?>
<div class="contenedor-anuncios">
     <?php foreach($propiedades as $propiedad ){?>
          <div class="anuncio" >
            <picture>
             <!--   <source src="build/img/anuncio1.webp" type="image/webp"> 
               <source src="build/img/anuncio1.jpg" type="image/jpeg">  -->
               <img src="/imagenes/<?php echo $propiedad->imagen?>" alt="anuncio" loading="lazy">
            </picture>
            <div class="contenido-anuncio" >
              <h3><?php echo $propiedad->titulo; ?></h3>
              <p><?php echo $propiedad->descripcion;?> </p>
              <p class="precio"><?php echo $propiedad->precio;?></p>
              <ul class="iconos-caracteristicas">
                 <li>
                   <img  loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
                   <p><?php echo $propiedad->wc;?></p>
                 </li>
                 <li>
                   <img  loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                   <p><?php echo $propiedad->estacionamiento;?></p>
                 </li>
                 <li>
                   <img  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                   <p><?php echo $propiedad->habitaciones;?></p>
                 </li>
              </ul>
              <a href="anuncio.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Ver propiedad</a>
            </div><!--Contenido Anuncio-->
          </div><!--Anuncio-->
          <?php }?>
     
         
        </div><!--Contenedor Anuncios-->

        <?php
         /**Cerrar la conexión */
         mysqli_close($db);
        ?>