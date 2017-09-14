<?php

class SistemaController extends AdminController {

  public function actionIndex()
  {
    $this->redirect(BASE_URL . '/admin/sistema/entrar');
  }

  public function actionEntrar() {

    $model = new LoginForm;

    if(!user()->isGuest) {
      $this->redirect(BASE_URL . '/admin/sistema/panel');
    }

    // if it is ajax validation request
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if(isset($_POST['LoginForm'])) {
      $model->attributes = $_POST['LoginForm'];
      // validate user input and redirect to the previous page if valid
      if($model->validate() && $model->login()) {
        if(Yii::app()->user->returnUrl != Yii::app()->homeUrl) {
          $this->redirect(BASE_URL . Yii::app()->user->returnUrl);
        } else {
          $this->redirect($this->createUrl('/admin/sistema/panel'));
        }
      }
    }
    $this->renderPartial('ingresar', array('model'=>$model));
  }

  public function actionSalir() {
    user()->logout();
    $this->redirect(Yii::app()->homeUrl);
  }

  /**
   * This is the action to handle external exceptions.
   */
  public function actionError() {
    if($error=Yii::app()->errorHandler->error) {
      if(Yii::app()->request->isAjaxRequest)
        echo $error['message'];
      else
        $this->render('error', $error);
    }
  }

  public function actionPanel()
  {
    $this->render('panel');
  }

}
