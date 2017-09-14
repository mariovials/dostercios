<?php echo "<?php
if(!isset(\$acciones))
  \$acciones = array();
if(!isset(\$campos))
  \$campos = array_keys(\$model->attributes);
?>
";
?>

<div class="ficha <?php echo camel2dash($this->getModelClass()) ?>">

  <div class="datos">
<?php foreach($this->tableSchema->columns as $column) { ?>

    <div class="fila">
      <?php echo "<?php if(in_array('$column->name', \$campos)): ?>\n" ?>
      <div class="campo <?php echo $column->name ?>">
        <div class="label"><?php echo "<?php echo \$model->getAttributeLabel('$column->name'); ?>" ?></div>
        <div class="value"><?php echo "<?php echo \$model->$column->name; ?>" ?></div>
      </div>
      <?php echo "<?php endif; ?>\n" ?>
    </div>
<?php } ?>

  </div>

</div>
