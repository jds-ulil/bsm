<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NaspomaController
 *
 * @author Windows 7
 */
class NaspomaController extends Controller{
    //put your code here
    public $layout='//layouts/main';
    
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}       
    
     public function init() {
        parent::init();
        //Yii::app()->attachEventHandler('onError',array($this,'handleError'));
    }
    
    public function accessRules()
	{
		return array(  
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','complete'),
				'roles'=>array('inputter',),
                    ),           
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('admin','approval'),
                    ),           
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('getRowForm', 'report', 'autocompleteNasabah', 'print', 'detail'),
				'users'=>array('@'),
                    ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	} 
    
     public function actions() {
        return array(
            'getRowForm' => array(
                'class' => 'ext.dynamictabularform.actions.GetRowForm',
                'view' => '_form_kk',
                'modelClass' => 'naspomaKartuKeluarga'
            ),
        );
    }   
    
    public function actionCreate () {
        $model = new naspoma('create');
        
        //init model kartu keluarga
        $model_kartu_keluarga = array (new naspomaKartuKeluarga);    
        
        // check marketing id        
        $model->marketing = Yii::app()->user->id_pegawai;
           
        // init error for mixing with data kartu keluarga
        $error = false;
        
        if(isset($_POST['naspomaKartuKeluarga'])){
            $model_kartu_keluarga = array();
             foreach ($_POST['naspomaKartuKeluarga'] as $key => $value) {                                                                          
                        $model_kartu_keluargaEach = new naspomaKartuKeluarga('batchSave');
                        $model_kartu_keluargaEach->attributes = $value;                    
                        $model_kartu_keluarga[] = $model_kartu_keluargaEach;    
                    }            
            $valid = true;     
            foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {                  
                if(!$model_kartu_keluargaEach->validate() && $key != 0) {
                    $error = true;
                };                 
            }                  
        } 
        
        // before save do validation checking ajax
        $this->performAjaxValidation($model, $model_kartu_keluarga);
        
        if(isset($_POST['naspoma']))
		{                       
            $model->attributes=$_POST['naspoma'];
            
            if ($model->validate() && !$error) 
            {                         
                foreach ($model_kartu_keluarga as $model_kartu_keluargaEach) {                         
                            $model_kartu_keluargaEach->no_kartu_keluarga = $model->no_kartu_keluarga;
                        }
                        
                if ($model->save())
                {                    
                    foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) 
                        {                      
                            $model_kartu_keluargaEach->naspoma_id = $model->id;
                            if(!empty($model_kartu_keluargaEach->nama)||!empty($model_kartu_keluargaEach->no_ktp)
                                        ||!empty($model_kartu_keluargaEach->tanggal_lahir))
                                $model_kartu_keluargaEach->save();
                        }
                }
            $this->redirect(array('complete'));                 
            }
        }
                        
        
        // list dari tabel segmen
        $listSegmen = CHtml::listData(Segmen::model()->findAll(),'segmen_id','nama');
        // list dari tabel pembiayaan        
        $listPembiayaan = CHtml::listData(jenisPembiayaan::model()->findAll(),'pembiayaan_id','nama');
        // list dari tabel kolektibilitas
        $listKolektibilitas = CHtml::listData(Kolektabilitas::model()->findAll(),'kolektabilitas_id','nama');
        // list dari tabel jenis identitas
        $listJenisIdentitas = CHtml::listData(jenisIdentitas::model()->findAll(),'identitas_id','nama');
        // list dari tabel agama
        $listAgama = CHtml::listData(agama::model()->findAll(),'agama_id','nama');
        
        $this->render('create', array(
            'model' => $model,
            'listSegmen' => $listSegmen,
            'listPembiayaan' => $listPembiayaan,
            'listKolektibilitas' => $listKolektibilitas,
            'listJenisIdentitas' => $listJenisIdentitas,
            'listAgama' => $listAgama,
            'model_kartu_keluarga' => $model_kartu_keluarga,
                ));
    }
    // end action create
    
    
    /**
     * function for delete row from
     *                              : naspoma
     *                              : naspoma kartu keluarga
     * @param type $id naspoma
     */
     public function actionDelete($id){        
         $model = $this->loadModel($id);
          if($model->delete())
          {
            Yii::app()->db->createCommand('delete from naspoma_kartu_keluarga where naspoma_id='.$id)->query();
          }
    } //end actionDelete function
    
    
    /**
     * function display detail naspoma data
     * model connect :
     *                  naspoma
     *                  naspomaKartuKeluarga
     * @param type $id naspoma
     */
    public function actionDetail ($id) 
    {
        $model = $this->loadModel($id);
        
        $model_kartu_keluarga = array(new proposalKartuKeluarga);
        
        if (!empty($model)) {
               $model_kartu_keluarga = naspomaKartuKeluarga::model()->findAllByAttributes(array(
                    'naspoma_id'=>$model->id,                    
            ));                        
        }
        
        $this->render('detail',array(
            'model' => $model,            
            'model_kartu_keluarga' => $model_kartu_keluarga,
        ));
    }
    
    
    // function for REPORT 
    public function actionReport()
    {
        $model = new naspoma('search');        
        $model->unsetAttributes();  // clear any default values     
        
        // list for search criteria based on unit
        $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');
        // list dari tabel segmen
        $listSegmen = CHtml::listData(Segmen::model()->findAll(),'segmen_id','nama');
        // list dari tabel pembiayaan        
        $listPembiayaan = CHtml::listData(jenisPembiayaan::model()->findAll(),'pembiayaan_id','nama');
        // list dari tabel kolektibilitas
        $listKolektibilitas = CHtml::listData(Kolektabilitas::model()->findAll(),'kolektabilitas_id','nama');
        
        
        // search with AJAX method
        if(isset($_GET['naspoma']))
        {
            $model->attributes=$_GET['naspoma'];
        }
        
        $this->render('report',array(
            'model'=>$model,
            
            //search needed
            'listUnit' => $listUnit,
            'listSegmen' => $listSegmen,
            'listPembiayaan' => $listPembiayaan,
            'listKolektibilitas' => $listKolektibilitas,
        ));
        
    }//end action report  
    
    
    // function for PRINT
    public function actionPrint ()
    {
        $data = array();
        $index = 0;
        
        // init model
        $model = new naspoma('search');
        $model->unsetAttributes();
        
        // when button print clicked
        if(isset($_POST['naspoma'])){
            // set value
            $model->attributes = $_POST['naspoma'];
            // get search functiion
            $dataProv = $model->search_print(); 
            
            // set value to printed data[]
            foreach($dataProv->getData() as $record) {                
                $index++;
                $data[] =array(
                            'index' => $index,
                            'nama' => $record->nama,
                            'no_rekening' => $record->no_rekening,
                            'jenis_pembiayaan' => $record->rJen->nama,
                            'marketing' => $record->rMar->nama,
                    );
            }            
        }//end post

        // var in search value
        $unitKerja = array();
        if(!empty($model->unit_kerja)) {
            $unitKerja = array($model->unit_kerja);
        } 
        
        $model->nama = empty($model->nama)?'Tidak ditentukan':$model->nama;        
        $model->segmen = empty($model->segmen)?'Tidak ditentukan':$model->rSeg->nama;        
        $model->jenis_pembiayaan = empty($model->jenis_pembiayaan)?'Tidak ditentukan':$model->rJen->nama;        
        $model->jenis_usaha = empty($model->jenis_usaha)?'Tidak ditentukan':$model->jenis_usaha;        
        $model->kolektibilitas_terakhir = empty($model->kolektibilitas_terakhir)?'Tidak ditentukan':$model->kolektibilitas_terakhir;        
        
        
        // tadaaaa finally render
         $this->render('print',array(
            'model' => $model,
            'data' => $data,           
            'unitKerja' => $unitKerja,
        ));
        
    } //end action print    
    
    
   /**
     * Autocomplete name nasabah already registered in Nasabah Potensi Masalah
     */
    public function actionAutocompleteNasabah() 
    {               
        if (isset($_GET['term'])) {
            $sql = 'SELECT nas.nama AS label FROM naspoma nas
                    WHERE nas.`nama` LIKE :nama group by nas.nama'; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
    }
    
    public function actionComplete(){
        $this->render('complete',array(	
        ));
    }
    protected function performAjaxValidation($model, $model_kartu_keluarga)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='naspoma-form')
		{
			echo CActiveForm::validate(array($model, $model_kartu_keluarga));
			Yii::app()->end();
		}
	} 
    
    /**
     * 
     * @param type $id of naspoma
     * @return type object model
     * @throws CHttpException if not found id
     */
    public function loadModel($id)
    {
        $model= naspoma::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}
