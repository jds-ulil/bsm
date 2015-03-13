<?php
/**
 * Description of DailyController
 *
 * @author oelhil@gmail.com
 * 20150701 - 
 * class controller untuk fasilitas daily activity
 */
class DailysecController extends Controller{
    //put your code here
    public $layout='//layouts/column2';
    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
        // semua dapat mengakses halaman input
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'create', 'view', 'update', 'delete',
                    ),
				'roles'=>array('approval'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('',
                    ),
				'users'=>array('@'),
			),			
            // deny for unidentified page and user
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    /**
     * diakses ketika pertama mau input lap daily activity
     * 
     */
    public function actionIndex () {  
        $model=new dailySecurityJenisNasabah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['dailySecurityJenisNasabah']))
			$model->attributes=$_GET['dailySecurityJenisNasabah'];

		$this->render('index',array(
			'model'=>$model,
		));
    }   
    
    public function actionCreate()
	{
		$model=new dailySecurityJenisNasabah;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['dailySecurityJenisNasabah']))
		{
			$model->attributes=$_POST['dailySecurityJenisNasabah'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->jenis_nasabah_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
    
    public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    
    public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['dailySecurityJenisNasabah']))
		{
			$model->attributes=$_POST['dailySecurityJenisNasabah'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->jenis_nasabah_id));
		}

		$this->render('update',array(
			'model'=>$model,
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
    
    
    public function loadModel($id)
	{
		$model= dailySecurityJenisNasabah::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    
}


