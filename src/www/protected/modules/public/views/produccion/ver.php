<div id="produccion">

  <article>

    <header>
      <h1><?php echo $model->titulo ?></h1>
      <?php echo $this->renderPartial('/layouts/_social_compartir', array(
        'titulo' => $model->titulo
      )); ?>
      <h2><?php echo $model->categoria->nombre; ?></h2>
    </header>

    <div class="video-principal proporcion16-9 <?php echo (!$model->video) ? 'oculto' : '' ?>">
      <div class="contenido">
        <?php echo $model->video ?>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="cita">
      <p>
      <?php echo $model->cita ?>
      </p>
    </div>

    <div class="texto-simple">
      <?php echo $model->texto ?>
    </div>

    <?php foreach ($model->imagenes as $imagen) { ?>
    <div class="imagen-grande">
      <img src="<?php echo BASE_URL."/img/produccion/{$model->id}/{$imagen->filename}"; ?>" alt="">
    </div>
    <?php } ?>

  </article>

  <aside class="relacionados">

    <header>
      <h2>Relacionados</h2>
    </header>

    <?php foreach ($model->relacionadas as $produccion) { ?>
    <div class="item produccion entrevista proporcion8-5" style="background-image: url('<?php echo $produccion->pathFileAttribute('miniatura') ?>'); ">
      <a href="<?php echo $produccion->url() ?>" class="contenido">
        <div class="textos">
          <div class="tipo">
            <?php echo $produccion->modelName; ?>
          </div>
          <div class="titulo">
            <?php echo $produccion->titulo ?>
          </div>
          <div class="texto">
            <?php echo $produccion->resumen ?>
          </div>
        </div>
      </a>
    </div>
    <?php } ?>

  </aside>

</div>
