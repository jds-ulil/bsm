<?php

class DaftarNasabahController extends Controller
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
        Yii::app()->attachEventHandler('onError',array($this,'handleError'));
    }
    
    
    public function handleError(CEvent $event)
    {            
    if($event instanceof CErrorEvent)
      {       
        $this->redirect(array('Error'));
      }
      $event->handled = TRUE;
    }
    
    
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','apply', 'error'),
				'roles'=>array('admin','otor','inputer'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','otor'),
				'roles'=>array('admin','otor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('otor','admin'),
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
	public function actionError()
	{        
    $this->render('error',array(			
		));    
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionApply($id)
	{        
        $model=$this->loadModel($id);
        
        $listEmail = ListEmail::model()->findAll($condition = ' status = 1 OR status =4 ');
        $message = new YiiMailMessage();
        $message->view = 'input';        
        $message->subject    = 'Input Data Nasabah';
        
        foreach ($listEmail as $key => $data) {                    
             $message->addTo($data->email_address);       
        }
            $param = array ('nasabah'=>$model,'inputer'=>Yii::app()->user->name);
            $message->setBody($param, 'text/html');                
            $message->from = 'oelhil@gmail.com';   
            
        try
        {            
            Yii::app()->mail->send($message);                
            $model->status = 4;
            $model->save();
            $this->redirect(array('view','id'=>$model->nasabah_id));
        }
        catch (Exception $exc)
        {
             $this->render('error',array(			
            ));
        }             
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionOtor()
	{
        $model=new DaftarNasabah('searchOtor');
		$this->render('otor',array(
			'model'=>$model,
		));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DaftarNasabah;
        $list = CHtml::listData(StatusNasabah::model()->findAll(), 'id_status', 'nama_status');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
               
		if(isset($_POST['DaftarNasabah']))
		{
			$model->attributes=$_POST['DaftarNasabah'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->nasabah_id));
		}

		$this->render('create',array(
			'model'=>$model,
            'list'=>$list,
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
        $list = CHtml::listData(StatusNasabah::model()->findAll(), 'id_status', 'nama_status');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DaftarNasabah']))
		{
			$model->attributes=$_POST['DaftarNasabah'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->nasabah_id));
		}

		$this->render('update',array(
			'model'=>$model,
            'list'=>$list,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new DaftarNasabah('search');
        $list = CHtml::listData(StatusNasabah::model()->findAll(), 'nama_status', 'nama_status');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DaftarNasabah']))
			$model->attributes=$_GET['DaftarNasabah'];

		$this->render('index',array(
			'model'=>$model,
            'list'=>$list,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DaftarNasabah('search');
        $list = CHtml::listData(StatusNasabah::model()->findAll(), 'nama_status', 'nama_status');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DaftarNasabah']))
			$model->attributes=$_GET['DaftarNasabah'];

		$this->render('admin',array(
			'model'=>$model,
            'list'=>$list,
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
