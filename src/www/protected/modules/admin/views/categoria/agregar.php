<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
  'Categorias'=>array('/categoria/index'),
  'Agregar',
);

$this->menu = array(
  array('label'=>'Lista de Categorias',
    'url'=>array('/admin/categoria/'),
    'linkOptions'=>array('class'=>'lista nav'),
  ),
  array('linkOptions'=>array('class'=>'separador')),
);
?>

<div id="categoria-agregar">

  <div id="contenido-head">
    <h1>Agregar Categoria</h1>
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
