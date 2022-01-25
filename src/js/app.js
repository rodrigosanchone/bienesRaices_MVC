document.addEventListener('DOMContentLoaded',function(){
  eventListeners();

  darkMode();
});


function darkMode(){
  const prefierDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); 

  console.log(prefierDarkMode.matches);

  if(prefierDarkMode.matches){
     document.body.classList.add('dark-mode')
  }else{
    document.body.classList.remove('dark-mode')
  }

  prefierDarkMode.addEventListener('change', function(){
    if(prefierDarkMode.matches){
      document.body.classList.add('dark-mode')
   }else{
     document.body.classList.remove('dark-mode')
   }
 
  })
  const botonDarkMode = document.querySelector('.dark-mode-boton');

  botonDarkMode.addEventListener('click',function(){
    document.body.classList.toggle('dark-mode');
  })
}

function eventListeners(){
    const MobileMenu = document.querySelector('.mobile-menu');


    MobileMenu.addEventListener('click', navegacionResposive)

    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')
    metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto))
    
}

function navegacionResposive(){
  //console.log('desde la navegación')
  const navegacion =  document.querySelector('.navegacion');

 /*  if(navegacion.classList.contains('mostrar')){
      navegacion.classList.remove('mostrar');
  }else{
    navegacion.classList.add('mostrar');
  } */

  navegacion.classList.toggle('mostrar')
}

function mostrarMetodosContacto(e){
  const contactoDiv= document.querySelector('#contacto');
  if(e.target.value==='telefono'){
    contactoDiv.innerHTML= `
    <label for="contactar-telefono">Ingrese su teléfono</label>
    <input type="tel" placeholder="Ingrese su número de teléfono" id="telefono" name="contacto[telefono]" >
    <p>Elija la fecha y la hora</p>
    <label for="fecha">Fecha en la cual desea se contactado(a)</label>
    <input type="date" id="fecha" name="contacto[fecha]">
    <label for="hora">Hora en la cual desea se contactado(a)</label>
    <input type="time" id="hora" min="9:00" max="18:00" name="contacto[hora]">
    `;
  }else{
    contactoDiv.innerHTML=`
    <label for="contactar-email">Email</label>
    <input type="email" placeholder="Email" id="email" name="contacto[email]" require>
    `;
  
  }

}