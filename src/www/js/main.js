$(document).ready(function() {


  $(window).scroll(function() {
    var a = 2;
    var pos = $(window).scrollTop();
    if(pos > a) {
      $("#header").addClass('scroll');
    } else {
      $("#header").removeClass('scroll');
    }
  });

  input = $('#buscador');

  $('#buscador-box').hover(function (e) {
    $(this).addClass('hover');
  }, function (e) {
    cerrarInput();
  });

  $('#buscador').on('focusin', function (e) {
    $('#buscador-box').addClass('hover');
    $('#buscador-resultados').css("display", "block");
  });

  cerrarInput = function () {
    if (input.val() == '' && !input.is(':focus')) {
      console.log(input.val());
      console.log(input.is(':focus'));
      $('#buscador-box').removeClass('hover');
    }
  }

  input.on('keyup', function (e) {
    input.addClass('hover');
    key = e.which;
    q = input.val();
    if (q === '')
      borrarResultados();
    else
      $.ajax({
        url: baseUrl + '/buscador?q=' + q,
        method: 'POST',
        beforeSend: function (e) {
        },
        success: function (e) {
          data = JSON.parse(e);
          ul = $('<ul>').attr({id: 'lista'});
          $.each(data, function(i, r) {
            ul.append(crearResultado(r));
          });
          agregarResultados(ul);
        },
        error: function () {
          console.error('error');
        },
        complete: function () {
        },
      });
  });

  crearResultado = function (r) {
    li = '<li>' +
            '<a href="' + r['url'] + '">' +
              '<div class="miniatura" style="background-image: url(\'' + r['miniatura'] + '\')"></div>' +
              '<div class="informacion">' +
                '<div class="titulo">' +
                  r['titulo'] +
                '</div>' +
                '<div class="data">' +
                  '<div class="tipo">' +
                    r['tipo'] +
                  '</div>'
                  '<div class="otro">' +
                    r['otro'] +
                  '</div>' +
                '</div>' +
              '</div>' +
              '</a>' +
          '</li>';
     return li;
  }

  borrarResultados = function () {
    $('#buscador-resultados').html('');
  }

  agregarResultados = function (resultados) {
    nuevosResultados = $(resultados).text();
    resultadosExistentes = $('#buscador-resultados ul').text();
    if (nuevosResultados != resultadosExistentes) {
      $('#buscador-resultados').html(resultados).show();
    }
  }

  var seleccionado;

  // para cambiar la seleccion de una persona
  function seleccionar(direccion) {

    var seleccionado = $('#lista > li.selected');
    var nsel = seleccionado.index();
    $('#lista > li').removeClass('selected');

    if(nsel==-1 && direccion == 'arriba')
      $('#lista > li').last().addClass('selected');
    if(nsel==-1 && direccion == 'abajo')
      $('#lista > li').first().addClass('selected');
    if(direccion == 'arriba')
      seleccionado.prev().addClass('selected');
    else
      seleccionado.next().addClass('selected');
  }

  // para gestionar las flechas, el delete y el enter
  input.on('keydown', function(e) {
    var key = e.which; //la tecla presionada
    var param = $.trim($(this).val()); // el texto completo que ha escrito
    switch(key) {
      // case 8:  //delete
      //   param = param.slice(0, -1); //borra el ultimo caracter
      //   get(param);
      //   break;
      case 38: //flecha arriba
        seleccionar('arriba');
        e.preventDefault();
        break;
      case 40: //flecha abajo
        seleccionar('abajo');
        e.preventDefault();
        break;
      case 13: //enter
        if(param && ul.children('li').length>0) {
          seleccionado = $('#lista > li.selected a');
          url = seleccionado.attr('href');
          ir(url);
        }
        break;
    }
  });

  ir = function (url) {
    window.location.href = url;
  }

  $('#menu-icon').on('click', function() {
    $('#menu').toggle();
  });

  window.onclick = function(event) {
    if (event.target.id != "buscador-box") {
      $("#buscador-resultados").hide();
    }
  }

});

