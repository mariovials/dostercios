<?php
/* @var $this ImagenController */
/* @var $model Imagen */

$this->breadcrumbs=array(
  'Imagens'=>array('/imagen/index'),
  $model->id=>array('/imagen/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Imagen',
    'url'=>array('/imagen/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Imagens',
    'url'=>array('/imagen'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Imagen',
    'url'=>array('/imagen/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="imagen-editar">

  <div id="contenido-head">
    <h1>Editar Imagen</h1>
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
