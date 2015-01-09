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
	public $layout='//layouts/column1';

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
				'actions'=>array('input','inputSecurity'),
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
    public function actionInput () {
        $this->render('input',array(
			
		));
    }
    
    /**
     * diakses ketika pertama mau nge load form security
     * 
     */
    public function actionInputSecurity () {
        $this->layout='empty';
        $this->render('input_security',array(
			
		));
    }
    
    /**
     * fungsi pemrosesan aksi save yang terdiri dari
     *  -pengecekan input
     *  -simpan data jika input sukses smua
     */
    public function actionSaveSecurity () {
        $model = new dailySecurity();
        
        // get from post values
        $model->nama_inputer = $_POST['namaInputer'];
        
        $model->teler_jumlah = $_POST['telerJumlah'];
        $model->teler_info = $_POST['telerInfo'];
        
        $model->cs_jumlah = $_POST['CSJumlah'];
        $model->cs_info = $_POST['CSInfo'];
        //marketing
        $model->cs_jumlah = $_POST['CSJumlah'];
        $model->cs_info = $_POST['CSInfo'];
        //mikro
        $model->cs_jumlah = $_POST['CSJumlah'];
        $model->cs_info = $_POST['CSInfo'];
        //gadai
        $model->cs_jumlah = $_POST['CSJumlah'];
        $model->cs_info = $_POST['CSInfo'];
        //lain
        $model->cs_jumlah = $_POST['CSJumlah'];
        $model->cs_info = $_POST['CSInfo'];
        
        
    }
}


