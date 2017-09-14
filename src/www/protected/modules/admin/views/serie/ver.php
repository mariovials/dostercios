<?php
/* @var $this SerieController */
/* @var $model Serie */

$this->menu = array(
  array('label'=>'Agregar Serie',
    'url'=>array('/admin/serie/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Series',
    'url'=>array('/admin/serie'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Agregar Capítulo',
    'url'=>array('/admin/capitulo/agregar', 'id' =>$model->id),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('label'=>'Editar Serie',
    'url'=>array('/admin/serie/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar accion'),
  ),
  array('label'=>'Eliminar Serie',
    'url'=>'#',
    'linkOptions'=>array('class'=>'eliminar accion',
      'submit'=>array('/admin/serie/eliminar', 'id'=>$model->id),
      'confirm'=>'¿Estás seguro de eliminar?'
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>array($model->url()),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="serie-ver">

  <div id="contenido-head">
    <h1><?php echo $model->titulo ?></h1>
  </div>

  <div id="contenido-body">

    <?php $this->renderPartial('_ficha', array(
      'model' => $model,
      'campos' => array(
        'titulo',
        'texto',
        'fecha_publicacion',
        'fecha_edicion',
        'resumen',
        'imagen',
        'etiquetas',
      ),
    )); ?>

  </div>

</div>
