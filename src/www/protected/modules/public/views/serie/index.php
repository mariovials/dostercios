<div id="serie-index">

  <div id="series" class="lista">
    <?php foreach ($series as $serie) { ?>
    <a href="<?php echo $serie->url() ?>" class="item serie"
      style="background-image: url('<?php echo $serie->pathFileAttribute('image') ?>');">
      <div class="textos">
        <div class="titulo">
          <?php echo $serie->titulo ?>
        </div>
        <div class="texto">
          <?php echo $serie->resumen ?>
        </div>
      </div>
    </a>
    <?php } ?>

  </div>
</div>
