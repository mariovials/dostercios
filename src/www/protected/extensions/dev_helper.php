<?php
/**
 * Funciones para desarrollo
 * @author Mario Vial <mariovials@gmail.com> 2015-07-02 11:22
 */

/**
 * print_r
 * @param mixed $v la variable
 * @author Mario Vial <mariovials@gmail.com> 2015-07-02 11:24
 */
function P($v) {
  echo '<pre>';
  print_r($v);
  echo '</pre>';
}

/**
 * var_dump
 * @param mixed $v la variable
 * @author Mario Vial <mariovials@gmail.com> 2015-07-02 11:24
 */
function D($v) {
  echo '<pre>';
  var_dump($v);
  echo '</pre>';
}
