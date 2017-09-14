<?php 
/*
 * Archivo de atajos de Yii
 */

function app() {
  return Yii::app();
}

function user() {
  return Yii::app()->getUser();
}

function db() {
  return Yii::app()->db;
}

function themeUrl() {
  return Yii::app()->theme->baseUrl;
}

function params($param) {
  return Yii::app()->params[$param];
}
