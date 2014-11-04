<?php

class SearchController extends Controller
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
			array('allow',  // deny all users
                'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    public function actionIndex() {
        $model_search = new search;
        $check_proposal = 3;
        $stop = 1;
        $var_pro = '';
        if(isset($_GET['search'])){
            $model_search->attributes = $_GET['search'];
            
            while ($stop != $check_proposal) {
                $var_pro = proposal::model()->searchfromglobal($model_search->search_name, $stop);   
                if (!empty($var_pro)) {
                    $stop = $check_proposal;
                } else {
                    $stop +=1;
                }
            }                                                
            echo("<script>alert('$var_pro');</script>");
        }
        $this->render('index', array(
            'model_search' => $model_search,
        ));
    }
}