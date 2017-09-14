<?php

class SitioController extends PublicController
{

  /**
   * Portada del sitio
   */
  public function actionIndex()
  {
    $this->title = 'Inicio';
    $this->render('inicio');
  }

  public function actionSobre()
  {
    $this->title = 'Sobre';
    $this->render('sobre');
  }

}
