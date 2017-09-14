<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */

if(!isset($attributes))
  $attributes = array_keys($model->attributes);
?>

<div class="form <?php echo camel2dash($this->getModelClass()) ?>">

<?php echo "<?php \$form=\$this->beginWidget('ActiveForm', array(
  'id'=>'".$this->class2id($this->modelClass)."-form',
  'enableAjaxValidation'=>false,
  // 'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>\n"; ?>

  <p class="note">Campos con <span class="required">*</span> son necesarios.</p>

  <?php echo "<?php echo \$form->errorSummary(\$model); ?>"; ?>

  <?php echo "
  <?php
  \$this->renderPartial('_fields', array(
    'form'=>\$form,
    'model'=>\$model,
    'attributes' => \$attributes,
  ));
  ?>
  ";
  ?>

  <?php // PARA USAR camel2dash requiere incluir el php_helper ?>
  <div class="fila botones">
    <?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Agregar' : 'Guardar',
      array('class'=>'confirmar')); ?>\n"; ?>
    <?php echo "<?php\n" ?>
      if($model->isNewRecord)
        echo CHtml::link('Cancelar', array('/<?php echo camel2dash($this->controller) ?>'));
      else
        echo CHtml::link('Cancelar', array('/<?php echo camel2dash($this->controller) ?>/ver',
        'id'=>$model-><?php echo $this->tableSchema->primaryKey ?>));
      <?php echo "?>\n" ?>
  </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div>
