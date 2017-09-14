<div id="noticia" class="wraper">

  <article>

    <header>
      <h1><?php echo $model->titulo ?></h1>
      <?php echo $this->renderPartial('/layouts/_social', array(
        'titulo' => $model->titulo
      )); ?>
    </header>

    <div class="video-principal proporcion16-9 <?php echo (!$model->video) ? 'oculto' : '' ?>">
      <div class="contenido">
        <?php echo $model->video ?>
      </div>
    </div>

    <div class="texto-simple">
      <?php echo $model->texto ?>
    </div>

    <?php foreach ($model->imagenes as $imagen) { ?>
    <div class="imagen-grande">
      <img src="<?php echo BASE_URL . "{$model->pathImagen()}/{$imagen->filename}"; ?>" alt="">
    </div>
    <?php } ?>

  </article>

  <aside class="relacionados">

    <header>
      <h2>Relacionadas</h2>
    </header>

    <?php foreach ($model->relacionadas as $noticia) { ?>
    <div class="item entrevista proporcion8-5" style="background-image: url('<?php echo $noticia->pathFileAttribute('miniatura') ?>'); ">
      <a href="<?php echo $noticia->url() ?>" class="contenido">
        <div class="textos">
          <div class="tipo">
            <?php echo $noticia->modelName; ?>
          </div>
          <div class="titulo">
            <?php echo $noticia->titulo ?>
          </div>
          <div class="texto">
            <?php echo $noticia->resumen ?>
          </div>
        </div>
      </a>
    </div>
    <?php } ?>

  </aside>

</div>
