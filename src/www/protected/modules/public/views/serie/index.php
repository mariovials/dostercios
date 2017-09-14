<div id="serie-index">

  <div id="series">
    <?php foreach ($series as $serie) { ?>
    <div class="item serie" style="background-image: url('<?php echo $serie->pathFileAttribute('image') ?>'); ">
      <a href="<?php echo $serie->url() ?>">
      <div class="textos">
        <div class="titulo">
          <?php echo $serie->titulo ?>
        </div>
        <div class="texto">
          <?php echo $serie->resumen ?>
        </div>
      </div>
      </a>
    </div>
    <?php } ?>

  </div>
</div>
