<?php
/* @var $this EntrevistaController */
/* @var $model Entrevista */

$this->breadcrumbs=array(
	'Entrevistas'=>array('index'),
	$model->id,
);

$this->menu = array(

  array('label'=>'Agregar Entrevista',
    'url'=>array('/admin/entrevista/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Entrevistas',
    'url'=>array('/admin/entrevista'),
    'linkOptions'=>array('class'=>'lista')),
  array('linkOptions'=>array('class'=>'separador')),

	array('label'=>'Editar Entrevista',
    'url'=>array('/admin/entrevista/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar')),
	array('label'=>'Eliminar Entrevista', 'url'=>'#',
    'linkOptions' => array('class' => 'eliminar',
      'submit' => array('/admin/entrevista/eliminar', 'id' => $model->id),
      'confirm' => '¿Estás seguro de eliminar?',
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>$model->urlCompleta,
    'linkOptions'=>array('class'=>'ver')),
);
?>

<div id="entrevista-ver">

  <h1>Detalle de Entrevista</h1>

  <?php
  $this->renderPartial('_ficha', array(
    'model' => $model,
    'campos' => array(
      'titulo',
      'texto',
      'video',
      'imagenes',
      'fecha_publicacion',
      'fecha_edicion',
      'resumen',
      'miniatura',
      'cita',
      'etiquetas',
    ),
  ));
  ?>

</div>
