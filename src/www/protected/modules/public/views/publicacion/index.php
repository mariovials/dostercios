<?php
$this->cargar_jquery();
?>

<div id="publicacion-index">

    <div id="publicaciones" class="lista">

      <?php foreach ($publicaciones as $publicacion) { ?>

      <div class="item publicacion">
        <a href="<?php echo $publicacion->url() ?>" class="">
          <div class="imagen"
            style="background-image: url('<?php echo $publicacion->pathFileAttribute('miniatura') ?>')">
          </div>
          <div class="textos">
            <div class="titulo">
              <?php echo $publicacion->titulo ?>
            </div>
            <div class="resumen">
              <?php if ($publicacion->autor): ?>
                <b><?php echo $publicacion->getAttributeLabel('autor') ?></b>:
                <?php echo $publicacion->autor ?>
                <br>
              <?php endif; ?>
              <?php if ($publicacion->isbn): ?>
                <b><?php echo $publicacion->getAttributeLabel('isbn') ?></b>:
                <?php echo $publicacion->isbn ?>
                <br>
              <?php endif; ?>
              <?php if ($publicacion->anio): ?>
                <b><?php echo $publicacion->getAttributeLabel('anio') ?></b>:
                <?php echo $publicacion->anio ?>
                <br>
              <?php endif; ?>
              <?php if ($publicacion->editorial): ?>
                <b><?php echo $publicacion->getAttributeLabel('editorial') ?></b>:
                <?php echo $publicacion->editorial ?>
                <br>
              <?php endif; ?>
              <?php if ($publicacion->idioma): ?>
                <b><?php echo $publicacion->getAttributeLabel('idioma') ?></b>:
                <?php echo $publicacion->idioma ?>
                <br>
              <?php endif; ?>
              <?php if ($publicacion->diseno): ?>
                <b><?php echo $publicacion->getAttributeLabel('diseno') ?></b>:
                <?php echo $publicacion->diseno ?>
                <br>
              <?php endif; ?>
            </div>
          </div>
        </a>
      </div>

      <?php } ?>

    </div>

  </div>
</div>
