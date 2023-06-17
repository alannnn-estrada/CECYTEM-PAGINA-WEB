var boton = document.getElementById("boton-imagen");
var imagen = document.getElementById("imagen");
var contador = 0;
var imagenes = [
  "img/imagen1.jpg",
  "img/imagen2.jpg",
  "img/imagen3.jpg",
  "img/imagen4.jpg"
];

boton.addEventListener("click", function() {
  contador++;
  imagen.src = imagenes[contador % imagenes.length];
});

function imprimir(){
  window.print();
}