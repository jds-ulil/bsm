<?php

class WatchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('input'),
				'roles'=>array('inputter'),
			),				
			array('allow',  // deny all users
                'actions'=>array(''),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
    public function actionInput(){
        $model = new watch;
        
        if(isset($_POST['watch']))
            {    
              $model->attributes=$_POST['watch'];
            
              $filelist= CUploadedFile::getInstance($model,'w_file');
              $arrData = array();
              if($model->validate()){                 
                   $fp = fopen($filelist->tempName, 'r');
                    if($fp)
                    {
                        //  $line = fgetcsv($fp, 1000, ",");
                        //  print_r($line); exit;
                        $first_time = true;
                     do {
                        if ($first_time == true) {
                            $first_time = false;
                            continue;
                        }
                        $arrData[] = $line;                        

                        }while( ($line = fgetcsv($fp, 1000, ";")) != FALSE);
                       // $this->redirect('././index');

                    }}   
              
              print_r($arrData);
              return;
            }  
            $this->render('input',array(
                'model'=>$model,
                ));
    }
}