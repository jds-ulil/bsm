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
				'actions'=>array('report'),
				'roles'=>array('admin'),
			),			
			array('allow',  // deny all users
                'actions'=>array('index','complete'),
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
        $model_soal = array(new voteSoal); 
        $model_soal = voteSoal::model()->findAllBySql(
                'SELECT * FROM vote_soal WHERE group_soal = ? ORDER BY rank ASC',
                array(1)
                );            
        
        if (isset($_POST['voteSoal'])) {
            $arrJawaban  = $_POST['voteSoal'];
            foreach ($arrJawaban as $key => $value) {
                $voteJawab = new voteJawab;
                $voteJawab->soal_id = $key;
                $voteJawab->jawaban = $value;
                $voteJawab->save();
            }
            $this->redirect(array('complete'));
        }
        
		$this->render('index',array(	
            'model_soal' => $model_soal,
		));
	}
    
    public function actionReport() {
        $model_jawab = new voteJawab;        
        $dataProvider = $model_jawab->search();
        
        
        $model_soal = new voteSoal;
        $model_soal->group_soal = 1;
        $soal_provider = $model_soal->search();        
        
        $totalVote = intval($dataProvider->getTotalItemCount()/$soal_provider->getTotalItemCount());
            
        $arrResult = array();
        $arrSoal = array();
        foreach($soal_provider->getData() as $record) {
            $arrSoal[$record->id_soal] = $record->soal;
            $arrJwb = explode(',', $record->pilihan_jawaban);
            foreach ($arrJwb as $key_j => $value_j) {
                 $model_jawab->jawaban = $value_j;
                 $model_jawab->soal_id = $record->id_soal;
                 $data = $model_jawab->search();
                 $arrResult[$record->id_soal][$model_jawab->jawaban]['total'] = $data->getTotalItemCount();
            }            
        }

        $this->render('report',array(
            'arrResult' => $arrResult,
            'arrSoal' => $arrSoal,
        ));
    }

    public function actionComplete()
	{               
		$this->render('complete',array(	
            
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
