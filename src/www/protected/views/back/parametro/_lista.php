<?php
/* @var $this ParametroController */
/* @var $data Parametro */
?>

  <div class="item">
    <div class="informacion">
      <div class="campo descripcion">
        <?php echo CHtml::encode($data->nombre); ?>
      </div>
    </div>
    <div class="opciones">
      <?php
      echo CHtml::link('', array('/parametro/detalles', 'id'=>$data->id),
        array('class'=>'detalles'));
      echo CHtml::link('', array('/parametro/editar', 'id'=>$data->id),
        array('class'=>'editar'));
      echo CHtml::link('', '#',
        array('class'=>'eliminar',
        'submit'=>array('/parametro/eliminar', 'id'=>$data->id),
        'confirm'=>'¿Estás seguro de eliminar?')); ?>
    </div>
  </div>
