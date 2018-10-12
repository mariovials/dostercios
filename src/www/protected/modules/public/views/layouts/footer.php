<footer id="footer">
  <div id="dostercios-footer" class="footer-section left">
    <table>
      <tr>
        <td>
          <img src="<?php echo BASE_URL ?>/img/logo_23_50x90.png" alt="" class="right">
        </td>
        <td>

    <div class="texto right">
      <div class="titulo">
        <?php echo Parametro::get('nombre') ?>
      </div>
      <div class="informacion">
        <?php echo Parametro::get('direccion') ?> <br>
        <?php echo Parametro::get('correo_electronico') ?> <br>
        © Todos los derechos reservados <br>
        <?php echo CHtml::link('Entrar', array('/admin'), array('id'=>'entrar')) ?>
      </div>
    </div>
        </td>
      </tr>
    </table>
  </div>

  <div id="auspiciadores" class="right">
    <?php $auspiciadores = Auspiciador::model()->findAll();
    foreach ($auspiciadores as $auspiciador): ?>
    <div class="auspiciador footer-section right">
      <?php if ($auspiciador->descripcion) { ?>
      <div class="texto">
        <div class="titulo">
        </div>
        <div class="descripcion">
          <?php echo $auspiciador->descripcion ?>
        </div>
      </div>
      <?php } ?>
      <?php if ($auspiciador->imagen) { ?>
      <div class="imagen">
        <img src="<?php echo $auspiciador->pathFileAttribute('imagen') ?>" alt="">
      </div>
      <?php } ?>
    </div>
    <?php endforeach; ?>
  </div>

</footer>

