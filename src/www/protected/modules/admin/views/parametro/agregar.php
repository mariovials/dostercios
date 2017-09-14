<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
  'Parametros'=>array('/parametro/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Parametros',
    'url'=>array('/admin/parametro/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="parametro-agregar">

  <div id="contenido-head">
    <h1>Agregar Parametro</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'nombre',
        'codigo',
        'tipo',
        'valor',
        'descripcion',
      ),
    )); ?>

  </div>

</div>
