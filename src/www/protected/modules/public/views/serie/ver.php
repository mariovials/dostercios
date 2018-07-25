<div id="serie">

  <article>

    <div id="portada-serie">
      <img src="<?php echo $model->pathFileAttribute('imagen') ?>" alt="">
      <h1 class="titulo"><?php echo $model->titulo ?></h1>
      <?php echo $this->renderPartial('/layouts/_social_compartir', array(
        'titulo' => $model->titulo
      )); ?>
    </div>
    <div class="texto-simple wraper">
      <?php echo $model->texto ?>
    </div>

    <div id="capitulos-serie" class="wraper">
      <?php foreach ($model->capitulos as $capitulo) { ?>
      <div class="item entrevista proporcion8-5" style="background-image: url('<?php echo $capitulo->pathFileAttribute('miniatura') ?>'); ">
        <a href="<?php echo $capitulo->url() ?>" class="contenido">
          <div class="textos">
            <div class="tipo">
              Capítulo <?php echo $capitulo->orden ?>
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
      <?php } ?>
    </div>

  </article>

</div>
