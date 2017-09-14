<?php
/* @var $this DescargaPublicacionController */
/* @var $model DescargaPublicacion */

$this->breadcrumbs=array(
  'Descarga Publicacions'=>array('/descarga-publicacion/index'),
  $model->id,
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

  array('label'=>'Editar Descarga Publicacion',
    'url'=>array('/admin/descarga-publicacion/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Descarga Publicacion',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/descarga-publicacion/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array('descarga-publicacion'),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="descarga-publicacion-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'publicacion_id',
        'descarga_id',
        'texto',
      ),
    )); ?>

  </div>

</div>
