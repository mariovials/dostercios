<div id="entrevista">

  <article>

    <header>
      <h1><?php echo $model->titulo ?></h1>
      <?php echo $this->renderPartial('/layouts/_social', array(
        'titulo' => $model->titulo
      )); ?>
    </header>

    <?php if ($model->visor == Publicacion::INTERNO): ?>
    <div class="video-principal proporcion16-9 <?php echo (!$model->insercion) ? 'oculto' : '' ?>">
      <div class="contenido">
        <iframe src="http://docs.google.com/gview?url=<?php echo Yii::app()->request->hostInfo . $model->pathFileAttribute('archivo'); ?>&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>
      </div>
    </div>

    <?php elseif ($model->visor == Publicacion::EXTERNO): ?>
    <div class="video-principal proporcion16-9 <?php echo (!$model->insercion) ? 'oculto' : '' ?>">
      <div class="contenido">
        <?php echo $model->insercion ?>
      </div>
    </div>
    <?php endif; ?>

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
