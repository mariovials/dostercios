<?php

class ImagenItemController extends AdminController {

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionVer($id) {
		$this->render('ver',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Crea un nuevo modelo.
	 * Si la creación es exitosa, será redirecionado a la página 'ver'.
	 */
	public function actionAgregar() {
		$model = new ImagenItem;

		if(isset($_POST['ImagenItem'])) {
			$model->attributes = $_POST['ImagenItem'];
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
	public function actionEditar($id) {

		$model = $this->loadModel($id);

		if(isset($_POST['ImagenItem'])) {
			$model->attributes = $_POST['ImagenItem'];
			if($model->save())
				$this->redirect(array('ver','id'=>$model->id));
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
		$dataProvider = new CActiveDataProvider('ImagenItem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdministrar() {
		$model = new ImagenItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ImagenItem']))
			$model->attributes = $_GET['ImagenItem'];

		$this->render('administrar',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ImagenItem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = ImagenItem::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ImagenItem $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if(isset($_POST['ajax']) && $_POST['ajax']==='imagen-item-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}