<?php
/* @var $this ImagenController */
/* @var $model Imagen */

$this->breadcrumbs=array(
  'Imagens'=>array('/imagen/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Imagens',
    'url'=>array('/imagen'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="imagen-agregar">

  <div id="contenido-head">
    <h1>Agregar Imagen</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'nombre',
      ),
    )); ?>

  </div>

</div>
