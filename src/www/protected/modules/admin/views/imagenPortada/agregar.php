<?php
/* @var $this ImagenPortadaController */
/* @var $model ImagenPortada */

$this->breadcrumbs=array(
  'Imágenes Portada'=>array('/admin/imagen-portada/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Imágenes Portada',
    'url'=>array('/admin/imagen-portada'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="imagen-portada-agregar">

  <div id="contenido-head">
    <h1>Agregar Imágen Portada</h1>
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
