<?php
$this->cargar_jui();
$this->cargar_js('main.js');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $this->title . ' | ' . Yii::app()->name ?></title>
    <meta name="description" content="<?php echo $this->description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/form.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/style.css">

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106890050-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments)};
      gtag('js', new Date());

      gtag('config', 'UA-106890050-1');
    </script>

  </head>
  <body>

    <?php
    Yii::app()->clientScript->registerScript('yii', '
      var baseUrl = '.CJSON::encode(Yii::app()->baseUrl).';
    ');
    ?>

    <div id="pagina">

      <?php $this->renderPartial('/layouts/header'); ?>

      <?php $this->renderPartial('/layouts/content', array(
        'content'=>$content
      )); ?>

      <?php $this->renderPartial('/layouts/footer'); ?>

    </div>

    <div id="js" style="clear: both;">
    </div>

  </body>
</html>
