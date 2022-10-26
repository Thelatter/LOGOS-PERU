//EJECUTAR FUNCION CONTADOR
$( document ).ready(function() {
      $('.contador').each(function(i) {
                counter($(this));
        });
});
/*FUNCION CONTADOR NOSOTROS*/
 function counter(elem) {  
  var id = setInterval(frame, 1);
  function frame() {
    if (elem.data('from') == elem.data('to')) {
      clearInterval(id);
    } else if (elem.data('from') <= elem.data('to')){
      contador=elem.data('from')+5;
      elem.data('from',contador);
      elem.html(elem.data('from'));
    }
  }
}