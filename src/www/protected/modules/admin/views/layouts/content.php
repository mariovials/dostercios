<?php
$hay_menu = ($this->menu);
?>
<section id="content">

  <div id="lateral">
    <ul id="menu-admin">
      <li><?php echo CHtml::link('Imágenes portada', array('/admin/imagen-portada')) ?></li>
      <li><?php echo CHtml::link('Entrevistas', array('/admin/entrevista')) ?></li>
      <li><?php echo CHtml::link('Series', array('/admin/serie')) ?></li>
      <li><?php echo CHtml::link('Producciones', array('/admin/produccion')) ?></li>
      <li><?php echo CHtml::link('Editorial', array('/admin/publicacion')) ?></li>
      <li><?php echo CHtml::link('Noticias', array('/admin/noticia')) ?></li>
      <li><?php echo CHtml::link('Etiquetas', array('/admin/etiqueta')) ?></li>
      <li><?php echo CHtml::link('Categorías', array('/admin/categoria')) ?></li>
      <li><?php echo CHtml::link('Descargas', array('/admin/descarga')) ?></li>
      <li><?php echo CHtml::link('Auspiciador', array('/admin/auspiciador')) ?></li>
      <li><?php echo CHtml::link('Parámetros', array('/admin/parametro')) ?></li>
    </ul>
  </div>

  <div id="principal" class="<?php if($hay_menu) echo "ajustado"; ?>">

    <div id="contenido" class="seccion">
      <?php echo $content ?>
    </div>

    <?php if($this->menu) { ?>
    <div id="menu-opciones" class="seccion">
      <h3>OPCIONES</h3>
      <ul id="model-menu">
        <?php foreach ($this->menu as $item) { ?>
        <li>
        <?php
          echo CHtml::link(
            (isset($item['label'])) ? $item['label'] : null,
            (isset($item['url'])) ? $item['url'] : null,
            isset($item['linkOptions'])?$item['linkOptions']:array()
          );
        ?>
        </li>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>

  </div>

</section>
