<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/categoria/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/categoria/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/categoria/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/admin/categoria/', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
