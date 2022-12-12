// Defino un tamaño de letra titulo de 16px
function tamañoLetra() {
    size = $(".name" ).css("font-size");
    size = $(".description" ).css("font-size");
    size = parseInt(size, 10);
    $( ".tamaño-actual" ).text(size);
  } 
   
  // Obtengo el tamaño de letra titulo de 16px 
  tamañoLetra();

  // Función para disminuir el tamaño del texto (fuente) 
$(".disminuir").on("click", function() {
    if ((size - 2) >= 13) {
      $(".name").css("font-size", "-=2");
      $(".description").css("font-size", "-=2");
      $(".tamaño-actual").text(size -= 1);
    }
  });
   
  // Función para aumentar el tamaño del texto (fuente) 
  $(".aumentar").on("click", function() { 
    if ((size + 2) <= 47) {
      $(".name").css("font-size", "+=2");
      $(".description").css("font-size", "+=2");
      $(".tamaño-actual").text(size += 1);
    }
  });
   
  // Función para restablecer el tamaño del texto (fuente) al tamaño titulo 
  $(".restablecer").on("click", function() {
    $(".name").css("font-size", "initial");
    $(".description").css("font-size", "initial");
    size = $(".name" ).css("font-size");
    size = $(".description" ).css("font-size");
    size = parseInt(size, 10);
    $( ".tamaño-actual" ).text(size);
  });


  

 