$(function() {

  $('#Capitulo_imagenes').on('change', function(e) {
    $('#capitulo-form').ajaxForm({
      url: baseUrl + '/admin/capitulo/cargarImagenes?transaccion=' + $('#Capitulo_transaccion').val(),
      //display the uploaded images
      beforeSubmit:function(e){
        console.log('Subiendo...');
        $('.subiendo').show();
      },
      success:function(e){
        console.log('Exito!');
        $('.subiendo').hide();
        $('#previsualizacion').append(e);
      },
      error:function(e){
        console.error('Error!');
      },
      complete: function() {
        console.log('Complete!');
        $('#Capitulo_imagenes').val('');
        $('#capitulo-form').unbind();
      }
    }).submit();
  });

  $('#subir-imagenes').on('click', function(e) {
    e.preventDefault();
    $('#Capitulo_imagenes').click();
  });

});
