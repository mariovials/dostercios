<?php
/**
 * @author Mario Vial <mariovials@gmail.com> 2015-09-14 12:48
 */
class NoticiaController extends PublicController
{
  public function actionVer($url)
  {
    $model = Noticia::model()->find("url = '{$url}'");
    $this->title = $model->titulo;
    $this->render('ver', array(
      'model'=>$model,
    ));
  }

  public function actionIndex()
  {
    $models = Noticia::model()->findAll();
    $this->title = 'Noticias';
    $this->render('index', array(
      'noticias'=>$models,
    ));
  }
}
