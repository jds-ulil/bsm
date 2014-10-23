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
        
        $model = new watchlist();
        
        if(isset($_POST['watchlist']))
            {    
              $model->attributes=$_POST['watchlist'];
            
              $filelist= CUploadedFile::getInstance($model,'w_file');
              $arrData = array();
              $index = 0;
              if($model->validate()){                 
                    Yii::app()->db->createCommand()->truncateTable(watchlistTemp::model()->tableName());                   
                    $fp = fopen($filelist->tempName, 'r');
                    if($fp)
                    {
                        //  $line = fgetcsv($fp, 1000, ",");
                        //  print_r($line); exit;
                        
                     do {
                        if ($index < vc::APP_header_csv_row) {                        
                            $index++;
                            continue;
                        } else {
                            $index++;
                        }   
                        $arrLine = explode('\",\"',$line[0]);
//                        $model_temp = new watchlistTemp();
//                        //remove pd on loan
//                        $model_temp->no_loan = substr($arrLine[0], 2);                        
//                        $model_temp->nama_nasabah = $arrLine[1];
//                        $model_temp->total_tunggakan = $arrLine[4];
//                        $model_temp->kolektibilitas = $arrLine[5];
//                        $model_temp->jenis_produk = $arrLine[6];
//                        $model_temp->save();
                        $arrData[] = $arrLine;                                                
                        }while( ($line = fgetcsv($fp, 1000, ";")) != FALSE);
                       // $this->redirect('././index');
                    fclose($fp);
                    }}    
print_r($arrData);
                    return;
            }  
            $this->render('input',array(
                'model'=>$model,                
                ));
    }
}