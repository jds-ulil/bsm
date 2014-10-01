<?php

/**
 * This is the model class for table "error_nasabah".
 *
 * The followings are the available columns in table 'error_nasabah':
 * @property integer $error_id
 * @property string $jenis_error
 * @property string $total
 * @property string $no_ktp
 * @property string $no_buku_nikah
 */
class errorNasabah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'error_nasabah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jenis_error', 'length', 'max'=>2),
			array('total', 'length', 'max'=>3),
			array('no_proposal', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('error_id, jenis_error, total,', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'error_id' => 'Error',
			'jenis_error' => 'Jenis Error',
			'total' => 'Total',
			'no_prosal' => 'No Proposal',			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('error_id',$this->error_id);
		$criteria->compare('jenis_error',$this->jenis_error,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('no_proposal',$this->no_proposal,true);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return errorNasabah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public static function getTotalNasabahTolak($value){
            $query1 = "SELECT total FROM error_nasabah
                        WHERE no_proposal = '".$value."'";                        
            $count=Yii::app()->db->createCommand($query1)->queryScalar();            
            return $count==null?0:$count;
        }
        public static function setTotalNasabahTolak($value){
            $model = errorNasabah::model()->find("no_proposal = '".$value."'");
            if (empty($model)) {
                $model = new errorNasabah;
                $model->jenis_error = vC::APP_nasabah_error_tolak;
                $model->total = 0;
                $model->no_proposal = $value;
                $model->save();
            }
            $model->total+=1;            
            $model->save();                        
        }
}
