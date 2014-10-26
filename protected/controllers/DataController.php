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
            if(isset($_POST['reset'])) {      
                Yii::app()->db->createCommand()->truncateTable(watchlistTemp::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(pelunasan::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(proposal::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(proposalBukuNikah::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(proposalKartuKeluarga::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(proposalKtp::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(tolak::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(voteJawab::model()->tableName());  
                Yii::app()->db->createCommand()->truncateTable(watchlist::model()->tableName());  
                Yii::app()->user->setFlash('success', "Data Telah Di Kosongkan");
            }
            $this->render('reset');
        }
}
