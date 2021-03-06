<?php

class PegawaiController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'update', 'index', 'view', 'delete',),
				'roles'=>array('admin',),
			),
                        array('allow',
                                'actions'=>array('autocompletePegawai'),
                                'users'=>array('@'),
                            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionAutocompletePegawai() {
            $res =array();

        if (isset($_GET['term'])) {
            $sql = 'SELECT peg.nama AS label,peg.NIP , jab.nama_jabatan AS jabatan, peg.no_handphone, peg.pegawai_id FROM mtb_pegawai peg 
                INNER JOIN mtb_jabatan as jab ON  jab.id_jabatan = peg.jabatan ';
            $sql = $sql . ' WHERE peg.`nama` LIKE :nama'; // Must be at least 1
            $command =Yii::app()->db->createCommand($sql);
            $command->bindValue(":nama", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            echo json_encode ($command->queryAll());
        }
    }
	public function actionCreate()
	{
		$model=new pegawai('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$list = CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan');
		$listUnit = CHtml::listData(unitkerja::model()->findAll(), 'unit_kerja_id', 'nama');
		$listLevel = CHtml::listData(levelJabatan::model()->findAll(), 'level_jabatan_id', 'nama_jabatan');
        
		if(isset($_POST['pegawai']))
		{
			$model->attributes=$_POST['pegawai'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pegawai_id));
		}

		$this->render('create',array(
                    'model'=>$model,
                    'list'=>$list,
                    'listUnit'=>$listUnit,
                    'listLevel'=>$listLevel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
               // $model->scenario = 'update';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $list = CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan');
		$listUnit = CHtml::listData(unitkerja::model()->findAll(), 'unit_kerja_id', 'nama');
        $listLevel = CHtml::listData(levelJabatan::model()->findAll(), 'level_jabatan_id', 'nama_jabatan');
                
		if(isset($_POST['pegawai']))
		{
			$model->attributes=$_POST['pegawai'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pegawai_id));
		}

		$this->render('update',array(
                    'model'=>$model,
                    'list'=>$list,
                    'listUnit'=>$listUnit,
                    'listLevel'=>$listLevel,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new pegawai('search');
		$model->unsetAttributes();  // clear any default values
                
        $list = CHtml::listData(Jabatan::model()->findAll(), 'nama_jabatan', 'nama_jabatan');
		$listUnit = CHtml::listData(unitkerja::model()->findAll(), 'unit_kerja_id', 'nama');
        $listLevel = CHtml::listData(levelJabatan::model()->findAll(), 'level_jabatan_id', 'nama_jabatan');
                
		if(isset($_GET['pegawai']))
			$model->attributes=$_GET['pegawai'];

		$this->render('index',array(
                	'model'=>$model,
                    'list'=>$list,
                    'listUnit'=>$listUnit,
                    'listLevel'=>$listLevel,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new pegawai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['pegawai']))
			$model->attributes=$_GET['pegawai'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=pegawai::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pegawai-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
