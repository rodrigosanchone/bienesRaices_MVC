<main class="contenedor sección contenido-centrado">
       <h1>Iniciar Seción</h1>
       <?php
         foreach($errores as $error):
       ?>
           <div class="alerta error">
               <?php echo $error;?>
           </div>
       <?php
         endforeach;
       ?>

       <form method= "POST"  class="formulario " novalidate action="/login">
           <fieldset>
               <legend>Email y Password</legend>
               <label for="email">Email</label>
               <input type="email" placeholder="Email" id="email" name="email" >
               <label for="password">Password</label>
               <input type="password" placeholder="password" id="password" name="password">


           </fieldset>

           <input type="submit" value="Iniciar Sesión " class="boton boton-verde">

       </form>
     
    </main>