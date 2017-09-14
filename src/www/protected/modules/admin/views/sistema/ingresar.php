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
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/main.css">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/form.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/entrar.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:900,500,100,300,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>

  </head>
  <body>

    <div id="pagina" class="admin">

      <div id="ingreso"style="background-image: url(<?php echo BASE_URL ?>/img/entrar/ingreso_<?php echo rand(1, 24) ?>.jpg">

        <?php
        $this->pageTitle=Yii::app()->name . ' - Iniciar sesión';
        $this->breadcrumbs=array(
          'Iniciar sesión',
        );
        ?>

        <div id="login-box" class="form">
        <header>
          <img src="<?php echo BASE_URL ?>/img/logo_23_200x300.png" alt="">
        </header>
        <?php $form=$this->beginWidget('ActiveForm'); ?>

          <div class="row">
            <?php echo $form->textField($model, 'usuario', array('placeholder'=>'Usuario')); ?>
            <?php echo $form->error($model, 'usuario'); ?>
          </div>

          <div class="row">
            <?php echo $form->passwordField($model, 'password', array('placeholder'=>'Contraseña')); ?>
            <?php echo $form->error($model, 'password'); ?>
          </div>

          <div class="row recordarme">
            <?php echo $form->checkBox($model, 'recordarme'); ?>
            <?php echo $form->label($model, 'recordarme'); ?>
            <?php echo $form->error($model, 'recordarme'); ?>
          </div>

          <div class="row buttons">
            <?php echo CHtml::submitButton('Entrar', array('id'=>'boton-ingreso')); ?>
          </div>

        <?php $this->endWidget(); ?>
        </div>
      </div>

    </div>

  </body>
</html>
