<div id="sobre">

  <div id="portada-sobre">
    <img src="<?php echo BASE_URL . "/img/dostercios/sobre_" . rand(1,3) . ".png"; ?>" alt="">

    <h1 class="titulo"><?php echo Parametro::get('nombre') ?></h1>
  </div>

  <div class="wraper">

    <div class="texto-simple">
      <?php echo Parametro::get('sobre_dostercios') ?>
    </div>


      <?php
      /*
    <div class="noticias">
      <header>
        <h2>Noticias</h2>
      </header>
      $noticias = Noticia::model()->findAll();
      foreach ($noticias as $noticia) { ?>
      <div class="item noticia">
        <div class="fecha">
          <?php echo fecha($noticia->fecha_publicacion) ?>
        </div>
        <div class="imagenes">
          <table>
            <tr>
            <?php foreach ($noticia->imagenes as $imagen) { ?>
              <td>
                <div class="imagen">
                  <img src="<?php echo BASE_URL."/img/noticia/{$noticia->id}/{$imagen->filename}"; ?>" alt="">
                </div>
              </td>
            <?php } ?>
            </tr>
          </table>
        </div>
        <div class="texto">
          <div class="texto-simple">
            <?php echo $noticia->texto ?>
          </div>
        </div>
      </div>
      <?php }
      */
      ?>

    </div>

  </div>

</div>

