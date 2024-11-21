window.addEventListener('scroll', function() {  
    const navbar = document.querySelector('.navbar');  
    
    // Verificar cuán lejos se ha desplazado el usuario  
    if (window.scrollY > 50) { // Cambia el valor si deseas que el cambio ocurra antes o después  
        navbar.classList.add('scrolled'); // Añade la clase cuando se desplaza hacia abajo  
    } else {  
        navbar.classList.remove('scrolled'); // Remueve la clase cuando está en la parte superior  
    }  
});

