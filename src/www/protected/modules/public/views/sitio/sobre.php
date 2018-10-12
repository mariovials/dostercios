<?php
$imagenes_sobre = ImagenSobre::model()->findAll();
$imagen = $imagenes_sobre[mt_rand(0, count($imagenes_sobre) - 1)];
?>
<div id="sobre">
  <article>
    <header class="portada-serie" style="background-image: url('<?php echo BASE_URL . "/img/sobre/{$imagen->id}_{$imagen->imagen}"; ?>');">
      <h1 class="titulo"><?php echo Parametro::get('nombre') ?></h1>
      <?php echo $this->renderPartial('/layouts/_social'); ?>
    </header>
      <div class="texto-simple wraper">
        <?php echo Parametro::get('sobre_dostercios') ?>
      </div>
  </article>
</div>
