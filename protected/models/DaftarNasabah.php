<?php

/**
 * This is the model class for table "mtb_daftar_nasabah".
 *
 * The followings are the available columns in table 'mtb_daftar_nasabah':
 * @property integer $nasabah_id
 * @property string $kartukeluarga_id
 * @property string $nama
 * @property string $alamat
 * @property integer $status
 */
class DaftarNasabah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mtb_daftar_nasabah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('kartukeluarga_id', 'unique'),
			array('kartukeluarga_id', 'length', 'max'=>10),
			array('nama', 'length', 'max'=>40),
			array('alamat', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nasabah_id, kartukeluarga_id, nama, alamat, status', 'safe', 'on'=>'search'),
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
            'sNas' => array(self::BELONGS_TO, 'StatusNasabah', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nasabah_id' => 'Nasabah',
			'kartukeluarga_id' => 'ID Kartu keluarga',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
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
        $criteria->with=array('sNas');    

		$criteria->compare('nasabah_id',$this->nasabah_id);
		$criteria->compare('kartukeluarga_id',$this->kartukeluarga_id,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('sNas.nama_status',$this->status,true);        

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchOtor()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->with=array('sNas');    
        $criteria->condition = 'status = 1';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DaftarNasabah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}        
}
