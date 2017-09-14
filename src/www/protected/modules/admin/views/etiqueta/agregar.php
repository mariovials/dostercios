<?php
/* @var $this EtiquetaController */
/* @var $model Etiqueta */

$this->breadcrumbs=array(
  'Etiquetas'=>array('/etiqueta/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Etiquetas',
    'url'=>array('/admin/etiqueta/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="etiqueta-agregar">

  <div id="contenido-head">
    <h1>Agregar Etiqueta</h1>
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
