<?php

class GambarController extends Controller
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
				'actions'=>array('index', 'upload'),
				'roles'=>array('admin', 'inputter'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}          

        public function actionIndex () {               
            $this->render('index', array( 
            ));
        }
        public function actionUpload () {
            Yii::import("application.extensions.EAjaxUpload.qqFileUploader");
            $folder=Yii::app() -> getBasePath() . "/../images/";// folder for uploaded files
            $allowedExtensions = array("png");//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder,'true');

            $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
            $fileName=$result['filename'];//GETTING FILE NAME
            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);

            echo $result;// it's array
        }
}
