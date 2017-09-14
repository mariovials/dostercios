<?php
/* @var $this DescargaController */
/* @var $model Descarga */

$this->breadcrumbs=array(
  'Descargas'=>array('/descarga/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Descargas',
    'url'=>array('/admin/descarga/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="descarga-agregar">

  <div id="contenido-head">
    <h1>Agregar Descarga</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'nombre',
        'descripcion',
        'icono',
      ),
    )); ?>

  </div>

</div>
