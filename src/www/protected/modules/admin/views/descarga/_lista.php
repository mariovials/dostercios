<?php
/* @var $this DescargaController */
/* @var $data Descarga */
?>

<div class="item">

  <div class="informacion">
    <div class="campo link">
      <?php echo $data->link(); ?>
    </div>
    <div class="campo descripcion">
      <?php echo CHtml::encode($data->descripcion); ?>
    </div>
    <div class="campo icono">
      <img src="<?php echo $data->pathFileAttribute('icono'); ?>" alt="">
    </div>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/descarga/ver', 'id'=>$data->id),
      array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/descarga/editar', 'id'=>$data->id),
      array('class'=>'editar'));
    echo CHtml::link('', '#',
      array('class'=>'eliminar',
      'submit'=>array('/admin/descarga/eliminar', 'id'=>$data->id),
      'confirm'=>'¿Estás seguro de eliminar?'));
    echo CHtml::link('', array('/admin/descarga/', 'id'=>$data->id),
      array('class'=>'ver'));
    ?>
  </div>

</div>
