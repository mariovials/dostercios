<?php
if(!isset($acciones))
  $acciones = array();
if(!isset($campos))
  $campos = array_keys($model->attributes);
?>

<div class="ficha publicacion">

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
      <?php if(in_array('url', $campos)): ?>
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
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('archivo', $campos)): ?>
      <div class="campo archivo">
        <div class="label"><?php echo $model->getAttributeLabel('archivo'); ?></div>
        <div class="value">
          <a href="<?php echo $model->pathFileAttribute('archivo'); ?>"
            target="_blank">
            <?php echo Yii::app()->request->hostInfo . $model->pathFileAttribute('archivo'); ?>
          </a>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila grande">
      <?php if(in_array('insercion', $campos)): ?>
      <div class="campo insercion grande">
        <div class="label"><?php echo $model->getAttributeLabel('insercion'); ?></div>
        <div class="value grande proporcion16-9">
          <?php echo $model->insercion; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('visor', $campos)): ?>
      <div class="campo visor">
        <div class="label"><?php echo $model->getAttributeLabel('visor'); ?></div>
        <div class="value"><?php echo $model->visores[$model->visor]; ?></div>
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
      <?php if(in_array('informacion', $campos)): ?>
      <div class="campo informacion">
        <div class="label"><?php echo $model->getAttributeLabel('informacion'); ?></div>
        <div class="value"><?php echo $model->informacion; ?></div>
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
    </div>

    <div class="fila">
      <?php if(in_array('fecha_edicion', $campos)): ?>
      <div class="campo fecha_edicion">
        <div class="label"><?php echo $model->getAttributeLabel('fecha_edicion'); ?></div>
        <div class="value"><?php echo $model->fecha_edicion; ?></div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('descargas', $campos)): ?>
      <div class="campo descargas">
        <div class="label"><?php echo $model->getAttributeLabel('descargas'); ?></div>
        <div class="value">
          <?php
          foreach ($model->descargas as $descargaPublicacion) {
          ?>

          <div class="campo descarga largo completo">
            <div class="icono">
              <img src="<?php echo $descargaPublicacion->descarga->pathFileAttribute('icono') ?>" alt="<?php echo $descargaPublicacion->descarga->nombre; ?>">
            </div>
            <div class="contenido">
              <div class="label">
                <?php echo $descargaPublicacion->descarga->nombre; ?>
              </div>
              <div class="description">
                <?php echo $descargaPublicacion->descarga->descripcion; ?>
              </div>
              <div class="value">
                <a href="<?php echo $descargaPublicacion->texto ?>">
                  <?php echo $descargaPublicacion->texto; ?>
                </a>
              </div>
            </div>
          </div>
          <br>

          <?php
          }
          ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="fila">
      <?php if(in_array('miniatura', $campos)): ?>
      <div class="campo miniatura">
        <div class="label"><?php echo $model->getAttributeLabel('miniatura'); ?></div>
        <div class="value">
          <?php if ($model->miniatura): ?>
          <img src="<?php echo $model->pathFileAttribute('miniatura'); ?>" alt="">
          <?php else: ?>
          Sin miniatura
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

  </div>

</div>
