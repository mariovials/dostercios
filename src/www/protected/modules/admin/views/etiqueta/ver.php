<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
  'Etiquetas'=>array('/etiqueta/index'),
  $model->id,
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

  array('label'=>'Editar Etiqueta',
    'url'=>array('/admin/etiqueta/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Etiqueta',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/etiqueta/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('etiqueta'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="etiqueta-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'nombre',
      ),
    )); ?>

  </div>

</div>
