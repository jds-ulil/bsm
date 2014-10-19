<?php

class TolakController extends Controller
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
        Yii::app()->attachEventHandler('onError',array($this,'handleError'));
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
				'actions'=>array('create','complete',),
				'roles'=>array('inputter'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('approval','toapprove','tocancel',
                                    ),
				'roles'=>array('approval'),
                        ),  
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('report','detail','print','proses','completeApp',
                                    'error'),
				'users'=>array('@'),
                        ),  
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}     
    public function actionPrint() {
        $data = array();
        $index = 0;
        
        $model_tolak = new tolak('search');
        $model_tolak->unsetAttributes();
        if(isset($_POST['tolak'])){            
            $model_tolak->attributes = $_POST['tolak'];
            $dataProv = $model_tolak->searchTolak(); 
            
            foreach($dataProv->getData() as $record) {
                $index++;                
                $data[]=array(  'index'=>$index,
                                'tanggal_tolak'=>Yii::app()->numberFormatter->formatDate($record->tanggal_tolak),
                                'tahap_penolakan'=>Yii::app()->numberFormatter->formatDate($record->tahap_penolakan),
                                //'marketing'=>$record->rCM->roMar->nama,
                                'alasan_penolakan'=>$record->alasan_ditolak,
                                'nama_nasabah'=>$record->rCM->nama_nasabah,                                
                        );
            }
            
        }
        $unitKerja = array();
        if(!empty($model_tolak->unit_kerja)) {
            $unitKerja = array($model_tolak->unit_kerja);
        } else
        if(!empty($model_tolak->marketing_search)) {
            $unitKerja = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("unk.nama")
                            ->from("mtb_unit_kerja unk")
                            ->join("mtb_pegawai peg", "peg.unit_kerja = unk.unit_kerja_id")
                            ->where("peg.nama like '".$model_tolak->marketing_search."' ")                            
                            ->queryAll(); 
        }        
        $model_tolak->marketing_search = empty($model_tolak->marketing_search)?' - ':$model_tolak->marketing_search;
        $model_tolak->nama_nasabah = empty($model_tolak->nama_nasabah)?' - ':$model_tolak->nama_nasabah;
        $model_tolak->from_date = empty($model_tolak->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model_tolak->from_date);
        $model_tolak->to_date = empty($model_tolak->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model_tolak->to_date);        
        $model_tolak->tahap_penolakan = empty($model_tolak->tahap_penolakan)?' - ':$model_tolak->tahap_penolakan;        
        $this->render('print',array(
                'model_tolak' => $model_tolak,
                'data' => $data,
                'unitKerja' => $unitKerja,
        ));
    }
    public function actionDetail($id){
        $model_tolak = $this->loadModel($id);
        if(!empty($model_tolak)) {
            $model_proposal = $this->loadModelProposal($model_tolak->proposal_id);
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
        } else {
            $model_proposal = new proposal;
            $model_marketing = new pegawai;
            $model_ktp = new proposalKtp;
            $model_buku_nikah = new proposalBukuNikah;
            $model_kartu_keluarga = array(new proposalKartuKeluarga);
        }
        $this->render('detail',array(
            'model_tolak' => $model_tolak,
            'model_proposal' => $model_proposal,
            'model_marketing' => $model_marketing,
            'model_ktp' => $model_ktp,
            'model_buku_nikah' => $model_buku_nikah,
            'model_kartu_keluarga' => $model_kartu_keluarga,
        ));
    }
    public function actionError()
	{        
    $this->render('error',array(			
		));    
	}
    // when approve cancel tolak
    public function actionTocancel($id) {        
       $model_tolak = $this->loadModel($id);
       $model_proposal = $this->loadModelProposal($model_tolak->proposal_id);
       if($model_tolak->delete()){
           $model_proposal->status_pengajuan = vc::APP_status_proposal_new;
           $model_proposal->save();
           //print_r($model_proposal->getErrors());
           $this->redirect(array('tolak/completeApp'));
       }
    }
    // when approve nasabah tolak
    public function actionToapprove($id) {
        $model_tolak = $this->loadModel($id);
        $model_proposal = $this->loadModelProposal($model_tolak->proposal_id);
        $mailer = mailer::model()->findByPk(1);      
        if(!$mailer->approval || $model_tolak->sendMailApprove()){
            $model_proposal->status_pengajuan = vc::APP_status_proposal_tolak_approv;
            $model_proposal->save();
            $this->redirect(array('tolak/completeApp'));
        }
    }
    public function actionCompleteApp(){
        $this->render('complete_approval');
    }
    // controller approval
    public function actionApproval() {
        $model_tolak = new tolak('search');
        $model_tolak->unsetAttributes(); 
        $listTahapan = CHtml::listData(tolakTahapan::model()->findAll(),'nama','nama');                         
        $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');                         
        if(isset($_GET['tolak']))
            $model_tolak->attributes=$_GET['tolak'];
        
        $this->render('approval', array(
            'model_tolak' => $model_tolak,
            'listTahapan' => $listTahapan,
            'listUnit' => $listUnit,
        ));
    }
    public function actionProses($id){
        $model_tolak = $this->loadModel($id);
        if(!empty($model_tolak)) {
            $model_proposal = $this->loadModelProposal($model_tolak->proposal_id);
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
        } else {
            $model_proposal = new proposal;
            $model_marketing = new pegawai;
            $model_ktp = new proposalKtp;
            $model_buku_nikah = new proposalBukuNikah;
            $model_kartu_keluarga = array(new proposalKartuKeluarga);
        }
        $this->render('proses_approval',array(
            'model_tolak' => $model_tolak,
            'model_proposal' => $model_proposal,
            'model_marketing' => $model_marketing,
            'model_ktp' => $model_ktp,
            'model_buku_nikah' => $model_buku_nikah,
            'model_kartu_keluarga' => $model_kartu_keluarga,
        ));
    }
    public function actionReport(){
        $model_tolak = new tolak('search');
        $model_tolak->unsetAttributes(); 
        $listTahapan = CHtml::listData(tolakTahapan::model()->findAll(),'nama','nama');                         
        $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');
        
        if(isset($_GET['tolak']))
            $model_tolak->attributes=$_GET['tolak'];
        
        $this->render('report', array(
            'model_tolak' => $model_tolak,
            'listTahapan' => $listTahapan,
            'report' => true,
            'listUnit' => $listUnit,
        ));
    }
    public function actionCreate (){         
        $model_tolak = new tolak;
        $model_tolak->tahap_penolakan = 'BI Checking';
        $listTahapan = CHtml::listData(tolakTahapan::model()->findAll(),'nama','nama');
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='tolak-form')
                {
                        echo CActiveForm::validate($model_tolak);
                        Yii::app()->end();
                }
                
          if(isset($_POST['tolak']))
		{           
                    $model_tolak->attributes=$_POST['tolak'];                                                                                         
                    
                    if($model_tolak->tempLL != '') {
                            $model_tolak->tahap_penolakan = $model_tolak->tempLL;
                    } else {
                        if ($model_tolak->tahap_penolakan == 'Lain-lain'){
                           $model_tolak->tahap_penolakan = '';
                        }
                    }
                    if(!in_array($model_tolak->tahap_penolakan, $listTahapan) && $model_tolak->mode == 'create') {
                        $model_tolak->tahap_penolakan = 'Lain-lain';
                        
                    };
                    
                    if ($model_tolak->validate()) {                        
                        $model_proposal = 
                            proposal::model()->find("del_flag = 0 AND status_pengajuan = ".vC::APP_status_proposal_new." AND proposal_id ='".$model_tolak->proposal_id."'");                            
                            $model_proposal->namaJenisNasabah = $model_proposal->jenisNasabah[$model_proposal->jenis_nasabah];
                        if(empty($model_proposal)){
                            $model_proposal = new proposal;
                        }
                        
                        $model_marketing =
                        pegawai::model()->find("pegawai_id='".$model_proposal->marketing."'");
                        if(empty($model_marketing)){
                            $model_marketing = new pegawai;
                        }                        
                        $model_ktp =
                        proposalKtp::model()->find("proposal_id='".$model_proposal->proposal_id."'");
                        if(empty($model_ktp)){
                            $model_ktp = new proposalKtp;
                        }                        
                        $model_buku_nikah =
                        proposalBukuNikah::model()->find("proposal_id='".$model_proposal->proposal_id."'");
                        if(empty($model_buku_nikah)){
                            $model_buku_nikah = new proposalBukuNikah;
                        }   
                        $model_kartu_keluarga =
                                proposalKartuKeluarga::model()->findAll("proposal_id='".$model_proposal->proposal_id."'");
                        if(empty($model_kartu_keluarga)){
                            $model_kartu_keluarga = array(new proposalKartuKeluarga);
                        }
                        //$model_marketing = 
                    } else {
                        $model_tolak->mode = 'create';
                    } 
		}  
                
        switch ($model_tolak->mode) {        
            case 'create':
                $this->render('create',array(
                'model_tolak' => $model_tolak,
                'listTahapan' => $listTahapan,
                ));
                break;
            case 'confirm':
                $this->render('confirm',array(   
                    'model_tolak' => $model_tolak,
                    'model_proposal' => $model_proposal,
                    'model_marketing' => $model_marketing,
                    'model_ktp' => $model_ktp,
                    'model_buku_nikah' => $model_buku_nikah,
                    'model_kartu_keluarga'=>$model_kartu_keluarga,
                ));
                break;
            case 'complete':                    
                $mailer = mailer::model()->findByPk(1);   
                if(!$mailer->nasabah_tolak || $model_tolak->sendNotif()) {
                    if($model_tolak->save()){                            
                        $model_proposal->status_pengajuan =  vC::APP_status_proposal_tolak;
                        $model_proposal->save();
                        $this->redirect(array('complete'));
                    } else {           
                      //print_r($model_proposal->getErrors());
                    };
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
		$model= tolak::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function loadModelProposal($id)
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
