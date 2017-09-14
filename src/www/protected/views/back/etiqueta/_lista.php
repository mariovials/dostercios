<?php
/* @var $this EtiquetaController */
/* @var $data Etiqueta */
?>

  <div class="item">
    <div class="informacion">
      <div class="campo nombre">
        <?php echo CHtml::encode($data->nombre); ?>
      </div>
    </div>
  <div class="opciones">
    <?php
    echo CHtml::link('', array('/etiqueta/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/etiqueta/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/etiqueta/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/sitio/etiqueta', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>
</div>
