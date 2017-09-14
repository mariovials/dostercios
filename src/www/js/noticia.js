$(function () {

  $('#Noticia_imagenes').on('change', function() {
    console.log('change...');
    $('#noticia-form').ajaxForm({
      url: baseUrl + '/admin/noticia/cargarImagenes?transaccion=' + $('#Noticia_transaccion').val(),
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
        $('#Noticia_imagenes').val('');
        $('#noticia-form').unbind();
      }
    }).submit();
  });

  $('#subir-imagenes').on('click', function(e) {
    e.preventDefault();
    $('#Noticia_imagenes').click();
  });

  $('#Noticia_titulo').on('keyup', function () {
    r = strtr($(this).val(),
      'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñÑòóôõöøùúûüþ ~!@#:$%^&*?¿()\\/{}[]',
      'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnnoooooouuuub-----------------/----'
    )
    .replace(/--/g, '-')
    .replace(/--/g, '-')
    .toLowerCase();
    $('#Noticia_url').val(r);
  });

  inputEtiqueta = $('#Noticia_etiquetas');

  $('.etiqueta').on('click', function(e) {
    e.preventDefault();
    agregarEtiqueta($(this).text());
    inputEtiqueta.focus();
  });

  /**
   * Agrega una etiqueta al input de etiquetas
   * @param  {string} etiqueta
   * @return {void}
   */
  agregarEtiqueta = function(etiqueta) {
    // convierte el string a arreglo y lo trimea
    etiquetasActuales = inputEtiqueta.val().trim().replace(/,\s+/g, ",").replace(/\s+,/g, ",").split(',').filter(Boolean);
    // si no está agregada
    if (etiquetasActuales.indexOf(etiqueta.trim()) == -1) {
      // agrega la etiqueta
      etiquetasActuales.push(etiqueta);
    }
    inputEtiqueta.val(etiquetasActuales.join(", ") + ', ');
  };

});
