<?php

/**
 * This is the model class for table "daily_security_jenis_nasabah".
 *
 * The followings are the available columns in table 'daily_security_jenis_nasabah':
 * @property integer $jenis_nasabah_id
 * @property string $nama
 */
class dailySecurityJenisNasabah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_security_jenis_nasabah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'length', 'max'=>100),
            array('rank', 'unique'),
            array('rank, nama', 'required'),
            array('rank', 'numerical'),            
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('jenis_nasabah_id, nama', 'safe', 'on'=>'search'),
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
			'jenis_nasabah_id' => 'Jenis Nasabah',
			'nama' => 'Nama',
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

		$criteria->compare('jenis_nasabah_id',$this->jenis_nasabah_id);
		$criteria->compare('nama',$this->nama,true);
        
        $criteria->order = 'rank ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailySecurityJenisNasabah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
