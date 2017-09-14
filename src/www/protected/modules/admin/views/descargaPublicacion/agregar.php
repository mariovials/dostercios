<?php
/* @var $this DescargaPublicacionController */
/* @var $model DescargaPublicacion */

$this->breadcrumbs=array(
  'Descarga Publicacions'=>array('/descarga-publicacion/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Descarga Publicacions',
    'url'=>array('/admin/descarga-publicacion/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="descarga-publicacion-agregar">

  <div id="contenido-head">
    <h1>Agregar Descarga Publicacion</h1>
  </div>

  <div id="contenido-body">

    <?php echo $this->renderPartial('_form', array(
      'model'=>$model,
      'attributes'=>array(
        'publicacion_id',
        'descarga_id',
        'texto',
      ),
    )); ?>

  </div>

</div>
