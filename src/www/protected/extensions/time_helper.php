<?php
/**
 * Helpers para manejo de fechas
 * @deprecated
 * @author Mario Vial <mariovials@gmail.com> 2015-07-02 11:15
 */

/**
 * Convierte una fecha en formato EUROPEO a formato ISO
 * @return string fecha en formato ISO yyyy-mm-dd
 */
function fiso($fecha=null) {
  if($fecha) {
    list($d, $m, $y) = explode('/', $fecha);
    if(strlen($y) > 4) {
      list($y, $h) = explode(' ', $y);
      return "$y-$m-$d $h";
    } else {
      return "$y-$m-$d";
    }
  }
  else return null;
}

/**
 * Convierte una fecha en formato ISO a formato EUROPEO
 * @return string fecha en formato europeo dd/mm/yyyy
 */
function feur($fecha=null) {
  if($fecha) {
    list($y, $m, $d) = explode('-', $fecha);
    if(strlen($d) > 2) {
      list($d, $h) = explode(' ', $d);
      return "$d/$m/$y $h";
    } else {
      return "$d/$m/$y";
    }
  }
  else return null;
}

/**
 * @return las horas de diferencia entre 2 horas
 */
function hdiff($hini, $hfin, $abs=false) {

  if($abs & $hini > $hfin)
    return date('H:i', strtotime('00:00') - (
      strtotime($hfin) - strtotime($hini)
    ));
  else
    return date('H:i', strtotime('00:00') + (
      strtotime($hfin) - strtotime($hini)
    ));
}

/**
 * @todo hacer algo parecido a lo que hace php con la funcion date
 * devuelve la fecha en el formato indicado
 * @param $date formato EUR dd/mm/yyy
 */
function fecha($date, $tipo=null) {

  if(!$date) return '';
  list($d, $m, $a) = explode('/', $date);
  if(strlen($a)>4) list($a, $h) = explode(' ', $a);

  $dias = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
  $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

  switch($tipo) {

    case('corta'):
      // 9 ago 2012
      $fecha =
        $d.' '
        .substr($meses[$m-1], 0, 3).' '
        .$a;
    break;

    case('edad'):

      $a = strtotime(fiso($date));
      $p = time();
      $D = $p - $a;

      $s=$D; $m=$s/60; $h=$m/60; $d=$h/24; $M=$d/30.436875; $y=$M/12;

      $s=floor($s); $m=floor($m); $h=floor($h); $d=floor($d); $M=floor($M); $y=floor($y);

      $f = ''; //almancena el resultado

           if($y>0)  { $f = "$y año".($y>1?'s':'');     }
      else if($M>0)  { $f = "$M mes".($M>1?'s':'');     }
      else if($d==1) { $f = 'ayer'; $pre = '';          }
      else if($d>1)  { $f = "$d días";                  }
      else if($h>0)  { $f = "$h hora".($h>1?'s':'');    }
      else if($m>0)  { $f = "$m minuto".($m>1?'s':'');  }
      else if($s>0)  { $f = "$s segundo".($s>1?'s':''); }
      else           { $f = 'unos segundos';       }

      $fecha = $f;
    break;

    case('hace'):

      $a = strtotime(fiso($date));
      $p = time();
      $D = $p - $a;

      $s=$D; $m=$s/60; $h=$m/60; $d=$h/24; $M=$d/30.436875; $y=$M/12;

      $s=floor($s); $m=floor($m); $h=floor($h); $d=floor($d); $M=floor($M); $y=floor($y);

      $pre = 'hace '; //prefijo 'hace...'
      $f = ''; //almancena el resultado

           if($y>0)  { $f = "$y año".($y>1?'s':'');     }
      else if($M>0)  { $f = "$M mes".($M>1?'s':'');     }
      else if($d==1) { $f = 'ayer'; $pre = '';          }
      else if($d>1)  { $f = "$d días";                  }
      else if($h>0)  { $f = "$h hora".($h>1?'s':'');    }
      else if($m>0)  { $f = "$m minuto".($m>1?'s':'');  }
      else if($s>0)  { $f = "$s segundo".($s>1?'s':''); }
      else           { $f = 'unos segundos';       }

      $fecha = $pre.$f;
    break;

    case('larga'):
      // sábado 6 de octubre del 2012, 15:23 hrs.
      $time = strtotime(fiso($date));
      $fecha =
        $dias[date('w', $time)].' '. // sábado
        $d.' de '.                   // 6 de
        $meses[$m-1].' de '.         // octubre de
        $a.', a las '.               // 2012, a las
        substr($h, 0, 5);            // 15:23 hrs.
    break;

    default:
      // 9 de agosto del 2012
      $fecha = $d.' de '.$meses[intval($m)-1].' de '.$a;
    break;
  }
  return $fecha;
}
