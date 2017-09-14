<?php
/**
 * Archivo para alias de funciones de php
 */

/**
 * $_GET de php
 */
function GET($param) {
  if(isset($_GET[$param]))
    return $_GET[$param];
  else return null;
}

/**
 * Convierte CamelCase a camdel-case
 */
function camel2dash($str) {
  return strtolower(
    preg_replace(
      '/(?!^)[[:upper:]][[:lower:]]/',
      '$0',
      preg_replace(
        '/(?!^)[[:upper:]]+/',
        '-'.'$0',
        $str
      )
    )
  );
}

function limpiar_str($string) {
  $string = str_replace(array('á','à','â','ã','ª','ä'),'a',$string);
  $string = str_replace(array('Á','À','Â','Ã','Ä'),'A',$string);
  $string = str_replace(array('Í','Ì','Î','Ï'),'I',$string);
  $string = str_replace(array('í','ì','î','ï'),'i',$string);
  $string = str_replace(array('é','è','ê','ë'),'e',$string);
  $string = str_replace(array('É','È','Ê','Ë'),'E',$string);
  $string = str_replace(array('ó','ò','ô','õ','ö','º'),'o',$string);
  $string = str_replace(array('Ó','Ò','Ô','Õ','Ö'),'O',$string);
  $string = str_replace(array('ú','ù','û','ü'),'u',$string);
  $string = str_replace(array('Ú','Ù','Û','Ü'),'U',$string);
  $string = str_replace(array('[','^','´','`','¨','~',']'),"",$string);
  $string = str_replace('ç','c',$string);
  $string = str_replace('Ç','C',$string);
  $string = str_replace('ñ','n',$string);
  $string = str_replace('Ñ','N',$string);
  $string = str_replace('Ý','Y',$string);
  $string = str_replace('ý','y',$string);
  return $string;
}

function substr8($string, $i, $f) {
  return mb_substr($string, $i, $f, 'UTF-8');
}
