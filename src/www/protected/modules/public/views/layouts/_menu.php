<?php if($this->menu) { ?>
<div class="seccion" id="menu-opciones">
  <h3>OPCIONES</h3>
  <ul id="model-menu">
    <?php foreach ($this->menu as $item) { ?>
    <li>
    <?php
      echo CHtml::link(
        $item['label'],
        $item['url'],
        isset($item['linkOptions'])?$item['linkOptions']:array()
      );
    ?>
    </li>
    <?php } ?>
  </ul>
</div>
<br />
<?php } ?>