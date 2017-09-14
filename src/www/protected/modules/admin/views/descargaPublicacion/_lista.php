<?php
/* @var $this DescargaPublicacionController */
/* @var $data DescargaPublicacion */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo publicacion_id">
      <?php echo CHtml::encode($data->publicacion_id); ?>
    </div>
    <div class="campo descarga_id">
      <?php echo CHtml::encode($data->descarga_id); ?>
    </div>
    <div class="campo texto">
      <?php echo CHtml::encode($data->texto); ?>
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/descarga-publicacion/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/descarga-publicacion/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/descarga-publicacion/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/admin/descarga-publicacion/', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
