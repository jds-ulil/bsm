<?php

/**
 * This is the model class for table "nasabah_tolak_buku_nikah".
 *
 * The followings are the available columns in table 'nasabah_tolak_buku_nikah':
 * @property string $tolak_id
 * @property string $no_buku_nikah
 * @property string $tgl_buku_nikah
 */
class nasabahTolakBukuNikah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nasabah_tolak_buku_nikah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tolak_id, no_buku_nikah', 'length', 'max'=>50),
			array('tgl_buku_nikah', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tolak_id, no_buku_nikah, tgl_buku_nikah', 'safe', 'on'=>'search'),
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
			'tolak_id' => 'Tolak',
			'no_buku_nikah' => 'No Buku Nikah',
			'tgl_buku_nikah' => 'Tgl Buku Nikah',
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

		$criteria->compare('tolak_id',$this->tolak_id,true);
		$criteria->compare('no_buku_nikah',$this->no_buku_nikah,true);
		$criteria->compare('tgl_buku_nikah',$this->tgl_buku_nikah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return nasabahTolakBukuNikah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
