
<fieldset>
            <legend>Información General</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Ingrese Nombre" name="vendedor[nombre]" 
            value="<?php echo s($vendedor->nombre); ?>">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" placeholder="Ingrese un apellido" name="vendedor[apellido]" value="<?php echo s($vendedor->apellido); ?>">


</fieldset>


<fieldset>
            <legend>Información de contacto</legend>
            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" placeholder="Ingrese un teléfono" name="vendedor[telefono]" value="<?php echo s($vendedor->telefono); ?>">
        


</fieldset>