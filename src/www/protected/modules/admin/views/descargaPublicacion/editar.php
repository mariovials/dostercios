<?php
/* @var $this DescargaPublicacionController */
/* @var $model DescargaPublicacion */

$this->breadcrumbs=array(
  'Descarga Publicacions'=>array('/descarga-publicacion/index'),
  $model->id=>array('/descarga-publicacion/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Descarga Publicacion',
    'url'=>array('/admin/descarga-publicacion/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Descarga Publicacions',
    'url'=>array('/admin/descarga-publicacion/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Descarga Publicacion',
    'url'=>array('/admin/descarga-publicacion/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="descarga-publicacion-editar">

  <div id="contenido-head">
    <h1>Editar DescargaPublicacion</h1>
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
