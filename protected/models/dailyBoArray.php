<?php

/**
 * This is the model class for table "daily_bo".
 *
 * The followings are the available columns in table 'daily_bo':
 * @property integer $daily_bo_id
 * @property integer $jt_status
 * @property double $total
 * @property string $nama_pegawai
 * @property string $info
 * @property string $tanggal
 * @property integer $status
 */
class dailyBoArray extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_bo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jt_status, status', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('nama_pegawai', 'length', 'max'=>70),
			array('info, tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daily_bo_id, jt_status, total, nama_pegawai, info, tanggal, status', 'safe', 'on'=>'search'),
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
			'daily_bo_id' => 'Daily Bo',
			'jt_status' => 'Jt Status',
			'total' => 'Total',
			'nama_pegawai' => 'Nama Pegawai',
			'info' => 'Info',
			'tanggal' => 'Tanggal',
			'status' => 'Status',
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

		$criteria->compare('daily_bo_id',$this->daily_bo_id);
		$criteria->compare('jt_status',$this->jt_status);
		$criteria->compare('total',$this->total);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailyBoArray the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
