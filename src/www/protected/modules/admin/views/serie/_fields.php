<?php
/**
 * @var $this SerieController
 * @var $model Serie
 * @var $form ActiveForm
 */
if(!isset($attributes))
  $attributes = array_keys($model->attributes);

Yii::app()->clientScript->registerCoreScript('summernote');
$this->cargar_js('common.js');
$this->cargar_js('serie.js');
?>
<div class="set">


  <div class="fila">
    <?php if(in_array('titulo', $attributes)): ?>
    <div class="campo titulo grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'titulo'); ?>
      </div>
      <?php echo $form->description($model, 'titulo'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'titulo', array('size'=>60,'maxlength'=>2000)); ?>
      </div>
      <?php echo $form->suggestion($model, 'titulo'); ?>
      <?php echo $form->error($model, 'titulo'); ?>
    </div>
    <?php endif; ?>
  </div>

  <div class="fila grande">
    <div class="campo grande etiquetas">
      <div class="label">
      <?php echo $form->labelEx($model, 'etiquetas'); ?>
      </div>
      <?php echo $form->description($model, 'etiquetas'); ?>
      <div class="value grande">
      <?php
      echo $form->textArea($model, 'etiquetas', array(
        'rows'=>1,
        'cols'=>50,
        'maxlength'=>2000,
        ));
      ?>
      </div>
      <?php echo $form->suggestion($model, 'etiquetas'); ?>
      <div id="etiquetas-todas">
        <?php
        $etiquetas = Etiqueta::model()->findAll();
        $etiquetas_html = array();
        foreach ($etiquetas as $etiqueta) {
          $etiquetas_html[] = '<a href="#" class="etiqueta">' . $etiqueta->nombre . '</a>';
        }
        echo implode(', ', $etiquetas_html);
        ?>
      </div>
      <?php echo $form->error($model, 'etiquetas'); ?>
    </div>
  </div>

  <div class="fila">
    <div class="campo url">
      <div class="label">
      <?php echo $form->labelEx($model, 'url'); ?>
      </div>
      <?php echo $form->description($model, 'url'); ?>
      <div class="value">
        <span style="color: #777">
          <?php echo Yii::app()->request->hostInfo . BASE_URL ?>/serie/
        </span>
      <?php echo $form->textField($model, 'url', array('size'=>40,'maxlength'=>2000)); ?>
      </div>
      <?php echo $form->suggestion($model, 'url'); ?>
      <?php echo $form->error($model, 'url'); ?>
    </div>
    <div class="campo portada">
      <div class="label">
      <?php echo $form->labelEx($model, 'portada'); ?>
      </div>
      <?php echo $form->description($model, 'portada'); ?>
      <div class="value">
      <?php echo $form->dropDownList($model, 'portada', array('0' => 'No mostrar', '1' => 'Tamaño normal', '2' => 'Tamaño grande')); ?>
      </div>
      <?php echo $form->suggestion($model, 'portada'); ?>
      <?php echo $form->error($model, 'portada'); ?>
    </div>
  </div>

  <div class="fila">

    <?php if(in_array('texto', $attributes)): ?>
    <div class="campo texto grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'texto'); ?>
      </div>
      <?php echo $form->description($model, 'texto'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'texto', array('rows'=>6, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'texto'); ?>
      <?php echo $form->error($model, 'texto'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">
    <div class="campo resumen grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'resumen'); ?>
      </div>
      <?php echo $form->description($model, 'resumen'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'resumen', array(
        'rows'=>3,
        // 'value'=>nl2br($model->resumen),
      )); ?>
      </div>
      <?php echo $form->suggestion($model, 'resumen'); ?>
      <?php echo $form->error($model, 'resumen'); ?>
    </div>
  </div>

  <div class="fila">

    <?php if(in_array('fecha_publicacion', $attributes)): ?>
    <div class="campo fecha_publicacion">
      <div class="label">
      <?php echo $form->labelEx($model, 'fecha_publicacion'); ?>
      </div>
      <?php echo $form->description($model, 'fecha_publicacion'); ?>
      <div class="value">
      <?php echo $form->datepicker($model,'fecha_publicacion'); ?>
      </div>
      <?php echo $form->suggestion($model, 'fecha_publicacion'); ?>
      <?php echo $form->error($model, 'fecha_publicacion'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('imagen', $attributes)): ?>
    <div class="campo imagen">
      <div class="label">
      <?php echo $form->labelEx($model, 'imagen'); ?>
      </div>
      <?php echo $form->description($model, 'imagen'); ?>
      <div class="value">
      <?php echo $form->fileField($model,'imagen'); ?>
      </div>
      <?php echo $form->suggestion($model, 'imagen'); ?>
      <?php echo $form->error($model, 'imagen'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>


<script>
  $(function() {
    $('#Serie_texto').summernote({
      toolbar: [
        ['style', ['style']],
        ['fontname', ['fontname', 'fontsize']],
        ['para', ['paragraph']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['height', ['height']],
        ['color', ['color']],
        ['para', ['ul', 'ol']],
        ['table', ['table']],
        ['insert', ['link', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
    });
  })
</script>
