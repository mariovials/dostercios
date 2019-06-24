<?php
/**
 * FUNCIONES PARA GESTIONAR ARCHIVOS
 */

/**
 * Obtiene un archivo desde el formulario
 *
 * @param $model, el modelo
 * @param string $attribute, el atributo del form
 */
function getFile(&$model, $attribute) {
  $file = CUploadedFile::getInstance($model, $attribute);
  if (is_object($file) && get_class($file) === 'CUploadedFile') {
    $model->{$attribute} = $file;
  } else {
    $model->{$attribute} = $model->oldAttributes[$attribute];
  }
}

/**
 * Guarda el archivo en la carpeta
 *
 * @param $model, el model
 * @param $attribute, el atributo que tiene el archivo
 * @param $path, el path donde se guardará
 */
function saveFile($model, $attribute, $path=false) {

  if (is_object($model->{$attribute})) {
    $file = $model->{$attribute};
    if (!$path) {
      $name = get_class($model) . '_' . mktime() . '_'
        . $attribute . '_' . $model->{$attribute};
      $dir = Yii::getPathOfAlias('webroot') . '/assets/images/tmp/' . $name;
      $model->{$attribute} = '/assets/images/tmp/' . $name;
    }
    else {
      $dir = Yii::getPathOfAlias('webroot') . $path
        . $model->id . '_' . $model->{$attribute};
    }
    return $file->saveAs($dir);
  }
  // return null;
}

/**
 * @return la url del archivo
 */
function getUrl($model, $attribute, $path) {
  return Yii::app()->baseUrl . $path . $model->id . '_' . $model->{$attribute};
}

function deleteFile($path = null)
{
  if ($path) {
    $realpath = realpath(getcwd() . $path);
    if ($realpath && is_readable($realpath)) {
      return unlink($realpath);
    } else {
      Yii::log('warning', CLogger::LEVEL_WARNING, 'No se pudo eliminar el archivo asociado.');
      return false;
    }
  } else {
    return null;
  }
}

function rrmdir($dir)
{
  $files = array_diff(scandir($dir), array('.', '..'));
  foreach ($files as $file) {
    (is_dir("$dir/$file")) ? rrmdir("$dir/$file") : unlink("$dir/$file");
  }
  return rmdir($dir);
}
