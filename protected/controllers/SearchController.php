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
        $check_proposal = 6;
        $check_pelunasan = 2;
        $stop = 1;
        $var_pro = '';
        
        $model_proposal = new proposal;
        $model_pelunasan = new pelunasan;      
        
        if(isset($_GET['search'])){
            $model_search->attributes = $_GET['search'];
            
            while ($stop != $check_proposal) {
                $var_pro = proposal::model()->searchfromglobal($model_search->search_name, $stop);   
                if (!empty($var_pro)) {
                    $stop = $check_proposal;
                } else {
                    $stop +=1;
                }              
                $model_proposal->sKeyword = $var_pro;
                $model_proposal->sValue = $model_search->search_name;
                
            }     
            $stop = 1;
            while ($stop != $check_pelunasan) {
                $var_pro = pelunasan::model()->searchfromglobal($model_search->search_name, $stop);   
                if (!empty($var_pro)) {
                    $stop = $check_pelunasan;
                } else {
                    $stop +=1;
                }              
                $model_pelunasan->sKeyword = $var_pro;
                $model_pelunasan->sValue = $model_search->search_name;                
            }                                                           
        }
        $this->render('index', array(
            'model_search' => $model_search,
            'model_proposal' => $model_proposal,
            'model_pelunasan' => $model_pelunasan,
        ));
    }
    
    protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='search-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}