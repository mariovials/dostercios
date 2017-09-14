<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);
?>

<div class="ficha serie">

  <div class="datos">

    <div class="fila">
      <?php if(in_array('id', $campos)): ?>
      <div class="campo id">
        <div class="label"><?php echo $model->getAttributeLabel('id'); ?></div>
        <div class="value"><?php echo $model->id; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('titulo', $campos)): ?>
      <div class="campo titulo">
        <div class="label"><?php echo $model->getAttributeLabel('titulo'); ?></div>
        <div class="value"><?php echo $model->titulo; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('etiquetas', $campos)): ?>
      <div class="campo etiquetas">
        <div class="label"><?php echo $model->getAttributeLabel('etiquetas'); ?></div>
        <div class="value"><?php echo $model->etiquetas; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <div class="campo url">
        <div class="label"><?php echo $model->getAttributeLabel('url'); ?></div>
        <div class="value">
          <a href="<?php echo $model->urlCompleta; ?>" target="_blank">
            <?php echo $model->urlCompleta; ?>
          </a>
        </div>
      </div>
      <div class="campo portada">
        <div class="label"><?php echo $model->getAttributeLabel('portada'); ?></div>
        <div class="value"><?php echo $model->portadaTexto(); ?></div>
      </div>
    </div>

    <div class="fila">
      <?php if(in_array('imagen', $campos)): ?>
      <div class="campo imagen">
        <div class="label"><?php echo $model->getAttributeLabel('imagen'); ?></div>
        <div class="value">
          <img style="width: 100%" src="<?php echo $model->pathFileAttribute('imagen'); ?>" alt="">
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('texto', $campos)): ?>
      <div class="campo texto">
        <div class="label"><?php echo $model->getAttributeLabel('texto'); ?></div>
        <div class="value"><?php echo $model->texto; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('resumen', $campos)): ?>
      <div class="campo resumen">
        <div class="label"><?php echo $model->getAttributeLabel('resumen'); ?></div>
        <div class="value"><?php echo $model->resumen; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('fecha_publicacion', $campos)): ?>
      <div class="campo fecha_publicacion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_publicacion'); ?></div>
        <div class="value"><?php echo $model->fecha_publicacion; ?></div>
      </div>
      <?php endif; ?>
      <?php if(in_array('fecha_edicion', $campos)): ?>
      <div class="campo fecha_edicion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_edicion'); ?></div>
        <div class="value"><?php echo $model->fecha_edicion; ?></div>
      </div>
      <?php endif; ?>
    </div>


    <div class="fila">
      <div class="campo capitulos grande">
        <div class="label"><?php echo $model->getAttributeLabel('Capítulos'); ?></div>
        <div class="value">
          <div class="lista capitulo admin">
          <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>new CActiveDataProvider('Capitulo', array(
              'data' => $model->capitulos
            )),
            'itemView'=>'/capitulo/_lista',
          )); ?>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
