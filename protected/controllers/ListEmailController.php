<?php

class ListEmailController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('sendmail'),
				'roles'=>array('inputter','approval','admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','index','create','update','sendmail', 'delete'),
				'roles'=>array('approval','admin'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    
    public function actionSendmail(){
        $message            = new YiiMailMessage();
           //this points to the file test.php inside the view path
        $message->view = 'otor';        
        $message->subject    = 'My TestSubject';
        $param = array ('nama'=>'tes');
        $message->setBody($param, 'text/html');                
        $message->addTo('mingslab@gmail.com');
        $message->from = 'oelhil@gmail.com';   
        Yii::app()->mail->send($message);   
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
		$model=new ListEmail;
                $model->scenario = 'create';                
                $list = CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan');
                $listNotif = CHtml::listData(EmailNotif::model()->findAll(), 'email_notif_id', 'nama');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                if(isset($_POST['ajax']) && $_POST['ajax']==='list-email-form')
                {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
		if(isset($_POST['ListEmail']))
		{
			$model->attributes=$_POST['ListEmail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_list_email));
		}

		$this->render('create',array(
			'model'=>$model,
            'list'=>$list,
            'listNotif'=>$listNotif,
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
                $list = CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan');
                $listNotif = CHtml::listData(EmailNotif::model()->findAll(), 'email_notif_id', 'nama');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ListEmail']))
		{
			$model->attributes=$_POST['ListEmail'];
			if($model->save())				
				$this->redirect(array('view','id'=>$model->id_list_email));
		}

		$this->render('update',array(
			'model'=>$model,
            'list'=>$list,
            'listNotif'=>$listNotif,
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
//		$dataProvider=new CActiveDataProvider('ListEmail');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));        
        $model=new ListEmail('search');
        $list = CHtml::listData(Jabatan::model()->findAll(), 'nama_jabatan', 'nama_jabatan');
        $listNotif = CHtml::listData(EmailNotif::model()->findAll(), 'nama', 'nama');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ListEmail']))
			$model->attributes=$_GET['ListEmail'];

		$this->render('admin',array(
			'model'=>$model,
            'list'=>$list,
            'listNotif'=>$listNotif,
		));
        
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ListEmail('search');
        $list = CHtml::listData(Jabatan::model()->findAll(), 'nama_jabatan', 'nama_jabatan');
        $listNotif = CHtml::listData(EmailNotif::model()->findAll(), 'nama', 'nama');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ListEmail']))
			$model->attributes=$_GET['ListEmail'];

		$this->render('admin',array(
			'model'=>$model,
            'list'=>$list,
            'listNotif'=>$listNotif,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ListEmail::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='list-email-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
