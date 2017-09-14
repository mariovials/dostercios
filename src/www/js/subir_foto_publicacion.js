$(function() {

  $('#Publicacion_imagenes').on('change', function() {

    console.log('change....');
    $('.subiendo').show();

    $('#publicacion-form').ajaxForm({
      url: baseUrl + '/admin/publicacion/cargarImagenes?transaccion=' + $('#Publicacion_transaccion').val(),
      //display the uploaded images
      beforeSubmit:function(e){
        console.log('Subiendo...');
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
        $('#Publicacion_imagenes').val('');
        $('#publicacion-form').unbind();
      }
    }).submit();

  });

  $('#subir-imagenes').on('click', function(e) {
    e.preventDefault();
    $('#Publicacion_imagenes').click();
  });

});
