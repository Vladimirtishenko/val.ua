<?php

class PoolsController extends AdminController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pools;
        $answers = new Answers();

		if(isset($_POST['Pools']))
		{
			$model->attributes=$_POST['Pools'];

			if($model->save())
            {
                if(isset($_POST['Answers_name']))
                {
                    foreach($_POST['Answers_name'] as $answer)
                    {
                        $variant = new Answers();
                        $variant->name = $answer;
                        $variant->pool_id = $model->id;
                        $variant->save();
                    }
                    Yii::app()->user->setFlash('success', Yii::t('main', 'Данные успешно сохранены!'));
                    $this->redirect(array('update','id'=>$model->id));
                }
            }
            else
            {
                Yii::app()->user->setFlash('error', Yii::t('main', 'Ошибка!'));
            }
		}

		$this->render('create',array(
            'answers'=>$answers,
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pools']))
		{
			$model->attributes=$_POST['Pools'];
			if($model->save())
            {
                Yii::app()->user->setFlash('success', Yii::t('main', 'Данные успешно сохранены!'));
            }
            else
            {
                Yii::app()->user->setFlash('error', Yii::t('main', 'Ошибка!'));
            }
            $this->refresh();
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via index grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
        $model=new Pools('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Pools']))
            $model->attributes=$_GET['Pools'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pools the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pools::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pools $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pools-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
