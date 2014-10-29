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
                                        'delete','update','logAlert'),
				'roles'=>array('admin'),
			),			
			array('allow',  // deny all users
                                'actions'=>array('index','complete','autocompleteVoter', 'report',
                                            'print'),
				'roles'=>array('inputter','approval', 'complete',),
			),
			array('allow',  // deny all users
                                'actions'=>array('autocompleteVoter','hasil'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        public function actionLogAlert() {
            $id = 1;
            $model = setting::model()->findByPk($id);
            if(isset($_POST['setting'])){
                $model->attributes = $_POST['setting'];
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', "Sukses Update");
                }
            }
            $this->render('LAset', array(
                'model' => $model,
            ));
        }
        
        public function actionPrint(){
            $model_jawab = new voteJawab;           
            if(isset($_POST['voteJawab'])) {                
               // $model_jawab->id_pegawai = $_POST['voteJawab']['id_pegawai'];
                $model_jawab->to_date= $_POST['voteJawab']['to_date'];
                $model_jawab->from_date= $_POST['voteJawab']['from_date'];
                $model_jawab->unit_kerja= $_POST['voteJawab']['unit_kerja'];
            }
            $dataProvider = $model_jawab->search();
            $result = $model_jawab->voteResult($model_jawab->from_date,$model_jawab->to_date,$model_jawab->unit_kerja);   

            $model_soal = new voteSoal;
            $model_soal->group_soal = 1;
            $soal_provider = $model_soal->search();        

            //$totalVote = intval($dataProvider->getTotalItemCount()/$soal_provider->getTotalItemCount());
             $unitKerja=array();
            if(!empty($model_jawab->unit_kerja)) {
                $unitKerja = array($model_jawab->unit_kerja);
            }
            
            
            $arrResult = array();
            $arrSoal = array();
            foreach($soal_provider->getData() as $record) {
                $arrSoal[$record->id_soal] = $record->soal;

                $model_jawab->soal_id = $record->id_soal;
                $model_jawab->jawaban = null;
                $dataSS = $model_jawab->search();
                $totalPerSoal =  $dataSS->getTotalItemCount();                                    

                $arrJwb = explode(',', $record->pilihan_jawaban);            
                foreach ($arrJwb as $key_j => $value_j) {
                     $model_jawab->jawaban = $value_j;
                     $model_jawab->soal_id = $record->id_soal;
                     $data = $model_jawab->search();
                     //$arrResult[$record->id_soal][$model_jawab->jawaban]['total'] = $data->getTotalItemCount();                
                     $totalJwb = $data->getTotalItemCount();   
                     if($totalPerSoal == 0 || $totalJwb == 0){
                         $arrResult[$record->id_soal][$model_jawab->jawaban]['persen'] = 0;                
                     } else {
                     $arrResult[$record->id_soal][$model_jawab->jawaban]['persen'] = intval(($totalJwb/$totalPerSoal)*100);                
                     }
                }            
            }  
                $model_jawab->from_date = empty($model_jawab->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model_jawab->from_date);
                $model_jawab->to_date = empty($model_jawab->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model_jawab->to_date);        
              $this->render('print',array(
                    'model_jawab' => $model_jawab,
                    'arrResult' => $arrResult,
                    'arrSoal' => $arrSoal,  
                    'result' => $result,
                    'unitKerja' => $unitKerja,
                ));
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
        
//        $model_marketing = pegawai::model()->findByPk(Yii::app()->user->id_pegawai); 
//        $arrJwb = array();
//        $marketing_result = voteJawab::model()->findAllBySql(
//                'SELECT jwb.`soal_id`,jwb.`jawaban` FROM vote_jawab jwb WHERE jwb.`id_pegawai` = ?',
//                array($model_marketing->pegawai_id)                
//                );
//        foreach ($marketing_result as $key => $value) {
//                 $arrJwb[$value->soal_id] = $value->jawaban;
//            }        
        if (isset($_POST['voteSoal'])) {
            //voteJawab::model()->deleteAll('id_pegawai = ' . $model_marketing->pegawai_id);
            $voterDate = date("Y").'-'.date("m").'-'.date("d");
            $arrJawaban  = $_POST['voteSoal'];            
            foreach ($arrJawaban as $key => $value) {
                $voteJawab = new voteJawab;                
                $voteJawab->id_pegawai = Yii::app()->user->id_pegawai;
                $voteJawab->tanggal_vote = $voterDate;
                $voteJawab->soal_id = $key;
                $voteJawab->jawaban = $value;
                $voteJawab->save();
            }
            $this->redirect(array('complete'));
        }
        
		$this->render('index',array(	
                    'model_soal' => $model_soal,
//                    'model_marketing' => $model_marketing,
//                    'arrJwb' => $arrJwb,
		));
	}
    public function actionHasil() {
        $model_jawab = new voteJawab;                        
        
        $this->render('hasil',array(
            'model_jawab' => $model_jawab,
        ));
    }
    public function actionReport() {
        $model_jawab = new voteJawab;   
        
        $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');
        
        if(isset($_POST['voteJawab'])) {
           // $model_jawab->id_pegawai = $_POST['voteJawab']['id_pegawai'];
            $model_jawab->to_date= $_POST['voteJawab']['to_date'];
            $model_jawab->from_date= $_POST['voteJawab']['from_date'];
            $model_jawab->unit_kerja= $_POST['voteJawab']['unit_kerja'];
        }
        $dataProvider = $model_jawab->search();
        $result = $model_jawab->voteResult($model_jawab->from_date,$model_jawab->to_date,$model_jawab->unit_kerja);   
        
        $model_soal = new voteSoal;
        $model_soal->group_soal = 1;
        $soal_provider = $model_soal->search();        
        
        //$totalVote = intval($dataProvider->getTotalItemCount()/$soal_provider->getTotalItemCount());
            
        $arrResult = array();
        $arrSoal = array();
        foreach($soal_provider->getData() as $record) {
            $arrSoal[$record->id_soal] = $record->soal;
                        
            $model_jawab->soal_id = $record->id_soal;
            $model_jawab->jawaban = null;
            $dataSS = $model_jawab->search();
            $totalPerSoal =  $dataSS->getTotalItemCount();                                    
            
            $arrJwb = explode(',', $record->pilihan_jawaban);            
            foreach ($arrJwb as $key_j => $value_j) {
                 $model_jawab->jawaban = $value_j;
                 $model_jawab->soal_id = $record->id_soal;
                 $data = $model_jawab->search();
                 //$arrResult[$record->id_soal][$model_jawab->jawaban]['total'] = $data->getTotalItemCount();                
                 $totalJwb = $data->getTotalItemCount();   
                 if($totalPerSoal == 0 || $totalJwb == 0){
                     $arrResult[$record->id_soal][$model_jawab->jawaban]['persen'] = 0;                
                 } else {
                 $arrResult[$record->id_soal][$model_jawab->jawaban]['persen'] = intval(($totalJwb/$totalPerSoal)*100);                
                 }
            }            
        }            
        $this->render('report',array(
            'arrResult' => $arrResult,
            'arrSoal' => $arrSoal,
            'model_soal' => $model_soal,
            'model_jawab' => $model_jawab,
            'listUnit' => $listUnit,
            'result' => $result,
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
