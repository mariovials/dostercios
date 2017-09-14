<?php
/**
 * @var $this PublicacionController
 * @var $model Publicacion
 * @var $form ActiveForm
 */
Yii::app()->clientScript->registerCoreScript('summernote');
Yii::app()->clientScript->registerScriptFile('jquery.form');
$this->cargar_js('subir_foto_publicacion.js');
$this->cargar_js('common.js');
$this->cargar_js('publicacion.js');
if(!isset($attributes))
  $attributes = array_keys($model->attributes);
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

    <?php if(in_array('visor', $attributes)): ?>
    <div class="campo visor">
      <div class="label">
      <?php echo $form->labelEx($model, 'visor'); ?>
      </div>
      <?php echo $form->description($model, 'visor'); ?>
      <div class="value">
      <?php echo $form->dropDownList($model,'visor', $model->opcionesVisor(), array('empty'=>'Seleccione...')); ?>
      </div>
      <?php echo $form->suggestion($model, 'visor'); ?>
      <?php echo $form->error($model, 'visor'); ?>
    </div>
    <?php endif; ?>

    <?php if(in_array('url', $attributes)): ?>
    <div class="campo url">
      <div class="label">
      <?php echo $form->labelEx($model, 'url'); ?>
      </div>
      <?php echo $form->description($model, 'url'); ?>
      <div class="value">
      <?php echo $form->textField($model, 'url', array('size'=>60,'maxlength'=>2000)); ?>
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
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('archivo', $attributes)): ?>
    <div class="campo archivo">
      <div class="label">
      <?php echo $form->labelEx($model, 'archivo'); ?>
      </div>
      <?php echo $form->description($model, 'archivo'); ?>
      <div class="value">
      <?php echo $form->fileField($model, 'archivo'); ?>
      </div>
      <?php echo $form->suggestion($model, 'archivo'); ?>
      <?php echo $form->error($model, 'archivo'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('insercion', $attributes)): ?>
    <div class="campo insercion grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'insercion'); ?>
      </div>
      <?php echo $form->description($model, 'insercion'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'insercion', array('rows'=>6, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'insercion'); ?>
      <?php echo $form->error($model, 'insercion'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('miniatura', $attributes)): ?>
    <div class="campo miniatura">
      <div class="label">
      <?php echo $form->labelEx($model, 'miniatura'); ?>
      </div>
      <?php echo $form->description($model, 'miniatura'); ?>
      <div class="value">
      <?php echo $form->fileField($model, 'miniatura'); ?>
      </div>
      <?php echo $form->suggestion($model, 'miniatura'); ?>
      <?php echo $form->error($model, 'miniatura'); ?>
    </div>
    <?php endif; ?>

    <?php if(in_array('resumen_miniatura', $attributes)): ?>
    <div class="campo resumen_miniatura">
      <div class="label">
      <?php echo $form->labelEx($model, 'resumen_miniatura'); ?>
      </div>
      <?php echo $form->description($model, 'resumen_miniatura'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'resumen_miniatura', array('rows'=>3, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'resumen_miniatura'); ?>
      <?php echo $form->error($model, 'resumen_miniatura'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('resumen', $attributes)): ?>
    <div class="campo resumen grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'resumen'); ?>
      </div>
      <?php echo $form->description($model, 'resumen'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'resumen', array('rows'=>6, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'resumen'); ?>
      <?php echo $form->error($model, 'resumen'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php if(in_array('informacion', $attributes)): ?>
    <div class="campo informacion grande">
      <div class="label">
      <?php echo $form->labelEx($model, 'informacion'); ?>
      </div>
      <?php echo $form->description($model, 'informacion'); ?>
      <div class="value">
      <?php echo $form->textArea($model, 'informacion', array('rows'=>6, 'cols'=>50)); ?>
      </div>
      <?php echo $form->suggestion($model, 'informacion'); ?>
      <?php echo $form->error($model, 'informacion'); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="fila">

    <?php
    foreach ($model->descargas as $i => $descargaPublicacion):
    ?>
    <div class="campo descarga largo completo">
      <div class="icono">
        <img
        src="<?php echo $descargaPublicacion->descarga->pathFileAttribute('icono'); ?>"
        alt="<?php echo $descargaPublicacion->descarga->nombre; ?>">
      </div>
      <div class="contenido">
        <div class="label">
          <?php echo $descargaPublicacion->descarga->nombre; ?>
        </div>
        <div class="description">
          <?php echo $descargaPublicacion->descarga->descripcion; ?>
        </div>
        <div class="value">
          <?php echo $form->hiddenField($descargaPublicacion, "[$i]descarga_id", array('size'=>'70')); ?>
          <?php echo $form->textField($descargaPublicacion, "[$i]texto", array('size'=>'70')); ?>
        </div>
      </div>
    </div>
    <?php
    endforeach; ?>

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

</div>


<script>
  $(function() {

  baseUrl = '<?php echo BASE_URL; ?>';

    $('#Publicacion_informacion').summernote({
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
