<?php
/* @var $this AuspiciadorController */
/* @var $model Auspiciador */

$this->breadcrumbs=array(
  'Auspiciadors'=>array('/auspiciador/index'),
  $model->id,
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

  array('label'=>'Editar Auspiciador',
    'url'=>array('/admin/auspiciador/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Auspiciador',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/auspiciador/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('auspiciador'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="auspiciador-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'nombre',
        'descripcion',
        'imagen',
        'fecha_creacion',
        'fecha_edicion',
      ),
    )); ?>

  </div>

</div>
