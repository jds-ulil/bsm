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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','complete'),
				'roles'=>array('admin', 'inputter'),
			),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('report','detail'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}       
    public function actionDetail($id){
        $model_tolak = $this->loadModel($id);
        $this->render('detail',array(         
        ));
    }
    public function actionReport(){
        $model_tolak = new tolak('search');
        $model_tolak->unsetAttributes();  // clear any default values              
        $listTahapan = CHtml::listData(tolakTahapan::model()->findAll(),'nama','nama');                         
        if(isset($_GET['tolak']))
                $model_tolak->attributes=$_GET['tolak'];
        $this->render('report', array(
            'model_tolak' => $model_tolak, 
            'listTahapan' => $listTahapan,
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
                            proposal::model()->find("del_flag = 0 AND status_pengajuan = 0 AND no_proposal ='".$model_tolak->no_proposal."'");                            
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
                        proposalKtp::model()->find("no_proposal='".$model_proposal->no_proposal."'");
                        if(empty($model_ktp)){
                            $model_ktp = new proposalKtp;
                        }                        
                        $model_buku_nikah =
                        proposalBukuNikah::model()->find("no_proposal='".$model_proposal->no_proposal."'");
                        if(empty($model_buku_nikah)){
                            $model_buku_nikah = new proposalBukuNikah;
                        }   
                        $model_kartu_keluarga =
                                proposalKartuKeluarga::model()->findAll("no_proposal='".$model_proposal->no_proposal."'");
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
              //  if($model_tolak->sendNotif()) {
                    if($model_tolak->save()){
                        $model_proposal->status_pengajuan =  vC::APP_status_proposal_tolak;
                        $model_proposal->save();
                        $this->redirect(array('complete'));
                    } else {
                    //  print_r($model_proposal->getErrors());
                    };
              //  }
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
