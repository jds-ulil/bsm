<?php

class AdmController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
    
    public function init() {
        parent::init();
    }    
    
    
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('inputter', 'increate', 'inedit', 'indelete', 'inview'),
				'roles'=>array('admin','approval'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionInputter()
	{        
        $model = new User('Search');
		$this->render('inputter',array(		
            
		));
	}        
	public function actionIncreate()
	{        
		$this->render('increate',array(			
		));
	}
	public function actionInedit()
	{        
		$this->render('inedit',array(			
		));
	}
	public function actionIndelete()
	{        
		$this->render('indelete',array(			
		));
	}
	public function actionInview()
	{        
		$this->render('inview',array(			
		));
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=DaftarNasabah::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='daftar-nasabah-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
