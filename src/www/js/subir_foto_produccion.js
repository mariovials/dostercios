$(function() {

  $('#Produccion_imagenes').on('change', function() {

    console.log('change....');
    $('.subiendo').show();

    $('#produccion-form').ajaxForm({
      url: baseUrl + '/admin/produccion/cargarImagenes?transaccion=' + $('#Produccion_transaccion').val(),
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
        $('#Produccion_imagenes').val('');
        $('#produccion-form').unbind();
      }
    }).submit();

  });

  $('#subir-imagenes').on('click', function(e) {
    e.preventDefault();
    $('#Produccion_imagenes').click();
  });

});
