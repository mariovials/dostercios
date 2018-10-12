

  <a class="portada-serie" href="<?php echo $model->serie->url(); ?>"
    style="background-image: url('<?php echo $model->serie->pathFileAttribute('image') ?>');">
    <div class="titulo">
      <h2>Serie</h2>
      <h1><?php echo $model->serie->titulo ?></h1>
    </div>
  </a>

<div id="capitulo">

  <article>
    <header>
      <h2>Capítulo <?php echo $model->orden; ?></h2>
      <h1><?php echo $model->titulo ?></h1>
      <?php echo $this->renderPartial('/layouts/_social_compartir', array(
        'titulo' => $model->titulo
      )); ?>
    </header>

    <div class="video-principal <?php echo (!$model->video) ? 'oculto' : '' ?>">
      <div class="contenido">
        <?php echo $model->video ?>
      </div>
    </div>

    <div class="cita">
    </div>

    <div class="texto-simple">
      <?php echo $model->texto ?>
    </div>

    <?php foreach ($model->imagenes as $imagen) { ?>
    <div class="imagen-grande">
      <img src="<?php echo BASE_URL . $model->pathImagen() . "/" . $imagen->filename; ?>" alt="">
    </div>
    <?php } ?>

  </article>

  <aside class="relacionados">

    <header>
      <h2>Capítulos</h2>
    </header>

    <div id="capitulos-serie" class="lista">

      <?php
      $capitulosSiguientes = $model->getSiguientes(3);
      $cantidad = count($capitulosSiguientes);
      $diferencia = 3 - $cantidad;
      foreach ($capitulosSiguientes as $capitulo) {
      ?>
      <div class="item entrevista proporcion8-5" style="background-image: url('<?php echo $capitulo->pathFileAttribute('miniatura') ?>'); ">
        <a href="<?php echo $capitulo->url() ?>" class="contenido">
          <div class="textos">
            <div class="tipo">
              Capítulo <?php echo $capitulo->orden; ?>
            </div>
            <div class="titulo">
              <?php echo $capitulo->titulo ?>
            </div>
            <div class="texto">
              <?php echo $capitulo->resumen ?>
            </div>
          </div>
        </a>
      </div>
      <?php
      }
      $capitulosSiguientes = $model->findAll(array(
          'condition'=>"serie_id = {$model->serie_id}",
          'limit' => $diferencia,
          'order'=>'orden'
      ));
      foreach ($capitulosSiguientes as $capitulo) {
      ?>
      <div class="item entrevista proporcion8-5" style="background-image: url('<?php echo $capitulo->pathFileAttribute('miniatura') ?>'); ">
        <a href="<?php echo $capitulo->url() ?>" class="contenido">
          <div class="textos">
            <div class="tipo">
              Capítulo <?php echo $capitulo->orden; ?>
            </div>
            <div class="titulo">
              <?php echo $capitulo->titulo ?>
            </div>
            <div class="texto">
              <?php echo $capitulo->resumen ?>
            </div>
          </div>
        </a>
      </div>
      <?php
      }
      ?>


    </div>


  </aside>

</div>
