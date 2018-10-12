<div id="serie">

  <article>

    <header class="portada-serie"
      style="background-image: url('<?php echo $model->pathFileAttribute('imagen') ?>');">
      <div class="titulo">
        <h2>Serie</h2>
        <h1><?php echo $model->titulo ?></h1>
      </div>
      <?php echo $this->renderPartial('/layouts/_social_compartir', array(
        'titulo' => $model->titulo
      )); ?>
    </header>

    <div class="texto-simple wraper-normal">
      <?php echo $model->texto ?>
    </div>

    <aside id="capitulos-serie" class="lista relacionados">

      <header>
        <h2>Capítulos</h2>
      </header>
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
    </aside>

  </article>

</div>
