<?php
/**
 * @author Mario Vial <mariovials@gmail.com> 2015-09-14 12:48
 */
class ProduccionController extends PublicController
{
  public function actionVer($url)
  {
    $model = Produccion::model()->find("url = '{$url}'");
    $this->title = $model->titulo;
    $this->render('ver', array(
      'model'=>$model,
    ));
  }

  public function actionIndex()
  {
    $models = Produccion::model()->findAll();
    $this->title = 'Producciones';
    $this->render('index', array(
      'producciones'=>$models,
    ));
  }
}
