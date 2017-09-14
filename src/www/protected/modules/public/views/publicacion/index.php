<?php
$this->cargar_jquery();
?>

<div id="publicacion-index">

    <div id="publicaciones">

      <?php foreach ($publicaciones as $publicacion) { ?>

      <div class="item publicacion proporcion5-11">
        <a href="<?php echo $publicacion->url() ?>" class="contenido">
          <div class="portada proporcion10-13"
            style="background-image: url('<?php echo $publicacion->pathFileAttribute('miniatura') ?>')">
          </div>
          <div class="textos">
            <div class="puntos"></div>
            <div class="titulo">
              <?php echo $publicacion->titulo ?>
            </div>
            <div class="texto">
              <?php echo $publicacion->resumen_miniatura ?>
            </div>
          </div>
        </a>
      </div>

      <?php } ?>

    </div>

  </div>
</div>
