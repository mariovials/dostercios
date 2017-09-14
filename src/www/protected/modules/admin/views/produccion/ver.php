<?php
/* @var $this ProduccionController */
/* @var $model Produccion */

$this->breadcrumbs=array(
	'Producciones'=>array('index'),
	$model->id,
);

$this->menu = array(

  array('label'=>'Agregar Producción',
    'url'=>array('/admin/produccion/agregar'),
    'linkOptions'=>array('class'=>'agregar')),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Producciones',
    'url'=>array('/admin/produccion'),
    'linkOptions'=>array('class'=>'lista')),
  array('linkOptions'=>array('class'=>'separador')),

	array('label'=>'Editar Producción',
    'url'=>array('/admin/produccion/editar', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'editar')),
	array('label'=>'Eliminar Producción', 'url'=>'#',
    'linkOptions' => array('class' => 'eliminar',
      'submit' => array('/admin/produccion/eliminar', 'id' => $model->id),
      'confirm' => '¿Estás seguro de eliminar?',
  )),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver en sitio',
    'url'=>$model->urlCompleta,
    'linkOptions'=>array('class'=>'ver')),
);
?>

<div id="produccion-ver">

  <h1>Detalle de Producción</h1>

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
      'categoria',
    ),
  ));
  ?>

</div>
