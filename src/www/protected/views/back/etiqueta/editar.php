<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
  'Etiquetas'=>array('index'),
  $model->id=>array('ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Lista Etiqueta', 'url'=>array('index'),
    'linkOptions'=>array('class'=>'lista')),
  array('label'=>'Agregar Etiqueta', 'url'=>array('agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('label'=>'Ver Etiqueta', 'url'=>array('ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver')),
);
?>
<div id="entrevista-editar">

  <h1>Editar Etiqueta <?php echo $model->id; ?></h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
