<?php

/**
 * This is the model class for table "daily_cs_kriteria_nasabah".
 *
 * The followings are the available columns in table 'daily_cs_kriteria_nasabah':
 * @property integer $cs_kriteria_nasabah_id
 * @property string $nama
 */
class dailyCsKriteriaNasabah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_cs_kriteria_nasabah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, rank', 'required'),
			array('cs_kriteria_nasabah_id', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>70),
            array('rank', 'length', 'max'=>2),
            array('rank', 'numerical'),
            array('rank', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cs_kriteria_nasabah_id, nama', 'safe', 'on'=>'search'),
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
			'cs_kriteria_nasabah_id' => 'Cs Kriteria Nasabah',
			'nama' => 'Nama',
            'rank' => 'Rank'
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

		$criteria->compare('cs_kriteria_nasabah_id',$this->cs_kriteria_nasabah_id);
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
	 * @return dailyCsKriteriaNasabah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
