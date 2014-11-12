<?php

/**
 * This is the model class for table "mtb_pegawai".
 *
 * The followings are the available columns in table 'mtb_pegawai':
 * @property integer $pegawai_id
 * @property string $no_urut
 * @property string $nama
 * @property string $NIP
 * @property integer $jabatan
 * @property string $no_handphone
 * @property string $email
 * @property integer $unit_kerja
 * @property string $email_atasan
 */
class pegawai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mtb_pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, NIP, level_jabatan, jabatan', 'required', 'on'=>'create'),
			array('nama, NIP, level_jabatan, jabatan', 'required', 'on'=>'update'),
                        array('email, NIP, no_urut', 'unique'),
			array('level_jabatan, jabatan, unit_kerja', 'numerical', 'integerOnly'=>true),
			array('no_urut', 'length', 'max'=>10),
			array('nama, NIP, email, email_atasan', 'length', 'max'=>50),
                        array('email, email_atasan', 'email'),            
    			array('no_handphone', 'length', 'max'=>20),
                        array('no_handphone', 'application.extensions.PhoneValidator.PhoneValidator'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('level_jabatan, pegawai_id, no_urut, nama, NIP, jabatan, no_handphone, email, unit_kerja, email_atasan', 'safe', 'on'=>'search'),
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
		    'rJab' => array(self::BELONGS_TO, 'Jabatan', 'jabatan'),
		    'rUnK' => array(self::BELONGS_TO, 'unitkerja', 'unit_kerja'),
		    'rLevJab' => array(self::BELONGS_TO, 'levelJabatan', 'level_jabatan'),
		    'rUser' => array(self::BELONGS_TO, 'mguser', 'id_pegawai'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pegawai_id' => 'Pegawai',
			'no_urut' => 'No. Urut',
			'nama' => 'Nama',
			'NIP' => 'NIP',
			'jabatan' => 'Jabatan',
			'no_handphone' => 'No. Handphone',
			'email' => 'Email',
			'unit_kerja' => 'Unit Kerja',
			'email_atasan' => 'Email Atasan',
            'level_jabatan' => 'Level Jabatan',
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
                $criteria->with=array('rJab','rUnK');      
                
		$criteria->compare('pegawai_id',$this->pegawai_id);
		$criteria->compare('no_urut',$this->no_urut,true);
		$criteria->compare('t.nama',$this->nama,true);
		$criteria->compare('NIP',$this->NIP,true);		
                $criteria->compare('rJab.nama_jabatan',$this->jabatan,true);
		$criteria->compare('no_handphone',$this->no_handphone,true);
		$criteria->compare('email',$this->email,true);
                //$criteria->compare('rJab.nama_jabatan',$this->jabatan,true);
		$criteria->compare('unit_kerja',$this->unit_kerja);                
		$criteria->compare('email_atasan',$this->email_atasan,true);
		$criteria->compare('level_jabatan',$this->level_jabatan,true);
        
        $criteria->order = 'no_urut ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function searchForUser(){
        $criteria=new CDbCriteria;
        $criteria->with=array('rJab','rUnK');      
                
        $criteria->join = "LEFT JOIN mtb_user mus ON mus.`id_pegawai` = t.`pegawai_id`";    
        $criteria->condition = "mus.`user_id` IS NULL";
                
        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
