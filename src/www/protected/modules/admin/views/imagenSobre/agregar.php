<?php
/* @var $this ImagenPortadaController */
/* @var $model ImagenPortada */

$this->breadcrumbs=array(
  'Imágenes Sobre Dostercios'=>array('/admin/imagen-sobre/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Imágenes Sobre Dostercios',
    'url'=>array('/admin/imagen-sobre'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="imagen-sobre-agregar">

  <div id="contenido-head">
    <h1>Agregar Imágen Sobre Dostercios</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'imagen',
      ),
    )); ?>

  </div>

</div>
