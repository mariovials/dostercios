<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 * Requiere usar la extensión ActiveForm
 */
?>
<?php echo "<?php\n"; ?>
/**
 * @var $this <?php echo $this->getControllerClass()."\n"; ?>
 * @var $model <?php echo $this->getModelClass()."\n"; ?>
 * @var $form ActiveForm
 */
if(!isset($attributes))
  $attributes = array_keys($model->attributes);
?>
<div class="set">

<?php
foreach($this->tableSchema->columns as $column) {
  if($column->autoIncrement)
    continue;
?>

  <div class="fila">

    <?php echo "<?php if(in_array('{$column->name}', \$attributes)): ?>\n"; ?>
    <div class="campo <?php echo $column->name ?>">
      <div class="label">
      <?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass, $column)."; ?>\n"; ?>
      </div>
      <?php echo "<?php echo \$form->description(\$model, '{$column->name}'); ?>\n"; ?>
      <div class="value">
      <?php echo "<?php echo ".$this->generateActiveField($this->modelClass, $column)."; ?>\n"; ?>
      </div>
      <?php echo "<?php echo \$form->suggestion(\$model, '{$column->name}'); ?>\n"; ?>
      <?php echo "<?php echo \$form->error(\$model, '{$column->name}'); ?>\n"; ?>
    </div>
    <?php echo "<?php endif; ?>\n"; ?>

  </div>
<?php } ?>

</div>
