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
    input.addClass('hover');
  }, function (e) {
    cerrarInput();
  });

  $('#buscador-box').on('focusout', function (e) {
    cerrarInput();
  });

  cerrarInput = function () {
    if (input.val() == '' && !input.is(':focus')) {
      input.removeClass('hover');
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
      $('#buscador-resultados').html(resultados);
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


  /**
   * Ajusta el título de las miniaturas de los que corresponda
   * @author Mario Vial <mariovials@gmail.com> 2016-01-06 13:53
   */
  ajustarTituloAbajo = function() {

    ajustarTituloAbajoItems($('.item.entrevista'));
    ajustarTituloAbajoItems($('.item.de-todo.grande'));
    ajustarTituloAbajoItems($('.item.de-todo').not('.grande'));

  }

  /**
   * Ajusta el título de las miniaturas abajo
   * dejando 2 lineas de titulo
   * @param  {item} items a los que se les debe ajustar el titulo
   * @return {void}
   * @author Mario Vial <mariovials@gmail.com> 2016-01-06 13:50
   */
  ajustarTituloAbajoItems = function(items) {

    if (items.length > 0) {

      textos  = items.find('.textos');
      titulos = textos.find('.titulo');

      textos.css('transition', 'none');

      var h  = items.css('height').replace('px', ''),
          fz = titulos.css('font-size').replace('px', '');
      var top = h - fz * 4.3;

      textos.css({
        'top': top + 'px',
        'transition': 'all 500ms',
      });

    }

  }

  $(window).resize(function() {

    ajustarTituloAbajo();
    ajustarAltoVideo();

    if (window.innerWidth < 600) {

      // quita packery en portada
      if (estaPackerizado) {
        pack.packery('destroy');
        estaPackerizado = false;
      }

    }
    else {
      if (!estaPackerizado) {
        packeryzar();
      }
    }

  });

  var estaPackerizado = false;
  packeryzar = function() {
    if (window.innerWidth > 600) {
      pack = $('#de-todo').packery();
      estaPackerizado = true;
    }
  }


  $('#menu-icon').on('click', function() {
    $('#menu').toggle();
  });

  ajustarAltoVideo = function() {
    console.log('ajustarAltoVideo');

    // disminuye el alto del frame contenedor de videos
    w = $('.video-principal').width();
    h = w * 56.25 / 100;
    ifr = $('iframe').not($('#video-portada').children('iframe'));
    console.dirxml(ifr);
    console.log(h);
    ifr.attr({
      'height': h
    });
    fz = $('body').css('font-size').replace('px', '');
    $('.video-principal').not('.publicacion').css({
      'margin-bottom': (h + fz * 5) + 'px'
    });

  }

  init = function() {
    ajustarTituloAbajo();
    ajustarAltoVideo();
  }

  init();

});

