<?php

/**
 * This is the model class for table "mtb_user".
 *
 * The followings are the available columns in table 'mtb_user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $email_address
 * @property integer $jabatan_id
 * @property string $password
 * @property integer $hak_akses
 */
class mguser extends CActiveRecord
{
	
	public $confirmPass;
	public $confirmPassUpdate;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mtb_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('NIP, user_name, email_address, password, jabatan_id, hak_akses, confirmPass', 'required', 'on'=>'create'),
			array('NIP, user_name, email_address, password, jabatan_id, hak_akses', 'required', 'on'=>'update'),
			array('user_id, jabatan_id, hak_akses', 'numerical', 'integerOnly'=>true),
			array('user_name, email_address', 'length', 'max'=>50),
			array('email_address', 'length', 'max'=>50),
			array('email_address', 'email'),
			//array('email_address', 'unique', 'on'=>'create'),		
			array('email_address', 'unique'),		
			array('password, confirmPass', 'length', 'max'=>64),			
			array('confirmPass','compare','compareAttribute'=>'password', 'on'=>'create'),            
			array('password, confirmPass', 'length', 'min'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NIP, user_id, user_name, email_address, jabatan_id, password, hak_akses', 'safe', 'on'=>'search'),
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
		    'rJab' => array(self::BELONGS_TO, 'Jabatan', 'jabatan_id'),
		    'rHak' => array(self::BELONGS_TO, 'HakAkses', 'hak_akses'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_name' => 'Nama',
			'email_address' => 'Email',
			'jabatan_id' => 'Jabatan',
			'password' => 'Password',
			'hak_akses' => 'Hak Akses',
			'NIP' => 'NIP',
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
		$criteria=new CDbCriteria;
		$criteria->with=array('rJab','rHak');        	
		//$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('rJab.nama_jabatan',$this->jabatan_id,true);
		$criteria->compare('NIP',$this->NIP,true);
		//$criteria->compare('password',$this->password,true);
		$criteria->compare('hak_akses',$this->hak_akses);		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MtbUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function beforeSave()
	{
		if(parent::beforeSave())
		{     
		    if (!empty($this->confirmPass))
		    $this->setAttribute('password', CPasswordHelper::hashPassword($this->password));                      
		}
	return true;
	}
      
}
