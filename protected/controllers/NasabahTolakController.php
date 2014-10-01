<?php

class NasabahTolakController extends Controller
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
				'actions'=>array('create','getRowForm'),
				'roles'=>array('admin', 'inputter'),
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
    public function actionCreate (){
        $model_nasabah_tolak = new nasabahTolak;
        $model_nasabah_tolak->jenis_nasabah = 1;
        
        $model_marketing = new pegawai;  
        $model_kartu_keluarga = array (new nasabahTolakKartuKeluarga);        
        $model_buku_nikah = new nasabahTolakBukuNikah;
        $model_ktp = new nasabahTolakKtp;
        
        $listSegmen = CHtml::listData(Segmen::model()->findAll(),'segmen_id','nama');
        $listAgama = CHtml::listData(agama::model()->findAll(),'agama_id','nama');
        $listKolektabilitas = CHtml::listData(Kolektabilitas::model()->findAll(),'kolektabilitas_id','nama');
        
        $error = false;
        
        if(isset($_POST['nasabahTolakBukuNikah'])){

        }        
        if(isset($_POST['nasabahTolakKtp'])){

        }                                        
        if(isset($_POST['nasabahTolakKartuKeluarga'])){
               
        }        
        
        if(isset($_POST['nasabahTolak']))
		{           

		}  
        
        switch ($model_nasabah_tolak->mode) {
              case 'create':
                $this->render('create',array(   
                    
                    ));
                break;
            case 'confirm':
              
                break;
             case 'complete':
                 $this->render('complete',array(               
                    ));
                 break;
            default:
                break;
        }
    }
    public function loadModel($id)
	{
		$model= nasabahTolak::model()->findByPk($id);
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
