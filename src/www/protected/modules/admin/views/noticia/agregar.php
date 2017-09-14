<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
  'Noticias'=>array('/noticia/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Noticias',
    'url'=>array('/admin/noticia/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="noticia-agregar">

  <div id="contenido-head">
    <h1>Agregar Noticia</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'transaccion'=>$transaccion,
      'attributes'=>array(
        'titulo',
        'texto',
        'video',
        'fecha_publicacion',
        'fecha_edicion',
        'miniatura',
        'resumen',
      ),
    )); ?>

  </div>

</div>
