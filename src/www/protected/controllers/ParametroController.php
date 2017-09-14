<?php

class ParametroController extends AdminController {

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
  public function actionVer($id) {
    $this->render('ver',array(
      'model'=>$this->loadModel($id),
    ));
  }
  public function actionDetalles($id) {
        $this->redirect(array('/parametro/ver','id'=>$id));  }

	/**
	 * Crea un nuevo modelo.
	 * Si la creación es exitosa, será redirecionado a la página 'ver'.
	 */
	public function actionAgregar() {
		$model = new Parametro;

		if(isset($_POST['Parametro'])) {
			$model->attributes = $_POST['Parametro'];
			if($model->save())
				$this->redirect(array('ver','id'=>$model->id));
		}

		$this->render('agregar',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If editar is successful, the browser will be redirected to the 'ver' page.
	 * @param integer $id the ID of the model to be editard
	 */
	public function actionEditar($id, $rurl=null) {

		$model = $this->loadModel($id);

		if(isset($_POST['Parametro'])) {
			$model->attributes = $_POST['Parametro'];
			if($model->save()) {
				if ($rurl)
					$this->redirect($rurl);
				else
					$this->redirect(array('ver','id'=>$model->id));
			}
		}

		$this->render('editar',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'administrar' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionEliminar($id) {

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Parametro');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdministrar() {
		$model = new Parametro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Parametro']))
			$model->attributes = $_GET['Parametro'];

		$this->render('administrar',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Parametro the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Parametro::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Parametro $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if(isset($_POST['ajax']) && $_POST['ajax']==='parametro-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
