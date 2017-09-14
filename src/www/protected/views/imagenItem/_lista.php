<?php
/* @var $this ImagenItemController */
/* @var $data ImagenItem */
?>

  <div class="item">
    <div class="informacion">
      <div class="campo tabla_id">
        <?php echo CHtml::encode($data->tabla_id); ?>
      </div>
      <div class="campo entidad_id">
        <?php echo CHtml::encode($data->entidad_id); ?>
      </div>
    </div>
  <div class="opciones">
    <?php
    echo CHtml::link('', array('/imagen-item/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/imagen-item/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/imagen-item/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/sitio/imagen-item', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>
</div>
