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
      echo CHtml::link('', array('/parametro/editar',
          'id'=>$data->id,
          'rurl'=>Yii::app()->request->url,
        ),
        array('class'=>'editar'));
      ?>
    </div>
  </div>
