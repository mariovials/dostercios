<div id="entrevista">

  <article>

    <header>
      <h1><?php echo $model->titulo ?></h1>
      <?php echo $this->renderPartial('/layouts/_social_compartir', array(
        'titulo' => $model->titulo
      )); ?>
    </header>

    <div>
      <div>
        <?php if ($model->visor == Publicacion::INTERNO): ?>
        <iframe src="http://docs.google.com/gview?url=<?php echo Yii::app()->request->hostInfo . $model->pathFileAttribute('archivo'); ?>&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>
        <?php elseif ($model->visor == Publicacion::EXTERNO): ?>
          <div class="video-principal publicacion">
              <?php echo $model->insercion ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="cita">
      <p>
      <?php echo $model->resumen ?>
      </p>
    </div>

    <div class="texto-simple">
      <?php echo $model->informacion ?>
    </div>

    <?php foreach ($model->imagenes as $imagen) { ?>
    <div class="imagen-grande">
      <img src="<?php echo BASE_URL."/img/publicacion/{$model->id}/{$imagen->filename}"; ?>" alt="">
    </div>
    <?php } ?>

    <div class="descargas">
      <?php
      foreach ($model->descargas as $descargaPublicacion):
        if ($descargaPublicacion->texto):
      ?>

        <a class="item" href="<?php echo $descargaPublicacion->texto ?>" target="_blank">

          <div class="icono">
            <img src="<?php echo $descargaPublicacion->descarga->pathFileAttribute('icono') ?>" alt="<?php echo $descargaPublicacion->descarga->nombre; ?>">
          </div>

          <div class="contenido">

            <div class="label">
              <b><?php echo $descargaPublicacion->descarga->nombre; ?></b>
            </div>

            <div class="description">
              <?php echo $descargaPublicacion->descarga->descripcion; ?>
            </div>

          </div>

        </a>

      <?php
        endif;
      endforeach;
      ?>
    </div>

  </article>

  <aside class="relacionados">

    <header>
      <h2>Relacionados</h2>
    </header>

    <?php foreach ($model->relacionadas as $entrevista) { ?>
    <div class="item entrevista proporcion8-5" style="background-image: url('<?php echo $entrevista->pathFileAttribute('miniatura') ?>'); ">
      <a href="<?php echo $entrevista->url() ?>" class="contenido">
        <div class="textos">
          <div class="tipo">
            <?php echo $entrevista->tipoMiniatura; ?>
          </div>
          <div class="titulo">
            <?php echo $entrevista->titulo ?>
          </div>
          <div class="texto">
            <?php echo $entrevista->resumen ?>
          </div>
        </div>
      </a>
    </div>
    <?php } ?>

  </aside>

</div>




