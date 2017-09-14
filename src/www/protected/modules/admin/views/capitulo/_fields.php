<?php
/**
 * @var $this CapituloController
 * @var $model Capitulo
 * @var $form ActiveForm
 */
if(!isset($attributes))
  $attributes = array_keys($model->attributes);
Yii::app()->clientScript->registerCoreScript('summernote');
Yii::app()->clientScript->registerScriptFile('jquery.form');
$this->cargar_js('subir_foto_capitulo.js');
$this->cargar_js('common.js');
$this->cargar_js('capitulo.js');
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

  <div class="fila">
    <div class="campo url">
      <div class="label">
      <?php echo $form->labelEx($model, 'url'); ?>
      </div>
      <?php echo $form->description($model, 'url'); ?>
      <div class="value">
        <span style="color: #777">
          <?php echo $model->serie->urlCompleta ?>/
        </span>
      <?php echo $form->textField($model, 'url', array('size'=>30,'maxlength'=>2000)); ?>
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
        'cols'=>50,
        // 'value'=>nl2br($model->resumen),
      )); ?>
      </div>
      <?php echo $form->suggestion($model, 'resumen'); ?>
      <?php echo $form->error($model, 'resumen'); ?>
    </div>
  </div>

  <div class="fila">

    <?php if(in_array('video', $attributes)): ?>
    <div class="campo video grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'video'); ?>
      </div>
      <?php echo $form->description($model, 'video'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'video', array(
        'class'=>'codigo',
        'rows'=>2,
        'cols'=>50,
        'maxlength'=>2000,
        )); ?>
      </div>
      <?php echo $form->suggestion($model, 'video'); ?>
      <?php echo $form->error($model, 'video'); ?>
    </div>
    <?php endif; ?>

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
    <div class="campo grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'imagenes'); ?>
      </div>
      <?php echo $form->description($model, 'imagenes'); ?>

      <div class="value">
        <div id="previsualizacion">
          <div class="preview">
            <div id="ratio">
              <button id="subir-imagenes" class=""></button>
            </div>
          </div>
          <?php if (!$model->isNewRecord):
          foreach ($model->imagenes as $imagen) { ?>
          <div class="preview">
            <img src="<?php echo BASE_URL . "{$model->pathImagen()}/{$imagen->filename}"; ?>" alt="">
          </div>
          <?php }
          endif; ?>
        </div>
        <input type="hidden" name="image_form_submit" value="1"/>
        <?php echo $form->fileField($model, 'imagenes', array(
          'multiple' => 'multiple',
          'name' => 'Capitulo[imagenes][]'
        )); ?>
        <?php echo $form->hiddenField($model, 'transaccion', array('value' => $transaccion)); ?>
      </div>

      <div class="subiendo" style="display: none;">
        <img src="<?php echo BASE_URL ?>/img/uploading.gif" alt="Subiendo..." />
      </div>
      <div id="previsualizacion"></div>

      <?php echo $form->suggestion($model, 'imagenes'); ?>
      <?php echo $form->error($model, 'imagenes'); ?>
    </div>
  </div>

  <div class="fila">

    <?php if(in_array('miniatura', $attributes)): ?>
    <div class="campo miniatura">
      <div class="label">
      <?php echo $form->labelEx($model, 'miniatura'); ?>
      </div>
      <?php echo $form->description($model, 'miniatura'); ?>
      <div class="value">
      <?php echo $form->fileField($model, 'miniatura', array('size'=>60,'maxlength'=>2000)); ?>
      </div>
      <?php echo $form->suggestion($model, 'miniatura'); ?>
      <?php echo $form->error($model, 'miniatura'); ?>
    </div>
    <?php endif; ?>

  </div>

</div>

<script>
  $(function() {

    baseUrl = '<?php echo BASE_URL; ?>';

    $('#Capitulo_texto').summernote({
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
