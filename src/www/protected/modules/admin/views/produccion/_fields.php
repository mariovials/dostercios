<?php
/**
 * @var $this ProduccionController
 * @var $model Produccion
 * @var $form ActiveForm
 */
Yii::app()->clientScript->registerCoreScript('summernote');
Yii::app()->clientScript->registerScriptFile('jquery.form');
$this->cargar_js('subir_foto_produccion.js');
$this->cargar_js('common.js');
$this->cargar_js('produccion.js');
?>

<div class="set">

  <div class="fila grande">
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
  </div>

  <div class="fila">
    <div class="campo categoria">
      <div class="label">
      <?php echo $form->labelEx($model, 'categoria_id'); ?>
      </div>
      <?php echo $form->description($model, 'categoria_id'); ?>
      <div class="value">
      <?php echo $form->dropDownList($model, 'categoria_id', $model->opcionesCategoria(), array('empty'=>'Seleccione...')); ?>
      </div>
      <?php echo $form->suggestion($model, 'categoria_id'); ?>
      <?php echo $form->error($model, 'categoria_id'); ?>
    </div>
    <div class="campo etiquetas">
      <div class="label">
      <?php echo $form->labelEx($model, 'etiquetas'); ?>
      </div>
      <?php echo $form->description($model, 'etiquetas'); ?>
      <div class="value grande">
      <?php
      echo $form->textField($model, 'etiquetas', array(
        'size'=>80,
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
          <?php echo Yii::app()->request->hostInfo . BASE_URL ?>/produccion/
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
    <div class="campo texto grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'texto'); ?>
      </div>
      <?php echo $form->description($model, 'texto'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'texto', array(
        'rows'=>6,
        'cols'=>50,
        // 'value'=>nl2br($model->texto),
      )); ?>
      </div>
      <?php echo $form->suggestion($model, 'texto'); ?>
      <?php echo $form->error($model, 'texto'); ?>
    </div>
  </div>

  <div class="fila">
    <div class="campo cita grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'cita'); ?>
      </div>
      <?php echo $form->description($model, 'cita'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'cita', array(
        'rows'=>2,
        'cols'=>50,
      )); ?>
      </div>
      <?php echo $form->suggestion($model, 'cita'); ?>
      <?php echo $form->error($model, 'cita'); ?>
    </div>
  </div>

  <div class="fila">
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
            <img src="<?php echo BASE_URL."/img/produccion/{$model->id}/{$imagen->filename}"; ?>" alt="">
          </div>
          <?php }
          endif; ?>
        </div>
        <input type="hidden" name="image_form_submit" value="1"/>
        <?php echo $form->fileField($model, 'imagenes', array(
          'multiple' => 'multiple',
          'name' => 'Produccion[imagenes][]'
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
    <div class="campo resumen grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'resumen'); ?>
      </div>
      <?php echo $form->description($model, 'resumen'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'resumen', array(
        'rows'=>6,
        'cols'=>50,
      )); ?>
      </div>
      <?php echo $form->suggestion($model, 'resumen'); ?>
      <?php echo $form->error($model, 'resumen'); ?>
    </div>
  </div>

  <div class="fila">
    <div class="campo miniatura grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'miniatura'); ?>
      </div>
      <?php echo $form->description($model, 'miniatura'); ?>

      <div class="value">
        <div id="prev-miniatura">
          <?php if (!$model->isNewRecord && $model->miniatura): ?>
          <div class="preview">
            <?php if ($model->miniatura): ?>
            <img width="50%" src="<?php echo BASE_URL."/img/produccion/{$model->id}/{$model->id}_{$model->miniatura}"; ?>" alt="">
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php echo $form->fileField($model, 'miniatura', array(
        )); ?>
      </div>
      <div id="prev-miniatura"></div>

      <?php echo $form->suggestion($model, 'miniatura'); ?>
      <?php echo $form->error($model, 'miniatura'); ?>
    </div>
  </div>

  <div class="fila">
    <div class="campo">
      <div class="label">
      <?php echo $form->labelEx($model, 'fecha_publicacion'); ?>
      </div>
      <?php echo $form->description($model, 'fecha_publicacion'); ?>
      <div class="value">
      <?php echo $form->datepicker($model, 'fecha_publicacion'); ?>
      </div>
      <?php echo $form->suggestion($model, 'fecha_publicacion'); ?>
      <?php echo $form->error($model, 'fecha_publicacion'); ?>
    </div>
  </div>

</div>

<script>
  $(function() {

  baseUrl = '<?php echo BASE_URL; ?>';

    $('#Produccion_texto').summernote({
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
  });
</script>
