<?php

class SerieController extends PublicController {

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionVer($url)
  {
    $model = Serie::model()->find("url = '{$url}'");
    $this->title = $model->titulo;

    $this->render('ver', array(
      'model'=>$model,
    ));
  }

  public function actionIndex()
  {
    $series = Serie::model()->findAll();
    $this->title = 'Series';
    $this->render('index', array(
      'series' => $series,
    ));
  }

}
