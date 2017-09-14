<?php
$this->cargar_jquery();
?>

<div id="entrevista-index">

    <div id="entrevistas">
      <?php foreach ($entrevistas as $entrevista) { ?>
      <div class="item entrevista proporcion2-1" style="background-image: url('<?php echo $entrevista->pathFileAttribute('miniatura') ?>'); ">
        <a href="<?php echo $entrevista->url() ?>" class="contenido">
          <div class="textos">
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
    </div>

  </div>
</div>
