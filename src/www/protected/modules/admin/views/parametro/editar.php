<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
  'Parametros'=>array('/parametro/index'),
  $model->id=>array('/parametro/ver','id'=>$model->id),
  'Editar',
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

  array('label'=>'Ver Parametro',
    'url'=>array('/admin/parametro/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="parametro-editar">

  <div id="contenido-head">
    <h1>Editar Parametro</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'nombre',
        'valor',
        'descripcion',
      ),
    )); ?>

  </div>

</div>
