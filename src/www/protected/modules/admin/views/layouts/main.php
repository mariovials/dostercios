<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo app()->name.' | '.$this->title ?></title>
    <meta name="description" content="<?php echo $this->description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


    <link rel="shortcut icon" href="<?php echo BASE_URL ?>/favicon.ico">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/main.css">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/form.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/admin.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/ficha.css?v=1">

<!--     <link href='http://fonts.googleapis.com/css?family=Roboto:900,500,100,300,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'> -->

  </head>
  <body>

    <div id="pagina" class="admin">

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
