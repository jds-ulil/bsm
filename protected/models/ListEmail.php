<?php

/**
 * This is the model class for table "mtb_list_email".
 *
 * The followings are the available columns in table 'mtb_list_email':
 * @property integer $id_list_email
 * @property string $email_address
 * @property string $nama_pengguna
 * @property string $jabatan
 * @property integer $status
 */
class ListEmail extends CActiveRecord
{
    const TYPE_aktiv=1;
    const TYPE_pasif=0;
    
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mtb_list_email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NIP, email_address, jabatan_id, nama_pengguna, status', 'required', 'on'=>'create'),
			array('NIP, email_address, jabatan_id, nama_pengguna, status', 'required', 'on'=>'update'),
			//array('status', 'numerical', 'integerOnly'=>true),
			array('email_address', 'length', 'max'=>100),
			array('email_address', 'email'),
			array('email_address', 'unique'),
			array('nama_pengguna, jabatan_id', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NIP, id_list_email, email_address, nama_pengguna, jabatan_id, status', 'safe', 'on'=>'search'),
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
            'rNot' => array(self::BELONGS_TO, 'EmailNotif', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			//'id_list_email' => 'Id List Email',
			'email_address' => 'Alamat Email',
			'nama_pengguna' => 'Nama Pemilik',
			'jabatan_id' => 'Jabatan',
			'status' => 'Email Notif',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with=array('rJab','rNot');        
         
		$criteria->compare('id_list_email',$this->id_list_email);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('nama_pengguna',$this->nama_pengguna,true);
		$criteria->compare('rJab.nama_jabatan',$this->jabatan_id,true);		        
		$criteria->compare('rNot.nama',$this->status,true);
		$criteria->compare('NIP',$this->NIP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ListEmail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getStatusOption(){        
        return array(
            self::TYPE_aktiv=>'Aktif',
            self::TYPE_pasif=>'Tidak Aktif',          
        );
    }
     public function getStatus($status)
        {
            $array  = self::getStatusOption();
            return $array[$status];
        }
}
