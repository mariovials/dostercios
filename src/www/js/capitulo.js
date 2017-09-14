$(function () {

  $('#Capitulo_titulo').on('keyup', function () {

    r = strtr($(this).val(),
      'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñÑòóôõöøùúûüþ ~!@#$%^&*?¿()\\/',
      'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnnoooooouuuub----------------/'
    )
    .replace(/--/g, '-')
    .replace(/--/g, '-')
    .toLowerCase();
    $('#Capitulo_url').val(r);

  });

});
