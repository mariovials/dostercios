<?php

class CapituloController extends PublicController {

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionVer($url)
  {
    $model = Capitulo::model()->find("url = '{$url}'");
    $this->title = $model->titulo;
    $this->description = "Capítulo de la Serie {$model->serie->titulo}. {$this->description}";

    $this->render('ver', array(
      'model'=>$model,
    ));
  }

}
