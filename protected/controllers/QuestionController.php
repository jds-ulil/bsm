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
				'actions'=>array( 'pertanyaan', 'create', 'view',
                                        'delete','update'),
				'roles'=>array('admin'),
			),			
			array('allow',  // deny all users
                                'actions'=>array('index','complete','autocompleteVoter', 'report',),
				'roles'=>array('inputter','approval', 'complete',),
			),
			array('allow',  // deny all users
                                'actions'=>array('autocompleteVoter',),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        public function actionAutocompleteVoter() {
            $res =array();
            if (isset($_GET['term'])) {
                $sql = 'SELECT vote.nama_voter AS label
                            FROM vote_jawab vote';
                $sql = $sql . " WHERE vote.nama_voter LIKE :nama group by vote.nama_voter"; // Must be at least 1
                $command =Yii::app()->db->createCommand($sql);
                $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
                echo json_encode ($command->queryAll());
            }
        }
        public function actionUpdate($id) {
            $model_soal = $this->loadModel($id);
            
            //$this->performAjaxValidation($model_soal);
            
            if (isset($_POST['voteSoal'])) {
                $model_soal->attributes = $_POST['voteSoal'];                
                if($model_soal->save()){
                    $this->redirect(array('view','id'=>$model_soal->id_soal));
                }
            }
            
            $this->render('update',array(
                'model_soal' => $model_soal,
            ));

        }
        public function actionDelete($id){
            if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('pertanyaan'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
	public function actionView($id){  
            $this->render('view',array(
			'model_soal'=>$this->loadModel($id),
		));
        }
	public function actionCreate(){
            $model_soal = new voteSoal();
            
            $this->performAjaxValidation($model_soal);
            
            if (isset($_POST['voteSoal'])) {
                $model_soal->attributes = $_POST['voteSoal'];
                $model_soal->group_soal = 1;            
                if($model_soal->save()){
                    $this->redirect(array('view','id'=>$model_soal->id_soal));
                }
            }
            
            $this->render('create',array(
                'model_soal' => $model_soal,
            ));
        }
        public function actionPertanyaan() {        
            $model_soal = new voteSoal('search');
            $model_soal->group_soal = 1;
            
            if(isset($_GET['voteSoal'])){
                $model_soal->attributes=$_GET['voteSoal'];
                }
            
            $this->render('pertanyaan',array(
                'model_soal' => $model_soal,
            ));
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
            $voterNama = $_POST['voter']['nama'];
            $voterJabatan = $_POST['voter']['jabatan'];
            $voterDate = date("Y").'-'.date("m").'-'.date("d");
            $arrJawaban  = $_POST['voteSoal'];            
            foreach ($arrJawaban as $key => $value) {
                $voteJawab = new voteJawab;
                $voteJawab->nama_voter = $voterNama;
                $voteJawab->jabatan_voter = $voterJabatan;
                $voteJawab->tanggal_vote = $voterDate;
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
            'model_soal' => $model_soal,
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
           $model =  voteSoal::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pertanyaan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	} 
}
