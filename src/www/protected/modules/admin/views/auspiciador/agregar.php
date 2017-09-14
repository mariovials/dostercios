<?php
/* @var $this AuspiciadorController */
/* @var $model Auspiciador */

$this->breadcrumbs=array(
  'Auspiciadors'=>array('/auspiciador/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Auspiciadors',
    'url'=>array('/admin/auspiciador/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="auspiciador-agregar">

  <div id="contenido-head">
    <h1>Agregar Auspiciador</h1>
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
