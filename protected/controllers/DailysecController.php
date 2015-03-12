<?php
/**
 * Description of DailyController
 *
 * @author oelhil@gmail.com
 * 20150701 - 
 * class controller untuk fasilitas daily activity
 */
class DailysecController extends Controller{
    //put your code here
    public $layout='//layouts/column2';
    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
				'actions'=>array('index',
                    ),
				'roles'=>array('approval'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('',
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
        $model=new dailySecurityJenisNasabah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['dailySecurityJenisNasabah']))
			$model->attributes=$_GET['dailySecurityJenisNasabah'];

		$this->render('index',array(
			'model'=>$model,
		));
    }       
    
}


