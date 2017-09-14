<?php
/* @var $this ParametroController */
/* @var $data Parametro */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo valor">
      <?php echo CHtml::encode($data->valor); ?>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/parametro/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/parametro/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/parametro/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/admin/parametro/', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
