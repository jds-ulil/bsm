<?php

class DailydataController extends Controller
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
				'actions'=>array('reset'),
				'roles'=>array('approval'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionReset() {
            $change = false;
            $model = new dailyData;
            
            if(isset($_POST['dailyData'])) {
                $model->attributes = $_POST['dailyData'];
                
                if($model->security == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(dailySecurityJenisNasabah::model()->tableName()); 
                }
                if ($model->teller == 1) {
                   $change = true; 
                   Yii::app()->db->createCommand()->truncateTable(dailyTellerKriteriaTransaksi::model()->tableName()); 
                   
                    $sql = "insert into daily_teller_kriteria_transaksi (jenis_transaksi_id, nama, rank, hidden) "
                           . "values "
                            . "(1,'Saldo Teller Akhir Hari',0,1),"
                            . "(2,'Saldo Khasanah Akhir Hari',0,1),"
                            . "(3,'Saldo ATM Akhir Hari',0,1)";
                    Yii::app()->db->createCommand($sql)->execute();
                   
                }
                if ($model->customer_service == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(dailyCsKriteriaNasabah::model()->tableName()); 
                }
                if ($model->back_office == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(dailyBoKriteriaTransaksi::model()->tableName()); 
                    
                    $sql = "insert into daily_bo_kriteria_transaksi (jenis_transaksi_id, nama, rank, hidden) "
                           . "values "
                            . "(1,'Saldo Kas Kecil Akhir Hari',0,1),"
                            . "(2,'Saldo Rekening Perantara Akhir Hari',0,1),"
                            . "(3,'Saldo Materai Akhir Hari',0,1)";
                    Yii::app()->db->createCommand($sql)->execute();
                }
                if ($model->warung_mikro == 1) {                    
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(dailyWmKriteriaNasabah::model()->tableName()); 
                }
                if ($model->sales_assistan == 1) {
                    $change = true;
                    Yii::app()->db->createCommand()->truncateTable(dailySaKriteriaNasabah::model()->tableName()); 
                }
                if ($change) {
                     Yii::app()->user->setFlash('success', "Data Telah Di Kosongkan");
                }
            }
            
            
            
            $this->render('reset',array(
                'model' => $model,
            ));
        }
}
