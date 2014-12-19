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
        $check_proposal = 5;
        $check_pelunasan = 3;
        $check_watchlist = 3;
        /**
         * check variable for naspoma (5)
         *  nama
         *  no_rekening
         *  no_identitas
         *  no_kartu_keluarga
         *  no_buku_nikah
         */        
        $check_naspoma = 5;
        $stop = 1;
        $var_pro = '';
        
        $model_proposal = new proposal;
        $model_pelunasan = new pelunasan;      
        $model_watchlist = new watchlist;
        // init model naspoma
        $model_naspoma = new naspoma;
        
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
            $var_pro = '';
            
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
            
            $stop = 1;
            $var_pro = '';
            
            while ($stop != $check_watchlist) {
                $var_pro = watchlist::model()->searchfromglobal($model_search->search_name, $stop);   
                if (!empty($var_pro)) {
                    $stop = $check_watchlist;
                } else {
                    $stop +=1;
                }              
                $model_watchlist->sKeyword = $var_pro;
                $model_watchlist->sValue = $model_search->search_name;                
            } 
            
            //reinit stop and var_pro
            $stop = 1;
            //variable search
            $var_pro = '';
            // checking for naspoma
            while ($stop !=  $check_naspoma) {
                $var_pro = naspoma::model()->searchfromglobal($model_search->search_name, $stop);
                if (!empty($var_pro)) {
                    $stop = $check_naspoma;
                } else {
                    $stop +=1;
                }
                $model_naspoma->sKeyword = $var_pro;
                $model_naspoma->sValue = $model_search->search_name;
            }
        }
        $this->render('index', array(
            'model_search' => $model_search,
            'model_proposal' => $model_proposal,
            'model_pelunasan' => $model_pelunasan,
            'model_watchlist' => $model_watchlist,
            'model_naspoma' => $model_naspoma,
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