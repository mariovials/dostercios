<?php
/* @var $this AuspiciadorController */
/* @var $model Auspiciador */

$this->breadcrumbs=array(
  'Auspiciadors'=>array('/auspiciador/index'),
  $model->id=>array('/auspiciador/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Auspiciador',
    'url'=>array('/admin/auspiciador/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Auspiciadors',
    'url'=>array('/admin/auspiciador/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Auspiciador',
    'url'=>array('/admin/auspiciador/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="auspiciador-editar">

  <div id="contenido-head">
    <h1>Editar Auspiciador</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'nombre',
        'descripcion',
        'imagen',
      ),
    )); ?>

  </div>

</div>
