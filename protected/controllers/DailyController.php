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
                    'inputBo','getRowBo','laporanBo', 'printBo',
                    'inputWm', 'getRowWm', 'laporanWm', 'printwm',
                    'inputSa','getRowSa','laporanSa', 'printsa',
                    ),
				'users'=>array('*'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'complete',
                    'deleteCs', 'accCs',
                    'deleteTel', 'accTel',
                    'deleteBo', 'accBo',
                    'deleteWm', 'accWm',
                    'deleteSa', 'accSa',
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
    public function actionInputWm () {
        //set page title
        $this->setPageTitle("Input Warung Mikro");
        
        $model = new dailyWm;
        $model_ = array(new dailyWmArray); 
        
        $listKriteriaNasabah = CHtml::listData(dailyWmKriteriaNasabah::model()->findAll('true order by rank asc'), 'wm_kriteria_nasabah_id', 'nama');        
        
        $valid_data = false;
        
        if(isset($_POST['dailyWm'])) {         
            $valid_data = true;
            $model->attributes = $_POST['dailyWm'];   
            $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;
                };
                
                if (!empty($model->start_rest) || !empty($model->end_rest)) {
                    if (empty($model->start_rest) || empty($model->end_rest)) {    
                            $model->addError('start_rest', 'Waktu harus di isi semua');
                            $model->addError('end_rest', 'Waktu harus di isi semua');
                            $valid_data = false;
                    }
                   }
        }// end if post dailyTeller
        
        if(isset($_POST['dailyWmArray'])) {            
            $valid_array = true;
            $model_ = array();            
            // add data from post to model
            foreach ($_POST['dailyWmArray'] as $key => $value) {     
                $model_each = new dailyWmArray;
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
            $valid_data = $valid_data == false ? $valid_data : $valid_array;
        }// end if post dailyTellerArray
        if($valid_data) {    
             $model->save();  
             
              if(!empty($model->start_rest) && !empty($model->end_rest)) {
                $model_rest = new dailyWm;
                $model_rest->tanggal = $model->tanggal;
                $model_rest->nama_pegawai = $model->nama_pegawai;
                $model_rest->jumlah_nasabah = 0;
                $model_rest->total = 0;
                $model_rest->kriteria_nasabah = 0;
                $model_rest->status = vC::APP_status_laporan_new;
                $model_rest->info = 'Waktu istirahat : '.$model->start_rest . ' SD ' . $model->end_rest;                
                if (
                $model_rest->save()){;}
                    else {print_r($model_rest->getErrors());}
            }
            
            if(!empty($model->se_read)) {
                $model_se = new dailyWm;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah_nasabah = 0;
                $model_se->total = 0;
                $model_se->kriteria_nasabah = 0;
                $model_se->info = 'SE yang dipahami/baca : '.$model->se_read;                
                $model_se->save();
            }
             
            foreach ($model_ as $key => $model_Each) {                  
                $model_Each->save();
            }
            $this->redirect(array('complete'));
        }// end if valid_data 
        $this->render('inputWm',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaNasabah' => $listKriteriaNasabah,
        ));
    }
    public function actionLaporanWm () {
        //set page title
        $this->setPageTitle("Laporan Warung Mikro");
        
        // new model daily with search as scenario
        $model = new dailyWm('search');
        $model->unsetAttributes();
        
        $listKriteriaNasabah = CHtml::listData(dailyWmKriteriaNasabah::model()->findAll(), 'wm_kriteria_nasabah_id', 'nama');
        
         if(isset($_GET['dailyWm'])){
            $model->attributes=$_GET['dailyWm'];
            }        
        
        $this->render('searchWm',array(
            'model' => $model,  
            'listKriteriaNasabah' => $listKriteriaNasabah,
        ));
    }
    public function actionDeleteWm ($id) {        
        $model = dailyWm::model()->findByPk($id);
        $model->delete(); 
    }
    public function actionAccWm ($id) {
        $model = dailyWm::model()->findByPk($id);
        $model->status = vC::APP_status_laporan_approve;
        if ($model->save())        
        echo 'sukses update';
        else 
            print_r($model->getErrors());
    } 
    public function actionPrintwm () {
        $model = new dailyWm('search');
        $model->unsetAttributes();
        
        $model->record_row = 10000;   
        $index = 0;
        $total_nasabah = 0;
        $total_setor = 0;
        $data = array();
        
        if(isset($_POST['dailyWm'])){
            $model->attributes = $_POST['dailyWm'];
            //$model->status = vc::APP_status_laporan_approve;
            $dataProv = $model->search();                         
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total_nasabah = $total_nasabah + intval($record->jumlah_nasabah);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'kriteria_nasabah'=>  empty($record->rKrit->nama)?"--" : $record->rKrit->nama,                               
                                'nama_pegawai'=>$record->nama_pegawai,                               
                                'no_kontak'=>$record->no_kontak,                                                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah_nasabah,                                                                                
                                'total'=>Yii::app()->numberFormatter->formatCurrency($record->total ,""),                                              
                        );                        
            }
            
        }
                        
        $model->kriteria_nasabah = empty($model->kriteria_nasabah)?' Semua Jenis ': $model->rKrit->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        $model->nama_pegawai = empty($model->nama_pegawai)?' Semua Pegawai ': $model->nama_pegawai;
        
        $kcp = mtbKcp::model()->find('id = 1');
        
        $this->render('printwm',array(
            'model' => $model,
            'data' => $data,
            'total_nasabah'=>$total_nasabah,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),  
            'kcp' => $kcp->nama,
        ));
    }
    
    public function actionInputSa () {
        //set page title
        $this->setPageTitle("Input Sales Assistant");
        
        $model = new dailySa;
        $model_ = array(new dailySaArray); 
        
        $listKriteriaNasabah = CHtml::listData(dailySaKriteriaNasabah::model()->findAll('true order by rank asc'), 'sa_kriteria_nasabah_id', 'nama');        
        
        $valid_data = false;
        
        if(isset($_POST['dailySa'])) {         
            $valid_data = true;
            $model->attributes = $_POST['dailySa'];   
            $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;
                };
                
                if (!empty($model->start_rest) || !empty($model->end_rest)) {
                    if (empty($model->start_rest) || empty($model->end_rest)) {    
                            $model->addError('start_rest', 'Waktu harus di isi semua');
                            $model->addError('end_rest', 'Waktu harus di isi semua');
                            $valid_data = false;
                    }
                   }
        }// end if post dailyTeller
        
        if(isset($_POST['dailySaArray'])) {            
            $valid_array = true;
            $model_ = array();            
            // add data from post to model
            foreach ($_POST['dailySaArray'] as $key => $value) {     
                $model_each = new dailySaArray;
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
            $valid_data = $valid_data == false ? $valid_data : $valid_array;
        }// end if post dailyTellerArray
        if($valid_data) {    
             $model->save();     
             
              if(!empty($model->start_rest) && !empty($model->end_rest)) {
                $model_rest = new dailySa;
                $model_rest->tanggal = $model->tanggal;
                $model_rest->nama_pegawai = $model->nama_pegawai;
                $model_rest->jumlah_nasabah = 0;
                $model_rest->total = 0;
                $model_rest->kriteria_nasabah = 0;
                $model_rest->status = vC::APP_status_laporan_new;
                $model_rest->info = 'Waktu istirahat : '.$model->start_rest . ' SD ' . $model->end_rest;                
                if (
                $model_rest->save()){;}
                    else {print_r($model_rest->getErrors());}
            }
            
            if(!empty($model->se_read)) {
                $model_se = new dailySa;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah_nasabah = 0;
                $model_se->total = 0;
                $model_se->kriteria_nasabah = 0;
                $model_se->info = 'SE yang dipahami/baca : '.$model->se_read;                
                $model_se->save();
            }
             
             
            foreach ($model_ as $key => $model_Each) {                  
                $model_Each->save();
            }
            $this->redirect(array('complete'));
        }// end if valid_data 
        $this->render('inputSa',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaNasabah' => $listKriteriaNasabah,
        ));
    }
    public function actionLaporanSa () {
        //set page title
        $this->setPageTitle("Laporan Sales Assistant");
        
        // new model daily with search as scenario
        $model = new dailySa('search');
        $model->unsetAttributes();
        
        $listKriteriaNasabah = CHtml::listData(dailySaKriteriaNasabah::model()->findAll(), 'sa_kriteria_nasabah_id', 'nama');
        
         if(isset($_GET['dailySa'])){
            $model->attributes=$_GET['dailySa'];
            }        
        
        $this->render('searchSa',array(
            'model' => $model,  
            'listKriteriaNasabah' => $listKriteriaNasabah,
        ));
    }
    public function actionDeleteSa ($id) {
        $model = dailySa::model()->findByPk($id);
        $model->delete(); 
    }
    public function actionAccSa ($id) {
        $model = dailySa::model()->findByPk($id);
        $model->status = vC::APP_status_laporan_approve;
        if ($model->save())        
        echo 'sukses update';
        else 
            print_r($model->getErrors());
    } 
    public function actionPrintSa () {
        $model = new dailySa('search');
        $model->unsetAttributes();
        
        $model->record_row = 10000;   
        $index = 0;
        $total_nasabah = 0;
        $total_setor = 0;
        $data = array();
        
        if(isset($_POST['dailySa'])){
            $model->attributes = $_POST['dailySa'];
           // $model->status = vc::APP_status_laporan_approve;
            $dataProv = $model->search();           
 
            
            foreach($dataProv->getData() as $record) {                                
                $index++;
                $total_nasabah = $total_nasabah + intval($record->jumlah_nasabah);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'kriteria_nasabah'=>  empty($record->rKrit->nama)?"--":$record->rKrit->nama,                               
                                'nama_pegawai'=>$record->nama_pegawai,                               
                                'segmen'=>$record->segmen,                               
                                'no_kontak'=>$record->no_kontak,                                                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah_nasabah,                                                                                
                                'total'=>Yii::app()->numberFormatter->formatCurrency($record->total ,""),                                              
                        );                        
            }
            
        }
                        
        $model->kriteria_nasabah = empty($model->kriteria_nasabah)?' Semua Jenis ': $model->rKrit->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        $model->nama_pegawai = empty($model->nama_pegawai)?' Semua Pegawai ': $model->nama_pegawai;
        
        $kcp = mtbKcp::model()->find('id = 1');
        
        $this->render('printsa',array(
            'model' => $model,
            'data' => $data,
            'total_nasabah'=>$total_nasabah,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),             
            'kcp' => $kcp->nama,
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
        
        $listKriteriaTransaksi = CHtml::listData(dailyBoKriteriaTransaksi::model()->findAll('hidden <> 1 order by rank asc'), 'jenis_transaksi_id', 'nama');
        $listProgress = CHtml::listData(dailyBoProgress::model()->findAll(), 'dbo_progress_id', 'nama');
        
        $valid_data = false;
        
        if(isset($_POST['dailyBo'])) {         
            $valid_data = true;
            $model->attributes = $_POST['dailyBo'];   
            $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;
                };
                
            if (!empty($model->start_rest) || !empty($model->end_rest)) {
                    if (empty($model->start_rest) || empty($model->end_rest)) {    
                            $model->addError('start_rest', 'Waktu harus di isi semua');
                            $model->addError('end_rest', 'Waktu harus di isi semua');
                            $valid_data = false;
                    }
                   }
        }// end if post dailyTeller
        
        if(isset($_POST['dailyBoArray'])) {
            
            $valid_array = true;
            $model_ = array();            
            // add data from post to model
            foreach ($_POST['dailyBoArray'] as $key => $value) {     
                $model_each = new dailyBoArray;
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
            $valid_data = $valid_data == false ? $valid_data : $valid_array;
        }// end if post dailyTellerArray
        if($valid_data) {    
             $model->save();            
            foreach ($model_ as $key => $model_Each) {                  
                $model_Each->save();
            }
            
            if(!empty($model->start_rest) && !empty($model->end_rest)) {
                $model_rest = new dailyBo;
                $model_rest->tanggal = $model->tanggal;
                $model_rest->nama_pegawai = $model->nama_pegawai;
                $model_rest->jumlah_transaksi = 0;
                $model_rest->total = 0;
                $model_rest->kriteria_transaksi = 0;
                $model_rest->status_transaksi = 1;
                $model_rest->status = vC::APP_status_laporan_new;
                $model_rest->info = 'Waktu istirahat : '.$model->start_rest . ' SD ' . $model->end_rest;                
                if (
                $model_rest->save()){;}
                    else {print_r($model_rest->getErrors());}
            }
            
            if(!empty($model->se_read)) {
                $model_se = new dailyBo;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah_transaksi = 0;
                $model_se->total = 0;
                $model_se->kriteria_transaksi = 0;                
                $model_se->status_transaksi = 1;
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = 'SE yang dipahami/baca : '.$model->se_read;                
                $model_se->save();
            }
            
            
                    
            if(!empty($model->kas_akhir)) {
                $model_se = new dailyBo;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah_transaksi = 0;
                $model_se->total = $model->kas_akhir;
                $model_se->kriteria_transaksi = 1;  
                 $model_se->status_transaksi = 1;
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = '';                
                $model_se->save();
            }
            if(!empty($model->mat_akhir)) {
                $model_se = new dailyBo;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah_transaksi = 0;
                $model_se->total = $model->mat_akhir;
                $model_se->kriteria_transaksi = 2;                
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = '';    
                 $model_se->status_transaksi = 1;
                $model_se->save();
            }
            if(!empty($model->rek_akhir)) {
                $model_se = new dailyBo;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah_transaksi = 0;
                $model_se->total = $model->rek_akhir;
                $model_se->kriteria_transaksi = 3;                
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = '';      
                $model_se->status_transaksi = 1;
                $model_se->save();
            }
            
            
            $this->redirect(array('complete'));
        }// end if valid_data 
        $this->render('inputBo',array(
            'model' => $model,
            'model_' => $model_,
            'listKriteriaTransaksi' => $listKriteriaTransaksi,
            'listProgress' => $listProgress,
        ));
        
    }
    
     public function actionLaporanBo() {
      //set page title
        $this->setPageTitle("Laporan Back Office");
        
        // new model daily with search as scenario
        $model = new dailyBo('search');
        $model->unsetAttributes();
        
        $listKriteriaTransaksi = CHtml::listData(dailyBoKriteriaTransaksi::model()->findAll(), 'jenis_transaksi_id', 'nama');
        
         if(isset($_GET['dailyBo'])){
            $model->attributes=$_GET['dailyBo'];
            }        
        
        $this->render('searchBo',array(
            'model' => $model,  
            'listKriteriaTransaksi' => $listKriteriaTransaksi,
        ));  
    }
    
    public function actionDeleteBo ($id) {
        $model = dailyBo::model()->findByPk($id);
        $model->delete();       
    }
    
    /**
     * ACC teler from report page
     * @param type $id
     */
    public function actionAccBo ($id) {
        $model = dailyBo::model()->findByPk($id);
        $model->status = vC::APP_status_laporan_approve;
        if ($model->save())        
        echo 'sukses update';
        else 
            print_r($model->getErrors());
    }
    
    public function actionPrintBo () {
        $model = new dailyBo('search');
        $model->unsetAttributes();
        
        $model->record_row = 10000;   
        $index = 0;
        $total_transaksi = 0;
        $total_setor = 0;
        $data = array();
        
        if(isset($_POST['dailyBo'])){
            $model->attributes = $_POST['dailyBo'];
            //$model->status = vc::APP_status_laporan_approve;
            $dataProv = $model->search();                         
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total_transaksi = $total_transaksi + intval($record->jumlah_transaksi);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),                    
                                'kriteria_transaksi'=>  empty($record->rKrit->nama)?"--":$record->rKrit->nama,                               
                                'nama_pegawai'=>$record->nama_pegawai,                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah_transaksi,                                                                                
                                'status_transaksi'=>$record->rStTr->nama,                                                                               
                                'total'=>Yii::app()->numberFormatter->formatCurrency($record->total ,""),                                              
                        );                        
            }            
            
        }
                        
        $model->kriteria_transaksi = empty($model->kriteria_transaksi)?' Semua Jenis ': $model->rKrit->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        $model->nama_pegawai = empty($model->nama_pegawai)?' Semua Pegawai ': $model->nama_pegawai;
        
        $kcp = mtbKcp::model()->find('id = 1');
        
        $this->render('printbo',array(
            'model' => $model,
            'data' => $data,
            'total_transaksi'=>$total_transaksi,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),  
            'kcp' => $kcp->nama,
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
        
        $listKriteriaTransaksi = CHtml::listData(dailyTellerKriteriaTransaksi::model()->findAll('hidden <> 1 order by rank asc'), 'jenis_transaksi_id', 'nama');
        
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
            $valid_data = $valid_data == false ? $valid_data : $valid_array;
        }// end if post dailyTellerArray
        if($valid_data) {    
            //save main
            $model->save();
            
            foreach ($model_ as $key => $model_Each) {                  
                $model_Each->save();
            }
            
            if(!empty($model->teller_akhir)) {
                $model_se = new dailyTeller;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah = 0;
                $model_se->total = $model->teller_akhir;
                $model_se->kriteria_transaksi = 1;                
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = '';                
                $model_se->save();
            }
            if(!empty($model->atm_akhir)) {
                $model_se = new dailyTeller;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah = 0;
                $model_se->total = $model->atm_akhir;
                $model_se->kriteria_transaksi = 3;                
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = '';                
                $model_se->save();
            }
            if(!empty($model->khasanah_akhir)) {
                $model_se = new dailyTeller;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah = 0;
                $model_se->total = $model->khasanah_akhir;
                $model_se->kriteria_transaksi = 2;                
                $model_se->status = vc::APP_status_laporan_new;
                $model_se->info = '';                
                $model_se->save();
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
           // $model->status = vc::APP_status_laporan_approve;
            $dataProv = $model->search();                         
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total_nasabah = $total_nasabah + intval($record->jumlah);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'kriteria_transaksi'=> empty($record->rKrit->nama)?"Deleted":$record->rKrit->nama,                               
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
        
        $kcp = mtbKcp::model()->find('id = 1');
        
        $this->render('printtel',array(
            'model' => $model,
            'data' => $data,
            'total_nasabah'=>$total_nasabah,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),  
            'kcp' => $kcp->nama,
        ));
   
        
    }
    
    /**
     * diakses ketika pertama mau input lap daily activity khusus CS
     * 
     */
    public function actionInputCS () {
        //set page title
        $this->setPageTitle("Input Customer Service Data");
        
        $model = new dailyCs;
        $model_ = array (new dailyCsArray);
        
        $listKriteriaNasabah = CHtml::listData(dailyCsKriteriaNasabah::model()->findAll('true order by rank asc'), 'cs_kriteria_nasabah_id', 'nama');
        
        $valid_data = false;
        
        if(isset($_POST['dailyCs'])){
            $valid_data = true;
            $model->attributes = $_POST['dailyCs'];   
            $model->status = vC::APP_status_laporan_new;
                // check input validasi
                if(!$model->validate()){
                   $valid_data = false;                                                         
                };
                if (!empty($model->start_rest) || !empty($model->end_rest)) {
                    if (empty($model->start_rest) || empty($model->end_rest)) {    
                            $model->addError('start_rest', 'Waktu harus di isi semua');
                            $model->addError('end_rest', 'Waktu harus di isi semua');
                            $valid_data = false;
                    }
                   }
        }
        if(isset($_POST['dailyCsArray'])){
             // let false again  
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
            $valid_data = $valid_data == false ? $valid_data : $valid_array;
        }        
        
        if($valid_data) {            
            //save main
            $model->save();  
            
            if(!empty($model->start_rest) && !empty($model->end_rest)) {
                $model_rest = new dailyCs;
                $model_rest->tanggal = $model->tanggal;
                $model_rest->nama_pegawai = $model->nama_pegawai;
                $model_rest->jumlah = 0;
                $model_rest->total = 0;
                $model_rest->kriteria_nasabah = 0;
                $model_rest->status = vC::APP_status_laporan_new;
                $model_rest->info = 'Waktu istirahat : '.$model->start_rest . ' SD ' . $model->end_rest;                
                if (
                $model_rest->save()){;}
                    else {print_r($model_rest->getErrors());}
            }
            
            if(!empty($model->se_read)) {
                $model_se = new dailyCs;
                $model_se->tanggal = $model->tanggal;
                $model_se->nama_pegawai = $model->nama_pegawai;
                $model_se->status = vC::APP_status_laporan_new;
                $model_se->jumlah = 0;
                $model_se->total = 0;
                $model_se->kriteria_nasabah = 0;
                $model_se->info = 'SE yang dipahami/baca : '.$model->se_read;                
                $model_se->save();
            }
            
            
            
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
            //$model->status = vc::APP_status_laporan_approve;
            $dataProv = $model->search();                         
            
            foreach($dataProv->getData() as $record) {
                $index++;
                $total_nasabah = $total_nasabah + intval($record->jumlah);
                $total_setor = $total_setor + intval($record->total);
                $data[]=array(  'index'=>$index,
                                'tanggal'=>Yii::app()->numberFormatter->formatDate($record->tanggal),
                                'kriteria_nasabah'=>  empty($record->rKrit->nama)?"--" : $record->rKrit->nama,                               
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
        
        $kcp = mtbKcp::model()->find('id = 1');
        
        $this->render('printcs',array(
            'model' => $model,
            'data' => $data,
            'total_nasabah'=>$total_nasabah,        
            'total_setor'=>Yii::app()->numberFormatter->formatCurrency($total_setor ,""),     
            'kcp' => $kcp->nama,
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
        
        $listJenisNasabah = CHtml::listData(dailySecurityJenisNasabah::model()->findAll('true order by rank asc'),'jenis_nasabah_id','nama');
        
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
            $valid_data = $valid_data == false ? $valid_data : $valid_array;
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
                                'jenis_nasabah'=>empty($record->rJen->nama)?"Deleted":$record->rJen->nama,                               
                                'nama_inputer'=>$record->nama_inputer,                               
                                'info'=>$record->info,                                                                                
                                'jumlah'=>$record->jumlah,                                                                                
                        );                        
            }
            
        }
                        
        $model->jenis_nasabah = empty($model->jenis_nasabah)?' Semua Jenis ': $model->rJen->nama;
        $model->from_date = empty($model->from_date)?' - ':Yii::app()->numberFormatter->formatDate($model->from_date);
        $model->to_date = empty($model->to_date)?' - ':Yii::app()->numberFormatter->formatDate($model->to_date);        
        
        $kcp = mtbKcp::model()->find('id = 1');
        
        $this->render('printSecurity',array(
            'model' => $model,
            'data' => $data,
            'total' => $total,
            'kcp' => $kcp->nama,
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
                'list' => 1,
                'modelClass' => 'dailySecurityArray'
            ),
            'getRowCS' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_cs',
                'list' => 2,
                'modelClass' => 'dailyCsArray'
            ),
            'getRowTel' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_teller',
                'list' => 3,
                'modelClass' => 'dailyTellerArray'
            ),
            'getRowBo' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_bo',
                'list' => 4,
                'modelClass' => 'dailyBoArray'
            ),
            'getRowSa' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_sa',
                'list' => 6,
                'modelClass' => 'dailySaArray'
            ),
            'getRowWm' => array(
                'class' => 'ext.ddynamictabularform.actions.GetRowForm',
                'view' => '_form_wm',
                'list' => 5,
                'modelClass' => 'dailyWmArray'
            ),
        );
    } 
    
}


