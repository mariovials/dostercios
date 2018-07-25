<?php
Yii::app()->clientScript->registerScriptFile('packery');
Yii::app()->clientScript->registerCoreScript('slick');
?>

<div id="sitio-inicio">

  <?php
  $video_portada = Parametro::get('video_portada');
  ?>
  <div class="encabezado <?php echo ($video_portada) ? 'video-portada' : 'imagenes-carrusel' ?>">
    <?php
    if ($video_portada) {
    ?>
    <div id="video-portada" style="height: 100vh">
      <?php echo $video_portada ?>
    </div>
    <?php
    } else {
      $imagenes_portada = ImagenPortada::model()->findAll();
    ?>
    <div id="imagenes">
      <?php foreach ($imagenes_portada as $ip) { ?>
      <div class="imagen" style="background-image: url('<?php echo $ip->pathFileAttribute('imagen'); ?>'); ">
      </div>
      <?php } ?>
    </div>
    <?php } ?>

    <?php echo $this->renderPartial('/layouts/_social'); ?>

  </div>
  <section>
    <div id="de-todo">
      <?php
      $items_portada = Portada::model()->findAll(
        array('order'=>'fecha_edicion DESC')
      );
      foreach ($items_portada as $item) {
        $entidad = $item->entidad();
      ?>

      <div class="item de-todo <?php echo $item->tipoTexto(); ?>"
        style="background-image: url('<?php echo $entidad->imagenPortada(); ?>'); ">
        <a href="<?php echo $entidad->url() ?>" class="contenido">
          <div class="textos">
            <div class="tipo">
              <?php echo $entidad->tipoMiniatura; ?>
            </div>
            <div class="titulo">
              <?php echo $entidad->titulo ?>
            </div>
            <div class="texto">
              <?php echo $entidad->resumen; ?>
            </div>
          </div>
        </a>
      </div>

      <?php } ?>
    </div>
  </section>

</div>

<script>
$(function() {

  $('#imagenes').slick({
    dots: true,
    autoplay: true,
    infinite: true,
    arrows: false,
    pauseOnHover: false,
    autoplaySpeed: 5000
  });

  pack = $('#de-todo').packery();

  videoPortada = $('#video-portada').find('iframe');
  videoPortada.attr('width', '100%');
  videoPortada.attr('height', '100%');
});
</script>
