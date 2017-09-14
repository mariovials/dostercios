<?php

class BuscadorController extends Controller {

  public function actionIndex($q='')
  {
    $resultados = array();

    $entrevistas = Entrevista::model()->buscar($q);
    foreach ($entrevistas as $entrevista) {
      $resultado = array(
        'titulo' => $entrevista->titulo,
        'tipo' => 'Entrevista',
        'miniatura' => $entrevista->pathFileAttribute('miniatura'),
        'url' => $entrevista->url(),
      );
      $resultados[] = $resultado;
    }

    $series = Serie::model()->buscar($q);
    foreach ($series as $serie) {
      $resultado = array(
        'titulo' => $serie->titulo,
        'tipo' => 'Serie',
        'miniatura' => $serie->pathFileAttribute('imagen'),
        'url' => $serie->url(),
      );
      $resultados[] = $resultado;
    }

    $capitulos = Capitulo::model()->buscar($q);
    foreach ($capitulos as $capitulo) {
      $resultado = array(
        'titulo' => $capitulo->titulo,
        'tipo' => "Capitulo | Serie {$capitulo->serie->titulo}",
        'miniatura' => $capitulo->pathFileAttribute('miniatura'),
        'url' => $capitulo->url(),
      );
      $resultados[] = $resultado;
    }

    $noticias = Noticia::model()->buscar($q);
    foreach ($noticias as $noticia) {
      $resultado = array(
        'titulo' => $noticia->titulo,
        'tipo' => "Noticia",
        'miniatura' => $noticia->pathFileAttribute('miniatura'),
        'url' => $noticia->url(),
      );
      $resultados[] = $resultado;
    }

    $producciones = Produccion::model()->buscar($q);
    foreach ($producciones as $produccion) {
      $resultado = array(
        'titulo' => $produccion->titulo,
        'tipo' => $produccion->tipoMiniatura,
        'miniatura' => $produccion->pathFileAttribute('miniatura'),
        'url' => $produccion->url(),
      );
      $resultados[] = $resultado;
    }

    $publicaciones = Publicacion::model()->buscar($q);
    foreach ($publicaciones as $produccion) {
      $resultado = array(
        'titulo' => $produccion->titulo,
        'tipo' => $produccion->tipoMiniatura,
        'miniatura' => $produccion->pathFileAttribute('miniatura'),
        'url' => $produccion->url(),
      );
      $resultados[] = $resultado;
    }

    echo json_encode($resultados);
    Yii::app()->end();
  }
}
