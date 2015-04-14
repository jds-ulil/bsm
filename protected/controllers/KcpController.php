<?php

class KcpController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('set', 'update'),
				'roles'=>array('approval'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionSet() {
             //set page title
        $this->setPageTitle("Setting KCP");
        
        // new model daily with search as scenario
        $model = new mtbKcp('search');
        $model->unsetAttributes();
        
        $this->render('index',array(
            'model' => $model,             
        ));
        
        }
        
        public function actionUpdate ($id) {
            $model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['mtbKcp']))
            {
                $model->attributes=$_POST['mtbKcp'];
                if($model->save())
                    $this->redirect(array('set'));
            }

		$this->render('update',array(
			'model'=>$model,
		));
        }
        
        public function loadModel($id)
        {
            $model= mtbKcp::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
        }

}
