<fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo); ?>">

//use App\Vendedor;
            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio Propiedad" name="propiedad[precio]" value="<?php echo s($propiedad->precio); ?>">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
            <?php
              if($propiedad->imagen):
            ?>
            <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="<?php echo $propiedad->imagen ?>" class="imagen-small">
            <?php endif ?>
            <label for="descripcion">Descripcion</label>
            <textarea name="propiedad[descripcion]" id="descripcion">
             <?php echo s($propiedad->descripcion); ?>
            </textarea>
        </fieldset>
        <fieldset>
            <legend>Información de la Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ejemplo 3" min="1" max="9" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Ejemplo 3" min="1" max="9" name="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>">

            <label for="estacionamineto">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ejemplo 3" min="1" max="9" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <label for="vendedor">Vendedor</label>
            <select name="propiedad[vendedorId]" id="vendedor">
               <option  selected value="">--Seleccione--</option>
                <?php 
                   foreach($vendedores as $vendedor):?>
                     <option 
                         <?php echo $propiedad->vendedorId ==$vendedor->id ?'selected': '';?>
                         value=" <?php echo s($vendedor->id);?>">
                         <?php echo s($vendedor->nombre). " " . s($vendedor->apellido); ?>
                     </option>
                  <?php endforeach?> 
            </select>
        </fieldset>