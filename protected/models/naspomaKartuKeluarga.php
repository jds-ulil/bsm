<?php

/**
 * This is the model class for table "naspoma_kartu_keluarga".
 *
 * The followings are the available columns in table 'naspoma_kartu_keluarga':
 * @property string $no_kartu_keluarga
 * @property string $nama
 * @property string $tanggal_lahir
 * @property string $no_ktp
 * @property integer $proposal_id
 * @property string $tempat_lahir
 */
class naspomaKartuKeluarga extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'naspoma_kartu_keluarga';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_kartu_keluarga', 'required'),
			array('naspoma_id', 'numerical', 'integerOnly'=>true),
			array('no_kartu_keluarga, nama, no_ktp, tempat_lahir', 'length', 'max'=>50),
			array('tanggal_lahir', 'safe'),
            array('tanggal_lahir', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('no_proposal, no_kartu_keluarga, nama, tanggal_lahir, no_ktp', 'safe', 'on'=>'batchSave'),
			array('no_kartu_keluarga, nama, tanggal_lahir, no_ktp, naspoma_id, tempat_lahir', 'safe', 'on'=>'search'),
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
			'no_kartu_keluarga' => 'No Kartu Keluarga',
			'nama' => 'Nama',
			'tanggal_lahir' => 'Tanggal Lahir',
			'no_ktp' => 'No Ktp',
			'naspoma_id' => 'Naspoma',
			'tempat_lahir' => 'Tempat Lahir',
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

		$criteria->compare('no_kartu_keluarga',$this->no_kartu_keluarga,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('naspoma_id',$this->proposal_id);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return naspomaKartuKeluarga the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
    public function beforeSave()
	{
            if(parent::beforeSave())
            {  
                if(!empty($this->tanggal_lahir)){
                    $data = explode('/' ,$this->tanggal_lahir);                
                    if(count($data) > 2) {
                    $this->tanggal_lahir = $data[2].'-'.$data[1].'-'.$data[0];
                    }
                }                                
            }
	return true;
	}
}
