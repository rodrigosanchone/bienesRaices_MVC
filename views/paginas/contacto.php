<main class="contenedor sección">
        <h1>Contacto</h1>

        <?php if($mensaje){
             echo "<p class='alerta exito'>   $mensaje </p>";
        }
        ?>
        <picture>
          <source srcset="build/img/destacada3.webp" type="image/webp"> 
          <source srcset="build/img/destacada3.jpg" type="image/jpg"> 
          <img src="build/img/destacada3.jpg" alt="">
        </picture>
        <h2>Llene el formulario</h2>
        <form action="/contacto" class="formulario" method="POST">
            <fieldset>
              <legend>Información Personal</legend>
              <label for="nombre">Nombre</label>
              <input type="text" placeholder="Nombre" id="nombre" name="contacto[nombre]" require>
           
              <label for="mensaje">Mensaje</label>
             <textarea  id="mensaje" cols="30" rows="10"name="contacto[mensaje]" requiere></textarea>
              
            </fieldset> 
            <fieldset>
              <legend>Información de la propiedad</legend>
              <label for="opciones">Vende O Compra</label>
              <select  id="opciones" name="contacto[tipo]" require>
              <option value="" disabled selected>Selecciona</option>
                <option value="Compra">Compra</option>
                <option value="Vende">vende</option>
              </select>

              <label for="presupuesto" require>Precio o Presupuesto</label>
              <input type="number" placeholder="Precio o Presupuesto" id="presupuesto" name="contacto[precio]">
            
           
              
            </fieldset> 

            <fieldset>
              <legend>Contacto</legend>
              <p>¿Cómo desea ser contactado?</p>
              <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" require>
                <label for="contactar-email">Email</label>
                <input type="radio"  value="email" id="contactar-email" name="contacto[contacto]" require>
              </div>
              
              <div id="contacto">

              </div>

             
            </fieldset> 
            <input type="submit" value="Enviar" class="boton-verde" >
        </form>
    </main>