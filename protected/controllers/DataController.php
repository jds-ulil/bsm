<?php

class DataController extends Controller
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
				'actions'=>array('reset'),
				'roles'=>array('admin'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionReset() {
            $change = false;
            $model = new data;
            if(isset($_POST['data'])) {    
                $model->attributes = $_POST['data'];
                if($model->proposal == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(proposal::model()->tableName());
                    Yii::app()->db->createCommand()->truncateTable(proposalBukuNikah::model()->tableName());
                    Yii::app()->db->createCommand()->truncateTable(proposalKartuKeluarga::model()->tableName());
                    Yii::app()->db->createCommand()->truncateTable(proposalKtp::model()->tableName()); 
                    Yii::app()->db->createCommand()->truncateTable(tolak::model()->tableName());  
                }             
                if($model->pelunasan == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(pelunasan::model()->tableName());  
                }
                if($model->watchlist == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(watchlistTemp::model()->tableName()); 
                    Yii::app()->db->createCommand()->truncateTable(watchlist::model()->tableName());  
                }
                if($model->kuisioner == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(voteJawab::model()->tableName());  
                }
                if ($change) {
                     Yii::app()->user->setFlash('success', "Data Telah Di Kosongkan");
                }
            }
            $this->render('reset',array(
                'model' => $model,
            ));
        }
}
