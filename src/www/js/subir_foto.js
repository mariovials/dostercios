$(function() {

  $('#Entrevista_imagenes').on('change', function() {
    $('#entrevista-form').ajaxForm({
      url: baseUrl + '/admin/entrevista/cargarImagenes?transaccion=' + $('#Entrevista_transaccion').val(),
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
        $('#Entrevista_imagenes').val('');
        $('#entrevista-form').unbind();
      }
    }).submit();
  });

  $('#subir-imagenes').on('click', function(e) {
    e.preventDefault();
    $('#Entrevista_imagenes').click();
  });

});
