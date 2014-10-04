<?php

class ProposalController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','getRowForm','complete'),
				'roles'=>array('admin', 'inputter', 'approval'),
                    ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('report','detail'),
				'roles'=>array('admin','approval'),
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
                'modelClass' => 'proposalKartuKeluarga'
            ),
        );
    }
    public function actionDetail($id){
        $model_proposal = $this->loadModel($id);
        $model_marketing = new pegawai;
        $model_ktp = new proposalKtp;
        $model_buku_nikah = new proposalBukuNikah;
        $model_kartu_keluarga = array(new proposalKartuKeluarga);
        if(!empty($model_proposal)) {
            $model_marketing = pegawai::model()->findByPk($model_proposal->marketing);
            $model_proposal->namaJenisNasabah = $model_proposal->jenisNasabah[$model_proposal->jenis_nasabah];
            $model_ktp = proposalKtp::model()->findByAttributes(array(
                'no_ktp'=>$model_proposal->no_ktp,
                'no_proposal'=>$model_proposal->no_proposal,                
            ));
            $model_buku_nikah_cek = proposalBukuNikah::model()->findByAttributes(array(
                'no_buku_nikah'=>$model_proposal->no_buku_nikah,
                'no_proposal'=>$model_proposal->no_proposal,                
            ));
            if (!empty($model_buku_nikah_cek)) {
                $model_buku_nikah = $model_buku_nikah_cek;
            }
            $model_kartu_keluarga = proposalKartuKeluarga::model()->findAllByAttributes(array(
                'no_kartu_keluarga'=>$model_proposal->no_kartu_keluarga,
                'no_proposal'=>$model_proposal->no_proposal,                
            ));            
            }
        $this->render('detail',array(
            'model_proposal' => $model_proposal,
            'model_marketing' => $model_marketing,
            'model_ktp' => $model_ktp,
            'model_buku_nikah' => $model_buku_nikah,
            'model_kartu_keluarga' => $model_kartu_keluarga,
        ));
    }

    public function actionReport(){
        $model_proposal = new proposal('search');        
        $model_proposal->unsetAttributes();  // clear any default values      
        $model_proposal->proposal_id = 'empty';
        if(isset($_GET['proposal']))
                $model_proposal->attributes=$_GET['proposal'];
        $this->render('report',array(
            'model_proposal'=>$model_proposal,
        ));
    }
    public function actionCreate (){
        $model_proposal=new proposal('create');
        $model_proposal->jenis_nasabah = 1;
        
        $model_marketing = new pegawai;  
        $model_kartu_keluarga = array (new proposalKartuKeluarga);        
        $model_buku_nikah = new proposalBukuNikah;
        $model_ktp = new proposalKtp;
        
        $listSegmen = CHtml::listData(Segmen::model()->findAll(),'segmen_id','nama');
        $listAgama = CHtml::listData(agama::model()->findAll(),'agama_id','nama');
        $listKolektabilitas = CHtml::listData(Kolektabilitas::model()->findAll(),'kolektabilitas_id','nama');
        
        $error = false;
        
        if(isset($_POST['proposalBukuNikah'])){
            $model_buku_nikah->attributes=$_POST['proposalBukuNikah'];
            if(!$model_buku_nikah->validate()) {                
                $error = true;
            };
        }        
        if(isset($_POST['proposalKtp'])){
            $model_ktp->attributes=$_POST['proposalKtp'];
            $model_ktp->validate();
            if(!$model_ktp->validate()) {                
                $error = true;
            };
        }                                        
        if(isset($_POST['proposalKartuKeluarga'])){
            $model_kartu_keluarga = array();
             foreach ($_POST['proposalKartuKeluarga'] as $key => $value) {                                                                          
                        $model_kartu_keluargaEach = new proposalKartuKeluarga('batchSave');
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
       // $error = true;
        if(isset($_POST['proposal']))
		{           
                    $model_proposal->attributes=$_POST['proposal'];
                    
                    if (!empty($model_proposal->marketing))
                    $model_marketing = pegawai::model()->findByPk($model_proposal->marketing);
                    
                    if ($model_proposal->validate() && !$error) {           
                        $model_proposal->namaJenisNasabah = $model_proposal->jenisNasabah[$model_proposal->jenis_nasabah];
                        
                        $model_ktp->no_ktp = $model_proposal->no_ktp;
                        $model_ktp->no_proposal = $model_proposal->no_proposal;
                        
                        $model_buku_nikah->no_proposal = $model_proposal->no_proposal;
                        $model_buku_nikah->no_buku_nikah = $model_proposal->no_buku_nikah;
                        
                        foreach ($model_kartu_keluarga as $model_kartu_keluargaEach) {
                            $model_kartu_keluargaEach->no_proposal = $model_proposal->no_proposal;
                            $model_kartu_keluargaEach->no_kartu_keluarga = $model_proposal->no_kartu_keluarga;
                        }
                       // $model_kartu_keluarga->no_proposal = $model_proposal->no_proposal;
                    } else {
                        $model_proposal->mode = 'create';
                    } 
                    //if($model->save())
                    // $this->redirect(array('view','id'=>$model->pegawai_id));
		}  
        switch ($model_proposal->mode) {
            case 'create':
                $this->render('create',array(
                'model_proposal'=>$model_proposal, 
                'listSegmen'=>$listSegmen,
                'listAgama'=>$listAgama,
                'listKolektabilitas'=>$listKolektabilitas,
                'model_marketing'=>$model_marketing,
                'model_kartu_keluarga'=>$model_kartu_keluarga,
                'model_buku_nikah'=>$model_buku_nikah,
                'model_ktp'=>$model_ktp,
                    ));
                break;
            case 'confirm':
                $this->render('confirm',array(
                'model_proposal'=>$model_proposal, 
                'listSegmen'=>$listSegmen,
                'listAgama'=>$listAgama,
                'listKolektabilitas'=>$listKolektabilitas,
                'model_marketing'=>$model_marketing,
                'model_kartu_keluarga'=>$model_kartu_keluarga,
                'model_buku_nikah'=>$model_buku_nikah,
                'model_ktp'=>$model_ktp,
                    ));
                break;
            case 'complete':
                if ($model_proposal->validNasabah($model_kartu_keluarga)){
                //if ($model_proposal->sendNotif()) {   
                    if ($model_proposal->save()){
                        if(!empty($model_buku_nikah->no_buku_nikah))
                        $model_buku_nikah->save();
                        $model_ktp->save();
                        foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {                  
                            $model_kartu_keluargaEach->save();
                        }
                        $this->redirect(array('complete'));                        
                    }      
               // }
                } else {
                    if ($model_proposal->nasabahError == vC::APP_nasabah_error_tolak) {
                         errorNasabah::setTotalNasabahTolak($model_proposal->proposalError);
                         $model_proposal->percobaanInput = errorNasabah::getTotalNasabahTolak($model_proposal->proposalError);
                    }
                   
                    $this->render('error',array(	
                        "model_proposal" => $model_proposal,
                    ));                    
                }
                break;
            default:
                break;
        }        
    }
    public function actionComplete(){
        $this->render('complete',array(	
        ));
    }
    public function loadModel($id)
	{
		$model=  proposal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MtbUser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mtb-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
