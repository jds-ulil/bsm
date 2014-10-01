<?php

/**
 * This is the model class for table "proposal_ktp".
 *
 * The followings are the available columns in table 'proposal_ktp':
 * @property string $no_ktp
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property integer $agama
 * @property integer $status_perkawinan
 * @property string $pekerjaan
 * @property string $kewarganegaraan
 * @property string $masa_berlaku
 * @property string $no_proposal
 */
class proposalKtp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proposal_ktp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_lahir, masa_berlaku, agama', 'required'),
			array('agama', 'numerical', 'integerOnly'=>true),
			array('no_ktp, tempat_lahir, pekerjaan, kewarganegaraan, no_proposal', 'length', 'max'=>50),
			array('tanggal_lahir, alamat, masa_berlaku, desa, status_perkawinan', 'safe'),
                        array('tanggal_lahir, masa_berlaku', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'yyyy-MM-dd'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_ktp, tempat_lahir, tanggal_lahir, alamat, agama, status_perkawinan, pekerjaan, kewarganegaraan, masa_berlaku, no_proposal', 'safe', 'on'=>'search'),
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
            'rAgama' => array(self::BELONGS_TO, 'agama', 'agama'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'no_ktp' => 'No Ktp',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'alamat' => 'Alamat',
			'agama' => 'Agama',
			'status_perkawinan' => 'Status Perkawinan',
			'pekerjaan' => 'Pekerjaan',
			'kewarganegaraan' => 'Kewarganegaraan',
			'masa_berlaku' => 'Masa Berlaku',
			'no_proposal' => 'No Proposal',
			'desa' => 'Desa/Kelurahan',
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

		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('agama',$this->agama);
		$criteria->compare('status_perkawinan',$this->status_perkawinan);
		$criteria->compare('pekerjaan',$this->pekerjaan,true);
		$criteria->compare('kewarganegaraan',$this->kewarganegaraan,true);
		$criteria->compare('masa_berlaku',$this->masa_berlaku,true);
		$criteria->compare('no_proposal',$this->no_proposal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return proposalKtp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
