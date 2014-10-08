<?php

class QuestionController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				//'actions'=>array('index','view','create','update','delete'),
				//'roles'=>array('admin','approval'),
			),			
			array('allow',  // deny all users
                'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{        
//        $model_vote = new votes;
//        $pertanyaan = votesSoal::model()->search();        
//        
//        foreach($pertanyaan->getData() as $record) {
//              print_r($record);
//            }
//        
//        if(!Yii::app()->user->isGuest) {
//            $id = Yii::app()->user->id;
//            $model_user = mguser::model()->findByPk($id);
//            
//            $loadVote = votes::model()->find($model_user->user_id);
//            $model_vote = empty($loadVote)?$model_vote:$loadVote;
//            if(empty($loadVote)) {
//                $model_vote->nama_voter = $model_user->user_name;
//            }            
//        }       
		$this->render('index',array(	
//            'model_vote' => $model_vote, 
		));
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{		
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
//		if(isset($_POST['ajax']) && $_POST['ajax']==='unitkerja-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}
	}
}
