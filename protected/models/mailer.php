<?php

/**
 * This is the model class for table "mtb_mailer".
 *
 * The followings are the available columns in table 'mtb_mailer':
 * @property integer $mail_id
 * @property string $host
 * @property string $username
 * @property string $password
 * @property string $port
 */
class mailer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mtb_mailer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(	
			array('mail_id', 'numerical', 'integerOnly'=>true),
			array('host, nama, password', 'length', 'max'=>50),
			array('port', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mail_id, host, nama, password, port', 'safe', 'on'=>'search'),
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
			'mail_id' => 'Mail',
			'host' => 'Host',
			'nama' => 'Username / Alamat Email',
			'password' => 'Password',
			'port' => 'Port',
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

		$criteria->compare('mail_id',$this->mail_id);
		$criteria->compare('host',$this->host,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('port',$this->port,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return mailer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
