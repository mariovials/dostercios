<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
  'Categorias'=>array('/categoria/index'),
  $model->id=>array('/categoria/ver','id'=>$model->id),
  'Editar',
);

$this->menu = array(
  array('label'=>'Agregar Categoria',
    'url'=>array('/admin/categoria/agregar'),
    'linkOptions'=>array('class'=>'agregar accion'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Lista de Categorias',
    'url'=>array('/admin/categoria/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),

  array('label'=>'Ver Categoria',
    'url'=>array('/admin/categoria/ver', 'id'=>$model->id),
    'linkOptions'=>array('class'=>'ver nav'),
  ),
);
?>

<div id="categoria-editar">

  <div id="contenido-head">
    <h1>Editar Categoria</h1>
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
