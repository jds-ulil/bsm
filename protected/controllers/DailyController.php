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
                    'inputCS', 'getRowCS',
                    ),
				'users'=>array('*'),
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
     * diakses ketika pertama mau input lap daily activity khusus CS
     * 
     */
    public function actionInputCS () {
        //set page title
        $this->setPageTitle("Input Security Data");
        
        $model = new dailyCs;
        $model_ = array (new dailyCs);
        
        $listKriteriaNasabah = CHtml::listData(dailyCsKriteriaNasabah::model()->findAll(), 'cs_kriteria_nasabah_id', 'nama');
        
        $valid_data = false;
        
        $this->render('inputCS',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaNasabah' => $listKriteriaNasabah,
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
        );
    } 
    
}


