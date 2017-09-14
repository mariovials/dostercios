<?php
/* @var $this ImagenPortadaController */
/* @var $data ImagenPortada */
?>

<div class="item">

  <div class="informacion">
    <a href="<?php echo $data->getUrlLink() ?>">
      <div class="campo imagen">
        <img src="<?php echo $data->pathFileAttribute('imagen') ?>" alt="">
      </div>
    </a>
  </div>

  <div class="opciones">
    <?php
    echo CHtml::link('', array('/admin/imagen-portada/ver', 'id'=>$data->id), array('class'=>'detalles'));
    echo CHtml::link('', array('/admin/imagen-portada/editar', 'id'=>$data->id), array('class'=>'editar'));
    echo CHtml::link('', '#', array('class'=>'eliminar', 'submit'=>array('/admin/imagen-portada/eliminar', 'id'=>$data->id), 'confirm'=>'¿Estás seguro de eliminar?'));
    // echo CHtml::link('', array('/sitio/imagen-portada', 'id'=>$data->id), array('class'=>'ver'));
    ?>
  </div>

</div>
