<?php
/**
 * @author Mario Vial <mariovials@gmail.com> 2015-09-14 12:48
 */
class PublicacionController extends PublicController
{
  public function actionVer($url)
  {
    $model = Publicacion::model()->find("url = '{$url}'");
    $this->title = $model->titulo;
    $this->render('ver', array(
      'model'=>$model,
    ));
  }

  public function actionIndex()
  {
    $models = Publicacion::model()->findAll();
    $this->title = 'Entrevistas';
    $this->render('index', array(
      'publicaciones'=>$models,
    ));
  }
}
