<?php

class PelunasanController extends Controller
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
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('approval', 'proses', 'toapprove', 'tocancel', 'completeApp'),				
                                'roles'=>array('approval','admin'),
			),			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','complete'),				
                                'roles'=>array('inputter'),
			),			
                        array('allow',
                                'actions'=>array('autocompleteNasabah','report','detail','print'),
                                'users'=>array('@'),
                        ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */        
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new pelunasan;                
                $model->penyebab = 'Write Off';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
                $listSegmen = CHtml::listData(Segmen::model()->findAll(),'segmen_id','nama');
                $listKolektibilitas = CHtml::listData(Kolektabilitas::model()->findAll(),'kolektabilitas_id','nama');
                $listPembiayaan = CHtml::listData(jenisPembiayaan::model()->findAll(),'pembiayaan_id','nama');
                $listSebab = CHtml::listData(pelunasanSebab::model()->findAll(),'nama','nama');
                $listSebabCheck = CHtml::listData(pelunasanSebab::model()->findAll(),'nama','nama');      
                                
		if(isset($_POST['pelunasan']))
		{
			$model->attributes=$_POST['pelunasan'];
                        if($model->tempLL != '') {
                            $model->penyebab = $model->tempLL;
                        } else {
                            if ($model->penyebab == 'Lain-lain'){
                            $model->penyebab = '';
                            }
                        }                              
                
            if(!empty(Yii::app()->user->id_pegawai)) {
                $model->marketing = Yii::app()->user->id_pegawai;       
            }                
            
			if($model->save()){                                                        
                            $this->redirect(array('complete'));
                        } else {                                                                                     
                            if(!in_array($model->penyebab, $listSebabCheck)) {
                            $model->penyebab = 'Lain-lain';                        
                            };
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'listSegmen' => $listSegmen,
                        'listKolektibilitas' => $listKolektibilitas,
                       'listPembiayaan' => $listPembiayaan,
                        'listSebab' => $listSebab,
		));
	}

        public function actionComplete(){
            $this->render('complete',array(     
                ));
        }
        
        public function actionApproval(){
            $model_pelunasan = new pelunasan('search');
            $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');                         
            
            if(isset($_GET['pelunasan']))
                $model_pelunasan->attributes=$_GET['pelunasan'];
                        
            $this->render('approval',array(
                'model_pelunasan' => $model_pelunasan,
                'listUnit' => $listUnit,
            ));            
        }
        
        public function actionPrint(){
            $data = array();
            $index = 0;
            $unitKerja = array();

            $model_pelunasan = new pelunasan('search');
            $model_pelunasan->unsetAttributes();
            if(isset($_POST['pelunasan'])){            
                $model_pelunasan->attributes = $_POST['pelunasan'];
                $model_pelunasan->status_pelunasan = vC::APP_status_pelunasan_approv;
                $dataProv = $model_pelunasan->search_print(); 
            
            
                foreach($dataProv->getData() as $record) {
                    $index++;                
                    $data[]=array(  'index'=>$index,
                                    'tanggal_pelunasan'=>Yii::app()->numberFormatter->formatDate($record->tanggal_pelunasan),
                                    'no_rekening'=>Yii::app()->numberFormatter->formatDate($record->no_rekening),
                                    'penyebab'=>$record->penyebab, 
                                    'nama_nasabah'=>$record->nama_nasabah,                 
                            );
                }
            }
            
            if(!empty($model_pelunasan->unit_kerja)) {
            $unitKerja = array($model_pelunasan->unit_kerja);
            }
            
            $model_pelunasan->no_rekening = empty($model_pelunasan->no_rekening)?' - ':$model_pelunasan->no_rekening;
            $model_pelunasan->nama_nasabah = empty($model_pelunasan->nama_nasabah)?' - ':$model_pelunasan->nama_nasabah;
            $model_pelunasan->from_date = empty($model_pelunasan->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model_pelunasan->from_date);
            $model_pelunasan->to_date = empty($model_pelunasan->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model_pelunasan->to_date);        
            
            $this->render('print',array(
                'model_pelunasan' => $model_pelunasan,
                'data' => $data,
                'unitKerja' => $unitKerja,
            ));
        }
        
        public function actionProses($id){
            $model_pelunasan = $this->loadModel($id);
            
            $this->render('proses_approval', array(
                'model_pelunasan' => $model_pelunasan,
            ));
        }
        public function actionTocancel($id) {
            $model_pelunasan = $this->loadModel($id);            
            if($model_pelunasan->delete()){                
                $this->redirect(array('pelunasan/completeApp'));
            }
        }
        public function actionToapprove($id) {
            $model_pelunasan = $this->loadModel($id);            
            $model_pelunasan->status_pelunasan = vC::APP_status_pelunasan_approv;
            if($model_pelunasan->save()){                
                $this->redirect(array('pelunasan/completeApp'));
            }
        }
        public function actionCompleteApp(){
            $this->render('complete_approval');
        }
        public function actionReport() {
            $model_pelunasan = new pelunasan('search');
            $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');                         
            
            if(isset($_GET['pelunasan']))
                $model_pelunasan->attributes=$_GET['pelunasan'];
            
            $model_pelunasan->status_pelunasan = vC::APP_status_pelunasan_approv;
            $this->render('report',array(
                'model_pelunasan'=>$model_pelunasan,
                'listUnit' => $listUnit,
            ));
        }
        
        public function actionDetail($id){
            $model_pelunasan = $this->loadModel($id);
            $this->render('detail',array(
                'model_pelunasan' => $model_pelunasan,
            ));            
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['pelunasan']))
		{
			$model->attributes=$_POST['pelunasan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pelunasan_id));
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('pelunasan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new pelunasan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['pelunasan']))
			$model->attributes=$_GET['pelunasan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=pelunasan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pelunasan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionAutocompleteNasabah() {
            $res =array();
            $status = $_GET['status'];
        if (isset($_GET['term'])) {
            $sql = 'SELECT pel.nama_nasabah AS label
                        FROM pelunasan pel';
            $sql = $sql . " WHERE pel.`nama_nasabah` LIKE :nama AND pel.status_pelunasan = '".$status."' group by pel.nama_nasabah"; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
    }
}
