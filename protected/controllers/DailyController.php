<?php
/**
 * Description of DailyController
 *
 * @author oelhil@gmail.com
 * 20150701 - 
 * class controller untuk fasilitas daily activity
 */
class DailyController extends Controller{
    //put your code here
    
    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dailyreporttempplate';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
    
    public function init() {
        parent::init();     
    }    
    
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
        // semua dapat mengakses halaman input
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'complete',
                    'inputSecurity', 'laporanSecurity', 'getRowSec', 'printsecurity', 'deleteSecurity', 'accSecurity',
                    'inputCS', 'getRowCS', 'laporanCS', 'printcs',
                    'inputTeller', 'getRowTel', 'laporanTel', 'printtel',
                    'inputBo'
                    ),
				'users'=>array('*'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'complete',
                    'deleteCs', 'accCs',
                    'deleteTel', 'accTel',
                    ),
				'users'=>array('@'),
			),			
            // deny for unidentified page and user
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    /**
     * diakses ketika pertama mau input lap daily activity
     * 
     */
    public function actionIndex () {  
        $this->layout = 'dailyreportempty';
        $this->render('index',array(
			
		));
    }    
    
     /**
     * diakses ketika pertama mau input lap daily activity khusus Teller
     * 
     */
    public function actionInputBo () {
        //set page title
        $this->setPageTitle("Input Back Office");
        
        $model = new dailyBo;
        $model_ = array(new dailyBoArray); 
        
        $listKriteriaTransaksi = CHtml::listData(dailyBoKriteriaTransaksi::model()->findAll(), 'jenis_transaksi_id', 'nama');
        
        $valid_data = false;
        
        if(isset($_POST['dailyBo'])) {         
            
        }// end if post dailyTeller
        
        if(isset($_POST['dailyBoArray'])) {
           
        }// end if post dailyTellerArray
        if($valid_data) {    
         
            $this->redirect(array('complete'));
        }// end if valid_data
        
        $this->render('inputBo',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaTransaksi' => $listKriteriaTransaksi,
        ));
        
    }
    
     /**
     * diakses ketika pertama mau input lap daily activity khusus Teller
     * 
     */
    public function actionInputTeller () {
        //set page title
        $this->setPageTitle("Input Teller Data");
        
        $model = new dailyTeller;
        $model_ = array(new dailyTellerArray); 
        
        $listKriteriaTransaksi = CHtml::listData(dailyTellerKriteriaTransaksi::model()->findAll(), 'jenis_transaksi_id', 'nama');
        
        $valid_data = false;
        
        if(isset($_POST['dailyTeller'])) {
            $valid_data = true;
            $model->attributes = $_POST['dailyTeller'];   
            $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;
                };                 
            
        }// end if post dailyTeller
        
        if(isset($_POST['dailyTellerArray'])) {
            $valid_data = false;
            $valid_array = true;
            $model_ = array();            
            // add data from post to model
            foreach ($_POST['dailyTellerArray'] as $key => $value) {  
                $model_each = new dailyTellerArray;
                $model_each->attributes = $value;                    
                $model_each->tanggal = $model->tanggal;
                $model_each->nama_pegawai = $model->nama_pegawai;
                $model_each->status = vC::APP_status_laporan_new;
                $model_[] = $model_each;  
            }
            // validate each         
            foreach ($model_ as $key => $model_Each) {                  
                if(!$model_Each->validate()) {
                    $valid_array = false;
                };                 
            }         
            $valid_data = $valid_array;
        }// end if post dailyTellerArray
        if($valid_data) {    
            //save main
            $model->save();
            
            foreach ($model_ as $key => $model_Each) {                  
                $model_Each->save();
            }
            $this->redirect(array('complete'));
        }// end if valid_data
        
        $this->render('inputTeller',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaTransaksi' => $listKriteriaTransaksi,
        ));
        
    }
    
    
    public function actionLaporanTel () {
      //set page title
        $this->setPageTitle("Laporan Teller");
        
        // new model daily with search as scenario
        $model = new dailyTeller('search');
        $model->unsetAttributes();
        
        $listKriteriaTransaksi = CHtml::listData(dailyTellerKriteriaTransaksi::model()->findAll(), 'jenis_transaksi_id', 'nama');
        
         if(isset($_GET['dailyTeller'])){
            $model->attributes=$_GET['dailyTeller'];
            }        
        
        $this->render('searchTel',array(
            'model' => $model,  
            'listKriteriaTransaksi' => $listKriteriaTransaksi,
        ));  
    }
    
    /**
     * fungsi untuk menghapus teler laporan
     *  contoh penggunaan :
     *                      pada laporan teler tabel
     * @param type $id dari laporan teler yang akan di hapus
     */
    public function actionDeleteTel ($id) {
        $model = dailyTeller::model()->findByPk($id);
        $model->delete();       
    }
    
    /**
     * ACC teler from report page
     * @param type $id
     */
    public function actionAccTel ($id) {
        $model = dailyTeller::model()->findByPk($id);
        $model->status = vC::APP_status_laporan_approve;
        if ($model->save())        
        echo 'sukses update';
        else 
            print_r($model->getErrors());
    }
     
    
    // fungsi render print ke pdf untuk laporan teller
    public function actionPrinttel () {
        $model = new dailyTeller('search');
        $model->unsetAttributes();
        
        $model->record_row = 10000;   
        $index = 0;
        $total_nasabah = 0;
        $total_setor = 0;
        $data = array();
        
        if(isset($_POST['dailyTeller'])){
            $model->attributes = $_POST['dailyTeller'];
            $dataProv = $model->search();                         
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total_nasabah = $total_nasabah + intval($record->jumlah);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'kriteria_transaksi'=>$record->rKrit->nama,                               
                                'nama_pegawai'=>$record->nama_pegawai,                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah,                                                                                
                                'total'=>Yii::app()->numberFormatter->formatCurrency($record->total ,""),                                              
                        );                        
            }
            
        }
                        
        $model->kriteria_transaksi = empty($model->kriteria_transaksi)?' Semua Jenis ': $model->rKrit->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        $model->nama_pegawai = empty($model->nama_pegawai)?' Semua Pegawai ': $model->nama_pegawai;
        $this->render('printtel',array(
            'model' => $model,
            'data' => $data,
            'total_nasabah'=>$total_nasabah,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),             
        ));
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
    
    /**
     * diakses ketika pertama mau input lap daily activity khusus CS
     * 
     */
    public function actionInputCS () {
        //set page title
        $this->setPageTitle("Input Security Data");
        
        $model = new dailyCs;
        $model_ = array (new dailyCsArray);
        
        $listKriteriaNasabah = CHtml::listData(dailyCsKriteriaNasabah::model()->findAll(), 'cs_kriteria_nasabah_id', 'nama');
        
        $valid_data = false;
        
        if(isset($_POST['dailyCs'])){
            $valid_data = true;
            $model->attributes = $_POST['dailyCs'];   
            $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;
                };                 
        }
        if(isset($_POST['dailyCsArray'])){
             // let false again
            $valid_data = false;
            $valid_array = true;
            $model_ = array();            
            // add data from post to model
            foreach ($_POST['dailyCsArray'] as $key => $value) {  
                $model_each = new dailyCsArray('batchSave');
                $model_each->attributes = $value;                    
                $model_each->tanggal = $model->tanggal;
                $model_each->nama_pegawai = $model->nama_pegawai;
                $model_each->status = vC::APP_status_laporan_new;
                $model_[] = $model_each;  
            }
            // validate each         
            foreach ($model_ as $key => $model_Each) {                  
                if(!$model_Each->validate()) {
                    $valid_array = false;
                };                 
            }         
            $valid_data = $valid_array;
        }
        
        if($valid_data) {            
            //save main
            $model->save();
            
            foreach ($model_ as $key => $model_Each) {                  
                $model_Each->save();
            }
            $this->redirect(array('complete'));
        }
        
        $this->render('inputCS',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaNasabah' => $listKriteriaNasabah,
        ));
    }
    
     /**
     * fungsi untuk menghapus customer service laporan
     *  contoh penggunaan :
     *                      pada laporan security tabel
     * @param type $id dari laporan security yang akan di hapus
     */
    public function actionDeleteCs ($id) {
        $model = dailyCs::model()->findByPk($id);
        $model->delete();       
    }
    
    /**
     * ACC customer service from report page
     * @param type $id
     */
    public function actionAccCs ($id) {
        $model = dailyCs::model()->findByPk($id);
        $model->status = vC::APP_status_laporan_approve;
        if ($model->save())        
        echo 'sukses update';
        else 
            print_r($model->getErrors());
    }
    
    
    /**
     * controller fungsi untuk meload page laporan Customer Service
     */
    public function actionLaporanCS () {
         //set page title
        $this->setPageTitle("Laporan Customer Service");
        
        // new model daily with search as scenario
        $model = new dailyCs('search');
        $model->unsetAttributes();
        
        $listKriteriaNasabah = CHtml::listData(dailyCsKriteriaNasabah::model()->findAll(), 'cs_kriteria_nasabah_id', 'nama');
        
         if(isset($_GET['dailyCs'])){
            $model->attributes=$_GET['dailyCs'];
            }        
        
        $this->render('searchCS',array(
            'model' => $model,  
            'listKriteriaNasabah' => $listKriteriaNasabah,
        ));
    }
    
    
     // fungsi render print ke pdf untuk laporan customer service
    public function actionPrintcs () {
        $model = new dailyCs('search');
        $model->unsetAttributes();
        
        $model->record_row = 10000;   
        $index = 0;
        $total_nasabah = 0;
        $total_setor = 0;
        $data = array();
        
        if(isset($_POST['dailyCs'])){
            $model->attributes = $_POST['dailyCs'];
            $dataProv = $model->search();                         
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total_nasabah = $total_nasabah + intval($record->jumlah);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'kriteria_nasabah'=>$record->rKrit->nama,                               
                                'nama_pegawai'=>$record->nama_pegawai,                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah,                                                                                
                                'total'=>Yii::app()->numberFormatter->formatCurrency($record->total ,""),                                              
                        );                        
            }
            
        }
                        
        $model->kriteria_nasabah = empty($model->kriteria_nasabah)?' Semua Jenis ': $model->rKrit->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        $model->nama_pegawai = empty($model->nama_pegawai)?' Semua Pegawai ': $model->nama_pegawai;
        $this->render('printcs',array(
            'model' => $model,
            'data' => $data,
            'total_nasabah'=>$total_nasabah,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),             
        ));
        
        
    }
    
    
    /**
     * diakses ketika pertama mau input lap daily activity khusus security
     * 
     */
    public function actionInputSecurity () {
        //set page title
        $this->setPageTitle("Input Security Data");
        
        $model = new dailySecurity; 
        $model_ = array (new dailySecurityArray); 
        
        $listJenisNasabah = CHtml::listData(dailySecurityJenisNasabah::model()->findAll(),'jenis_nasabah_id','nama');
        
        $valid_data = false;
        
        // jika form submit 
        if(isset($_POST['dailySecurity'])){
                // init for valid data biar gak sma pas pertama
                $valid_data = true;
                $model->attributes = $_POST['dailySecurity'];   
                $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;
                };
         }
        if(isset($_POST['dailySecurityArray'])){
            // let false again
            $valid_data = false;
            $valid_array = true;
            $model_ = array();            
            // add data from post to model
            foreach ($_POST['dailySecurityArray'] as $key => $value) {                                                                          
                        $model_securityEach = new dailySecurityArray('batchSave');
                        $model_securityEach->attributes = $value;                    
                        $model_securityEach->tanggal = $model->tanggal;
                        $model_securityEach->nama_inputer = $model->nama_inputer;
                        $model_securityEach->status = vC::APP_status_laporan_new;
                        $model_[] = $model_securityEach;    
                    }            
            // validate each         
            foreach ($model_ as $key => $model_securityEach) {                  
                if(!$model_securityEach->validate()) {
                    $valid_array = false;
                };                 
            }         
            $valid_data = $valid_array;
        }
        if($valid_data) {            
            //save main
            $model->save();
            
            foreach ($model_ as $key => $model_securityEach) {                  
                $model_securityEach->save();
            }
            $this->redirect(array('complete'));
        }
        
        $this->render('inputSecurity',array(
			'model' => $model,
			'model_' => $model_,
            'listJenisNasabah' => $listJenisNasabah,
		));
    }

    /**
     * fungsi untuk menghapus security laporan
     *  contoh penggunaan :
     *                      pada laporan security tabel
     * @param type $id dari laporan security yang akan di hapus
     */
    public function actionDeleteSecurity ($id) {
        $model = dailySecurity::model()->findByPk($id);
        $model->delete();       
    }
    
    /**
     * fungsi untuk mengubah status security laporan jadi status ACC
     *  contoh penggunaan :
     *                      pada laporan security tabel
     * @param type $id dari laporan security yang akan di ubha
     */
    public function actionAccSecurity ($id) {
        $model = dailySecurity::model()->findByPk($id);
        $model->status = vC::APP_status_laporan_approve;
        if ($model->save())        
        echo 'sukses update';
        else 
            print_r($model->getErrors());
    }
    
    public function actionLaporanSecurity () {
         //set page title
        $this->setPageTitle("Laporan Security Data");
        
        $model = new dailySecurity('search');
        $model->unsetAttributes();
        $listJenisNasabah = CHtml::listData(dailySecurityJenisNasabah::model()->findAll(),'jenis_nasabah_id','nama');
        
        if(isset($_GET['dailySecurity'])){
            $model->attributes=$_GET['dailySecurity'];
            }
        
        $this->render('searchSecurity',array(
            'model' => $model,
            'listJenisNasabah' => $listJenisNasabah,
        ));
    }
    
    // fungsi render print ke pdf untuk laporan security
    public function actionPrintsecurity () {
        $model = new dailySecurity('search');
        $model->unsetAttributes();
        
        $model->record_row = 10000;   
        $index = 0;
        $total = 0;
        $data = array();
        
        if(isset($_POST['dailySecurity'])){
            $model->attributes = $_POST['dailySecurity'];
            $dataProv = $model->search(); 
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total = $total + intval($record->jumlah);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'jenis_nasabah'=>$record->rJen->nama,                               
                                'nama_inputer'=>$record->nama_inputer,                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah,                                                                                
                        );                        
            }
            
        }
                        
        $model->jenis_nasabah = empty($model->jenis_nasabah)?' Semua Jenis ': $model->rJen->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        $this->render('printSecurity',array(
            'model' => $model,
            'data' => $data,
            'total' => $total,            
        ));
        
        
    }
    
    
    // halaman complete yang diakses semua elemen ketika selesai suatu proses
    public function actionComplete () {
        $this->render('complete');
    }
    
    
    public function actions() {
        return array(
            'getRowSec' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_sec',
                'modelClass' => 'dailySecurityArray'
            ),
            'getRowCS' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_cs',
                'modelClass' => 'dailyCsArray'
            ),
            'getRowTel' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_teller',
                'modelClass' => 'dailyTellerArray'
            ),
        );
    } 
    
}


