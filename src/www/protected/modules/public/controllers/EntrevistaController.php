<?php
/**
 * @author Mario Vial <mariovials@gmail.com> 2015-09-14 12:48
 */
class EntrevistaController extends PublicController
{
  public function actionVer($url)
  {
    $model = Entrevista::model()->find("url = '{$url}'");
    $this->title = $model->titulo;
    $this->render('ver', array(
      'model'=>$model,
    ));
  }

  public function actionIndex()
  {
    $models = Entrevista::model()->findAll();
    $this->title = 'Entrevistas';
    $this->render('index', array(
      'entrevistas'=>$models,
    ));
  }
}
