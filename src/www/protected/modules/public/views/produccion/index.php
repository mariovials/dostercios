<?php
$this->cargar_jquery();
?>

<div id="produccion-index">

    <div id="producciones">
      <?php foreach ($producciones as $produccion) {
        ?>
      <div class="item produccion entrevista proporcion2-1" style="background-image: url('<?php echo $produccion->pathFileAttribute('miniatura') ?>'); ">
        <a href="<?php echo $produccion->url() ?>" class="contenido">
          <div class="textos">
            <div class="tipo">
              <?php echo $produccion->categoria->nombre; ?>
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
    </div>

  </div>
</div>
