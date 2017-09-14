<?php
?>
<ul id="menu-principal">
  <li class="<?php echo ($this->action->id == 'inicio') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Inicio', array('/sitio/inicio')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'noticias') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Noticias', array('/sitio/noticias')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'informacion') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Información importante', array('/sitio/informacion')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'comites') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Comités', array('/sitio/comites')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'registro') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Registro', array('/sitio/registro')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'programa') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Programa', array('/sitio/programa')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'expositores') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Conferencistas', array('/sitio/expositores')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'cursos') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Cursos', array('/sitio/cursos')) ?>
  </li>
  <li class="deshabilitado">
    <a href="#">Consejos de viaje</a>
  </li>
  <li class="deshabilitado">
    <a href="#">Lugares para visitar</a>
  </li>
  <li class="<?php echo ($this->action->id == 'enlaces') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Enlaces de interés', array('/sitio/enlaces')) ?>
  </li>
  <li class="<?php echo ($this->action->id == 'contacto') ? 'activo' : ''; ?>">
    <?php echo CHtml::link('Contacto', array('/sitio/contacto')) ?>
  </li>
</ul>
