// Defino un tamaño de letra inicial de 16px
function tamañoLetra() {
  size = $(".home-section" ).css("font-size");
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
} 
 
// Obtengo el tamaño de letra inicial de 16px 
tamañoLetra();

// Función para disminuir el tamaño del texto (fuente) 
$(".disminuir").on("click", function() {
  if ((size - 2) >= 13) {
    $(".home-section").css("font-size", "-=2");
    $(".tamaño-actual").text(size -= 1);
  }
});
 
// Función para aumentar el tamaño del texto (fuente) 
$(".aumentar").on("click", function() { 
  if ((size + 2) <= 47) {
    $(".home-section").css("font-size", "+=2");
    $(".tamaño-actual").text(size += 1);
  }
});
 
// Función para restablecer el tamaño del texto (fuente) al tamaño inicial 
$(".restablecer").on("click", function() {
  $(".home-section").css("font-size", "initial");
  size = $(".home-section" ).css("font-size");
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
});