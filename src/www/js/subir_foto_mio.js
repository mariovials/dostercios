$(function() {


  //USAGE: $("#form").serializefiles();
  (function($) {
  $.fn.serializefiles = function() {
      var obj = $(this);
      /* ADD FILE TO PARAM AJAX */
      var formData = new FormData();
      $.each($(obj).find("input[type='file']"), function(i, tag) {
          $.each($(tag)[0].files, function(i, file) {
              formData.append(tag.name, file);
          });
      });
      var params = $(obj).serializeArray();
      $.each(params, function (i, val) {
          formData.append(val.name, val.value);
      });
      return formData;
  };
  })(jQuery);

  form = $('form');
  url = form.attr('action');

  form.on('change', '.input', function(e) {

    val = $('.input').files || [];
    console.dir(val);

    console.log('.prop');
    var filelist = $('.input').prop('files') || [];

    for (var i = 0; i < filelist.length; i++) {
      data = new FormData();
      console.log('subiendo archivo ' + i + ' = ' + filelist[i].name);
      data = data.append(filelist[i].name, filelist[i].file);

      $.ajax({
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        type: 'POST',
        beforeSend: function(data) {
          console.log('enviando...');
        },
        success: function(data) {
          console.log('éxito!');
          console.log(data);
        },
        error: function(data) {
          console.log('falló! :(');
        }
      });

    }

    e.preventDefault();
  });


});