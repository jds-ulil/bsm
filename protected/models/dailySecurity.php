<?php

/**
 * This is the model class for table "daily_security".
 *
 * The followings are the available columns in table 'daily_security':
 * @property integer $daily_security_id
 * @property string $nama_inputer
 * @property integer $teler_jumlah
 * @property string $teler_info
 * @property integer $cs_jumlah
 * @property string $cs_info
 * @property integer $marketing_jumlah
 * @property string $marketing_info
 * @property integer $mikro_jumlah
 * @property string $mikro_info
 * @property integer $gadai_jumlah
 * @property string $gadai_info
 * @property string $lain_jumlah
 * @property string $lain_info
 * @property string $tanggal
 */
class dailySecurity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_security';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(			
			array('daily_security_id, teler_jumlah, cs_jumlah, marketing_jumlah, mikro_jumlah, gadai_jumlah', 'numerical', 'integerOnly'=>true),
			array('nama_inputer, teler_info, cs_info, marketing_info, mikro_info, gadai_info, lain_info', 'length', 'max'=>100),
			array('lain_jumlah', 'length', 'max'=>5),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daily_security_id, nama_inputer, teler_jumlah, teler_info, cs_jumlah, cs_info, marketing_jumlah, marketing_info, mikro_jumlah, mikro_info, gadai_jumlah, gadai_info, lain_jumlah, lain_info, tanggal', 'safe', 'on'=>'search'),
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
			'daily_security_id' => 'Daily Security',
			'nama_inputer' => 'Nama Inputer',
			'teler_jumlah' => 'Teler Jumlah',
			'teler_info' => 'Teler Info',
			'cs_jumlah' => 'Cs Jumlah',
			'cs_info' => 'Cs Info',
			'marketing_jumlah' => 'Marketing Jumlah',
			'marketing_info' => 'Marketing Info',
			'mikro_jumlah' => 'Mikro Jumlah',
			'mikro_info' => 'Mikro Info',
			'gadai_jumlah' => 'Gadai Jumlah',
			'gadai_info' => 'Gadai Info',
			'lain_jumlah' => 'Lain Jumlah',
			'lain_info' => 'Lain Info',
			'tanggal' => 'Tanggal',
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

		$criteria->compare('daily_security_id',$this->daily_security_id);
		$criteria->compare('nama_inputer',$this->nama_inputer,true);
		$criteria->compare('teler_jumlah',$this->teler_jumlah);
		$criteria->compare('teler_info',$this->teler_info,true);
		$criteria->compare('cs_jumlah',$this->cs_jumlah);
		$criteria->compare('cs_info',$this->cs_info,true);
		$criteria->compare('marketing_jumlah',$this->marketing_jumlah);
		$criteria->compare('marketing_info',$this->marketing_info,true);
		$criteria->compare('mikro_jumlah',$this->mikro_jumlah);
		$criteria->compare('mikro_info',$this->mikro_info,true);
		$criteria->compare('gadai_jumlah',$this->gadai_jumlah);
		$criteria->compare('gadai_info',$this->gadai_info,true);
		$criteria->compare('lain_jumlah',$this->lain_jumlah,true);
		$criteria->compare('lain_info',$this->lain_info,true);
		$criteria->compare('tanggal',$this->tanggal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailySecurity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
