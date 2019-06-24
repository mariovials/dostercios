<script>
  var baseUrl = '<?php echo BASE_URL ?>';
</script>
<header id="header" class="<?php echo Parametro::get('fondo_encabezado') ?>">
  <nav>
    <button id="menu-icon">
      <span class="icon">
        ☰
      </span>
      <span class="texto">
      menú
      </span>
    </button>
    <div id="logo">
      <a href="<?php echo Yii::app()->homeUrl ?>">
      </a>
    </div>
    <div id="buscador-box">
      <input type="text" id="buscador">
      <div id="buscador-resultados">
      </div>
    </div>
    <ul id="menu">
      <li id="portada-menu">
        <a class="<?php echo ($this->id=='sitio') ? 'activo' : '' ?>"
          href="<?php echo BASE_URL ?>/">
          Portada</a>
      </li>
      <li>
        <a class="<?php echo ($this->id=='entrevista') ? 'activo' : '' ?>"
          href="<?php echo BASE_URL ?>/entrevistas">
          Entrevistas</a>
      </li>
      <li>
        <a class="<?php echo ($this->id=='serie') ? 'activo' : '' ?>"
          href="<?php echo BASE_URL ?>/series">
          Series</a>
      </li>
      <li>
        <a class="<?php echo ($this->id=='produccion') ? 'activo' : '' ?>"
          href="<?php echo BASE_URL ?>/producciones">
          Producciones</a>
      </li>
      <li>
        <a class="<?php echo ($this->id=='publicacion') ? 'activo' : '' ?>"
          href="<?php echo BASE_URL ?>/editorial">
          Publicaciones</a>
      </li>
      <li>
        <a class=""
          href="https://dostercios.bootic.net" target="_blank">
          Tienda</a>
      </li>
      <li>
        <a class="<?php echo ($this->id=='sitio' && $this->action->id == 'sobre') ? 'activo' : '' ?>"
          href="<?php echo BASE_URL ?>/sobre">
          Sobre 2/3</a>
      </li>
    </ul>
  </nav>
</header>

