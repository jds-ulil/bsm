<?php
/**
 * Description of DailyController
 *
 * @author oelhyl@gmail.com
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
                    'inputSecurity', 'laporanSecurity', 'getRowSec',
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
     * diakses ketika pertama mau input lap daily activity khusus security
     * 
     */
    public function actionInputSecurity () {
        //set page title
        $this->setPageTitle("Input Security Data");
        
        $model = new dailySecurity('create');
        $model_ = array (new dailySecurity);   
        // jika form submit 
        if(isset($_POST['dailySecurity'])){
                $model->attributes = $_POST['dailySecurity'];   
                // check input validasi
                if($model->validate()){
                    if($model->save()){
                        $this->redirect(array('complete'));
                    }
                };
         }
        
        $this->render('inputSecurity',array(
			'model' => $model,
			'model_' => $model_,
		));
    }
    
    
    public function actionLaporanSecurity () {
         //set page title
        $this->setPageTitle("Laporan Security Data");
        
        $model = new dailySecurity('search');
        
        $this->render('searchSecurity');
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
                'modelClass' => 'dailySecurity'
            ),
        );
    } 
    
}


