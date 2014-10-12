<?php

class MguserController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(					
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','create','view','update','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex($id){	    
	    $model=new mguser('search');
	    $model->unsetAttributes();  // clear any default values
	    $model->hak_akses = $id;	    
	    $list = CHtml::listData(Jabatan::model()->findAll(), 'nama_jabatan', 'nama_jabatan');  
	    $user = $this->getLabel($model->hak_akses);
	    
	    if(isset($_GET['mguser']))
		    $model->attributes=$_GET['mguser'];
	    $this->render('index',array(
		'model'=>$model,
		'list'=>$list,          
		'mj'=>$user
		));
	}
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$user = $model->hak_akses;
		$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index', 'id'=>$user));
	}
	public function actionCreate($id) {
	    $model=new mguser;
	    $model->setScenario("create");
	    
	    $model->hak_akses = $id;	    
	    $user = $this->getLabel($model->hak_akses);	    
	    $list = CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan');        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	    if(isset($_POST['mguser']))
		{
		$model->attributes=$_POST['mguser'];            
		if($model->save()) {
			$this->redirect(array('view','id'=>$model->user_id));
                } else {
             //   $model->password = $oldpassword;
                }
            
		}
		$this->render('create',array(
			'model'=>$model,
			'list'=>$list,            
		        'mj'=>$user,
		));
	}
	public function actionView($id)
	{
	    $model = $this->loadModel($id);
	    $user = $this->getLabel($model->hak_akses);
		$this->render('view',array(
			'model'=>$model,
			'mj'=>$user,
		));
	}
	public function actionUpdate($id)
	{
	    $model=$this->loadModel($id);
	    $user = $this->getLabel($model->hak_akses);
	    $list = CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan');        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	    if(isset($_POST['mguser']))
		{		
		    $model->attributes=$_POST['mguser'];
		    if($model->save())
			    $this->redirect(array('view','id'=>$model->user_id));
		}
	    $this->render('update',array(
			'model'=>$model,
			'list'=>$list,
			'mj'=>$user,
	    ));
	}

	public function getLabel ($hakAkses) {
	     if ($hakAkses == vC::APP_id_hak_akses_inputter)
		return vC::APP_label_inputer;
	    else if ($hakAkses == vC::APP_id_hak_akses_approval)
		return vC::APP_label_approval;	    	
	    else if ($hakAkses == vC::APP_id_hak_akses_admin)
		return vC::APP_label_admin;	    	
	    else
		return '';
	}
	/**	 
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MtbUser the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=  mguser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MtbUser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mtb-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
