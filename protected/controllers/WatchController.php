<?php

class WatchController extends Controller
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
				'actions'=>array('input','edit','save','complete'),
				'roles'=>array('inputter'),
			),							
			array('allow',  // deny all users
                                'actions'=>array('updateAttribute','report','delete','detail','print','deleteByDate', 'updateByDate'
                                    ,'updateAttributeReal'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function actions() {
        return array(
            'updateAttribute' => array(
                'class' => 'application.extensions.EJEditable.actions.UpdateAttributeAction',
            ),
            'updateAttributeReal' => array(
                'class' => 'application.extensions.EJEditable.actions.UpdateAttributeActionReal',
            ),
        );
    } 
    
    public function actionPrint(){        
        $data = array();
        $index = 0;
        $unitKerja = array();
        $total = 0;
        
        $model = new watchlist('search');
        $model->unsetAttributes();
        
        if(isset($_POST['watchlist'])) {
            $model->attributes = $_POST['watchlist'];
            $dataProv = $model->search_print();
             
            foreach($dataProv->getData() as $record) {
                $index++;
                $total = $total + $record->os_pokok;
                $data[]=array(  'index'=>$index,
                                'nama_nasabah'=>$record->nama_nasabah,
                                'kolektibilitas'=>$record->kolektibilitas,
                                'total_tunggakan'=>Yii::app()->numberFormatter->formatCurrency($record->total_tunggakan,""),
                                'os_pokok'=>Yii::app()->numberFormatter->formatCurrency($record->os_pokok,""),                           
                        );
            }
        }
        $total = Yii::app()->numberFormatter->formatCurrency($total,"");
        if(!empty($model->unit_kerja)) {
            $unitKerja = array($model->unit_kerja);
        }
        $model->from_plafon = empty($model->from_plafon)?' - ':Yii::app()->numberFormatter->formatCurrency($model->from_plafon,"Rp ");
        $model->to_plafon = empty($model->to_plafon)?' - ':Yii::app()->numberFormatter->formatCurrency($model->to_plafon,"Rp ");
        $model->from_os = empty($model->from_os)?' - ':Yii::app()->numberFormatter->formatCurrency($model->from_os,"Rp ");
        $model->to_os = empty($model->to_os)?' - ':Yii::app()->numberFormatter->formatCurrency($model->to_os,"Rp ");        
        $model->from_persen = empty($model->from_persen)?' - ':$model->from_persen;
        $model->to_persen = empty($model->to_persen)?' - ':$model->to_persen;        
        $model->kolektibilitas = empty($model->kolektibilitas)?' - ':$model->kolektibilitas;        
        
        $this->render('print',array(
            'model' => $model,
            'data' => $data,
            'unitKerja' => $unitKerja,
            'total' => $total,
        ));
    }
    
    public function actionReport(){
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.mask.js',
                CClientScript::POS_END);
                
        $model = new watchlist;
        $listUnit = CHtml::listData(unitkerja::model()->findAll(), 'nama', 'nama');                         
        if(isset($_GET['watchlist'])){
                $model->attributes=$_GET['watchlist'];
                }
        if (isset($_POST['DeleteButton'])) {
            if (isset($_POST['selectedIds']))
            {
                foreach ($_POST['selectedIds'] as $id)
                {
                    $model_watchlist = $this->loadModel($id);
                    $model_watchlist->delete();
                }
            }
        }
        $this->render('report',array(
            'model' => $model,
            'listUnit' => $listUnit,
        ));
    }
    
    public function actionDetail($id){
         $model = $this->loadModel($id);   
         $this->render('detail',array('model'=>$model));
    }
    
    public function actionDelete($id){
        $model = $this->loadModel($id);   
        $model->delete();
    }
    
    public function actionComplete(){
        $this->render('complete');
    }
    public function actionSave(){
        $model_temp = new watchlistTemp;
        $dataProv = $model_temp->search_save(); 
        
        foreach($dataProv->getData() as $record) {                
            $model = new watchlist;
            $model->no_loan = $record->no_loan;
            $model->nama_nasabah = $record->nama_nasabah;
            $model->total_tunggakan = str_replace('.', '', $record->total_tunggakan);
            $model->kolektibilitas = $record->kolektibilitas;
            $model->jenis_produk = $record->jenis_produk;
            $model->no_CIF = $record->no_CIF;
            $model->no_rekening_angsuran = $record->no_rekening_angsuran;
            $model->plafon = str_replace('.', '', $record->plafon);
            $model->os_pokok = str_replace('.', '', $record->os_pokok);
            $model->angsuran_bulanan = str_replace(',', '', $record->angsuran_bulanan);
            $model->persentase_bagi_hasil = $record->persentase_bagi_hasil;
            $model->usaha_nasabah = $record->usaha_nasabah;
            $model->tujuan_pembiayaan = $record->tujuan_pembiayaan;
            $model->marketing = $record->marketing;
            $model->tgl_upload = $record->tgl_upload;
            if(!$model->save()) {
                print_r($model->getErrors());
                break;
            }
        }
       Yii::app()->db->createCommand()->truncateTable(watchlistTemp::model()->tableName()); 
       $this->redirect(array('complete'));
    }
    
    public function actionEdit() {
        $this->layout = "widthpage";
        $model_temp = new watchlistTemp;
        $this->render('edit',array(
            'model_temp' => $model_temp,
        ));
    }
    
    public function actionDeleteByDate ($date) {
        $date = $this->toDBDate($date);      
        
        watchlist::model()->deleteAll('`tgl_upload` = :tgl_upload',array(
            ':tgl_upload'=>$date));        
    }
    
    public function actionUpdateByDate ($date) {
        
        $date = $this->toDBDate($date); 
        $model = new watchlist("search");
        $model->tgl_upload = $date;
        $this->render('edit_date',array(
            'model'=>$model,
        ));       
    }
            
    public function actionInput(){
        
        $model = new watchlist();
        $model_search = new watchlist();
        if(isset($_POST['watchlist']))
            {    
              $model->attributes=$_POST['watchlist'];
            
              $filelist= CUploadedFile::getInstance($model,'w_file');
              $arrData = array();
              $index = 0;
              if($model->validate()){                 
                    Yii::app()->db->createCommand()->truncateTable(watchlistTemp::model()->tableName());                   
                    $fp = fopen($filelist->tempName, 'r');
                    if($fp)
                    {
                        //  $line = fgetcsv($fp, 1000, ",");
                        //  print_r($line); exit;
                        
                     do {
                        if ($index < vc::APP_header_csv_row) {                        
                            $index++;
                            continue;
                        } else {
                            $index++;
                        }   
                        $data = str_replace(',"', "|", $line[0]);                        
                        $data = str_replace('"', "", $data);                        
                        $arrLine = explode("|", $data);
                        $model_temp = new watchlistTemp();
                        //remove pd on loan
                        $model_temp->no_loan = substr($arrLine[0], 2);                        
                        $model_temp->nama_nasabah = $arrLine[1];
                        $model_temp->total_tunggakan = $arrLine[4];
                        $model_temp->kolektibilitas = $arrLine[5];
                        $model_temp->jenis_produk = $arrLine[6];
                        
                        if(isset($arrLine[7]))
                        $model_temp->no_CIF = $arrLine[7];
                        if(isset($arrLine[8]))
                        $model_temp->no_rekening_angsuran = $arrLine[8];
                        if(isset($arrLine[9]))
                        $model_temp->plafon = $arrLine[9];
                        if(isset($arrLine[10]))
                        $model_temp->os_pokok = $arrLine[10];
                        if(isset($arrLine[11]))
                        $model_temp->angsuran_bulanan = $arrLine[11];
                        if(isset($arrLine[12]))
                        $model_temp->persentase_bagi_hasil = $arrLine[12];
                        if(isset($arrLine[13]))
                        $model_temp->usaha_nasabah = $arrLine[13];
                        if(isset($arrLine[14]))
                        $model_temp->tujuan_pembiayaan = $arrLine[14];
                        
                        $model_temp->marketing = Yii::app()->user->id_pegawai;
                        
                        if(isset($model->tgl_upload))
                        $model_temp->tgl_upload = $this->toDBDate($model->tgl_upload);
                        
                        $model_temp->save();
                        $arrData[] = $arrLine;                                                
                        }while( ($line = fgetcsv($fp, 1000, ";")) != FALSE);
                       // $this->redirect('././index');
                    fclose($fp);
                    }}    
                    $this->redirect(array('edit'));
                    return;
            }  
            $this->render('input',array(
                'model'=>$model,  
                'model_search' => $model_search,
                ));
    }
    
      public function loadModel($id)
	{
		$model= watchlist::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    function toDBDate($date){            
            $data = explode('/',$date);
            $value = '';
            $lenght = count($data)-1;
            if (!empty($data)) {                
                for($i=$lenght;$i>=0;$i--) {                    
                    if($i != 0){
                        $value  .= $data[$i].'-';
                    } else {
                        $value  .= $data[$i];
                    }
                }
            }    
            return $value;
        }
}