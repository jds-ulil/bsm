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
         
         
        public function init() {
        parent::init();
       // Yii::app()->attachEventHandler('onError',array($this,'handleError'));
        }
        public function handleError(CEvent $event)
            {            
            if($event instanceof CErrorEvent)
            {       
            $this->redirect(array('Error'));
          }
            $event->handled = TRUE;
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
				'actions'=>array('create', 'complete',),
				'roles'=>array('inputter',),
                    ),           
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('autocompleteUsaha', 'autocompleteNasabah', 'autocompleteNasabahTolak',
                                                'autocompleteNasabahTolakApp', 'getRowForm', 'print', 'tes',
                                                'error','report','detail',
                                    ),
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
                'modelClass' => 'proposalKartuKeluarga'
            ),
        );
    }   
    
    public function actionError() {        
    $this->render('error',array(			
		));    
	}
    
    public function actionPrint() {
        $data = array();
        $index = 0;
        $total = 0;
        $model_proposal = new proposal('search');
        $model_proposal->unsetAttributes();
        if(isset($_POST['proposal'])){
            $model_proposal->attributes = $_POST['proposal'];
            $dataProv = $model_proposal->search();            
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total = $total + intval($record->plafon);
                $data[]=array(  'index'=>$index,
                                'nama_nasabah'=>$record->nama_nasabah,
                                'tanggal_pengajuan'=>Yii::app()->numberFormatter->formatDate($record->tanggal_pengajuan),
                                'plafon'=>Yii::app()->numberFormatter->formatCurrency($record->plafon,""),
                                'jenis_usaha'=>Yii::app()->numberFormatter->formatCurrency($record->jenis_usaha,""),
                                'marketing'=>$record->rMar->nama,
                        );
            }                                  
        }
        $model_proposal->marketing = empty($model_proposal->marketing)?'Tidak Ditentukan':$model_proposal->marketing;        
       $model_proposal->jenis_usaha = empty($model_proposal->jenis_usaha)?'Semua Jenis Usaha':$model_proposal->jenis_usaha;
        $model_proposal->from_plafon = empty($model_proposal->from_plafon)?' - ':Yii::app()->numberFormatter->formatCurrency($model_proposal->from_plafon,"");
        $model_proposal->to_plafon = empty($model_proposal->to_plafon)?' - ':Yii::app()->numberFormatter->formatCurrency($model_proposal->to_plafon,"");
        $model_proposal->from_date = empty($model_proposal->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model_proposal->from_date);
        $model_proposal->to_date = empty($model_proposal->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model_proposal->to_date);        
        $this->render('print',array(
            'model_proposal' => $model_proposal,
            'data' => $data,
            'total' => Yii::app()->numberFormatter->formatCurrency($total,""),
        ));
    }   
        
	public function ActionAutocompleteNasabahTolakApp() {
            $res =array();
        if (isset($_GET['term'])) {
            $sql = 'SELECT pro.nama_nasabah AS label,pro.proposal_id AS proposal_id
                        FROM proposal pro';
            $sql = $sql . " WHERE pro.`nama_nasabah` LIKE :nama AND pro.status_pengajuan = '".vc::APP_status_proposal_tolak_approv."' group by pro.jenis_usaha"; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
    }
    
	public function actionAutocompleteNasabah() {
            $res =array();
        if (isset($_GET['term'])) {
            $sql = 'SELECT pro.nama_nasabah AS label,pro.proposal_id AS proposal_id
                        FROM proposal pro';
            $sql = $sql . " WHERE pro.`nama_nasabah` LIKE :nama AND pro.status_pengajuan = '".vc::APP_status_proposal_new."' group by pro.jenis_usaha"; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
    }
    
	public function actionAutocompleteNasabahTolak() {
            $res =array();
        if (isset($_GET['term'])) {
            $sql = 'SELECT pro.nama_nasabah AS label,pro.proposal_id AS proposal_id
                        FROM proposal pro';
            $sql = $sql . " WHERE pro.`nama_nasabah` LIKE :nama AND pro.status_pengajuan = '".vc::APP_status_proposal_tolak."' group by pro.jenis_usaha"; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
    }
    
	public function actionAutocompleteUsaha() {
            $res =array();
        if (isset($_GET['term'])) {
            $sql = 'SELECT pro.jenis_usaha AS label
                        FROM proposal pro';
            $sql = $sql . " WHERE pro.`jenis_usaha` LIKE :nama AND pro.status_pengajuan = '".vc::APP_status_proposal_new."' group by pro.jenis_usaha"; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
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
            $model_ktp_cek = proposalKtp::model()->findByAttributes(array(
                'no_ktp'=>$model_proposal->no_ktp,
                'proposal_id'=>$model_proposal->proposal_id,                
            ));
            $model_buku_nikah_cek = proposalBukuNikah::model()->findByAttributes(array(
                'no_buku_nikah'=>$model_proposal->no_buku_nikah,
                'proposal_id'=>$model_proposal->proposal_id,                
            ));
            if (!empty($model_buku_nikah_cek)) {
                $model_buku_nikah = $model_buku_nikah_cek;
            }
            if (!empty($model_ktp_cek)) {
                $model_ktp = $model_ktp_cek;
            }
            $model_kartu_keluarga = proposalKartuKeluarga::model()->findAllByAttributes(array(
                'no_kartu_keluarga'=>$model_proposal->no_kartu_keluarga,
                'proposal_id'=>$model_proposal->proposal_id,                
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

        $listSegmen = CHtml::listData(Segmen::model()->findAll(),'segmen_id','nama'); 
       //$model_proposal->proposal_id = 'empty';
        if(isset($_GET['proposal'])){
                $model_proposal->attributes=$_GET['proposal'];
                }
        $this->render('report',array(
            'model_proposal'=>$model_proposal,            
            'listSegmen' => $listSegmen,
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
        $listJenisIdentitas = CHtml::listData(jenisIdentitas::model()->findAll(),'identitas_id','nama');
        
        $error = false;
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='proposal-form')
            {
                    echo CActiveForm::validate(array($model_proposal,$model_ktp,$model_buku_nikah));                   
                    Yii::app()->end();
            }        
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
                        
                       
                        $model_buku_nikah->no_buku_nikah = $model_proposal->no_buku_nikah;
                        
                        foreach ($model_kartu_keluarga as $model_kartu_keluargaEach) {                         
                            $model_kartu_keluargaEach->no_kartu_keluarga = $model_proposal->no_kartu_keluarga;
                        }               
                    } else {
                        $model_proposal->mode = 'create';
                    }       
		}  
        switch ($model_proposal->mode) {
            case 'create':
                $this->render('create',array(
                'model_proposal'=>$model_proposal, 
                'listSegmen'=>$listSegmen,
                'listAgama'=>$listAgama,
                'listKolektabilitas'=>$listKolektabilitas,
                'listJenisIdentitas'=>$listJenisIdentitas,
                'model_marketing'=>$model_marketing,
                'model_kartu_keluarga'=>$model_kartu_keluarga,
                'model_buku_nikah'=>$model_buku_nikah,
                'model_ktp'=>$model_ktp,
                    ));
                break;
            case 'confirm': 
                   // if($model_proposal->sendNotif()) {
                        if ($model_proposal->save()){
                            if(!empty($model_buku_nikah->no_buku_nikah)) {                            
                                $model_buku_nikah->proposal_id = $model_proposal->proposal_id;
                                $model_buku_nikah->save();
                            }

                            $model_ktp->proposal_id = $model_proposal->proposal_id;
                            $model_ktp->save();
                            foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {   
                                $model_kartu_keluargaEach->proposal_id = $model_proposal->proposal_id;
                                if(!empty($model_kartu_keluargaEach->nama)||!empty($model_kartu_keluargaEach->no_ktp)
                                        ||!empty($model_kartu_keluargaEach->tanggal_lahir))
                                $model_kartu_keluargaEach->save();
                            }
                            $this->redirect(array('complete'));                        
                        }
                  //  } else {
                         $this->redirect(array('error'));   
                   // }
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
    public function actionTes() {
        $mail_set = mailer::model()->findByPk(1);
        $message = new YiiMailMessage();   

        $message->view = 'input';        
        $message->subject    = 'Proposal Baru KCP '.vC::APP_nama_KCP;

        $message->addTo('oelhil@gmail.com');                                

            $param = array ();
            $message->setBody($param, 'text/html');                
            $message->from = vc::APP_from_email;   

        try
        {            
            Yii::app()->mail->transportOptions = array(
                 'host' => 'webmail.bsm.co.id',
                'username' => 'rnur1780',
                'password' => 'yaarabbku01',
                'port' => '443',
                'encryption'=>'tls',
                );
            Yii::app()->mail->send($message);                
            //$model->status = 4;
                //$model->save();
                //$this->redirect(array('view','id'=>$model->nasabah_id));
            }
            catch (Exception $exc)
            {                                        
                return false;
            }             
            
            return true;
        }
}
