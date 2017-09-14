<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
  'Parametros'=>array('/parametro/index'),
  $model->id,
);

$this->menu = array(
  array('label'=>'Agregar Parametro',
    'url'=>array('/admin/parametro/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Parametros',
    'url'=>array('/admin/parametro/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Editar Parametro',
    'url'=>array('/admin/parametro/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Parametro',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/parametro/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('parametro'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="parametro-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'nombre',
        'codigo',
        'tipo',
        'valor',
        'descripcion',
      ),
    )); ?>

  </div>

</div>
