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