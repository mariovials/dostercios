<div id="sobre">

  <div id="portada-sobre">

    <?php
    $imagenes_sobre = ImagenSobre::model()->findAll();
    $imagen = $imagenes_sobre[mt_rand(0, count($imagenes_sobre) - 1)];
    ?>
    <img src="<?php echo BASE_URL . "/img/sobre/{$imagen->id}_{$imagen->imagen}"; ?>" alt="">

    <h1 class="titulo"><?php echo Parametro::get('nombre') ?></h1>
    <?php echo $this->renderPartial('/layouts/_social'); ?>
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

