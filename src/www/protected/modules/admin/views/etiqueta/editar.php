<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
  'Etiquetas'=>array('/etiqueta/index'),
  $model->id=>array('/etiqueta/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Etiqueta',
    'url'=>array('/admin/etiqueta/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Etiquetas',
    'url'=>array('/admin/etiqueta/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Etiqueta',
    'url'=>array('/admin/etiqueta/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="etiqueta-editar">

  <div id="contenido-head">
    <h1>Editar Etiqueta</h1>
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
