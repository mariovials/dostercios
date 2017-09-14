$(function () {


  $('#Entrevista_titulo').on('keyup', function () {
    r = strtr($(this).val(),
      'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñÑòóôõöøùúûüþ ~!@#:$%^&*?¿()\\/',
      'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnnoooooouuuub-----------------/'
    )
    .replace(/--/g, '-')
    .replace(/--/g, '-')
    .toLowerCase();
    $('#Entrevista_url').val(r);
  });

  inputEtiqueta = $('#Entrevista_etiquetas');

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
