<div id="noticia-index">

    <div id="entrevistas">
      <?php foreach ($noticias as $noticia) { ?>
      <div class="item entrevista proporcion2-1" style="background-image: url('<?php echo $noticia->pathFileAttribute('miniatura') ?>'); ">
        <a href="<?php echo $noticia->url() ?>" class="contenido">
          <div class="textos">
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
    </div>

  </div>
</div>
