<?php

/**
 * This is the model class for table "pelunasan".
 *
 * The followings are the available columns in table 'pelunasan':
 * @property integer $pelunasan_id
 * @property string $tanggal_pelunasan
 * @property string $penyebab
 * @property integer $segmen
 * @property string $jenis_usaha
 * @property string $nama_nasabah
 * @property string $no_CIF
 * @property string $no_rekening
 * @property string $plafon_awal
 * @property string $OS_pokok_terakhir
 * @property string $angsuran
 * @property string $kolektibilitas_terakhir
 */
class pelunasan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelunasan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('segmen', 'numerical', 'integerOnly'=>true),
			array('jenis_usaha, no_CIF, no_rekening', 'length', 'max'=>50),
			array('nama_nasabah', 'length', 'max'=>100),
			array('plafon_awal, OS_pokok_terakhir, angsuran, kolektibilitas_terakhir', 'length', 'max'=>20),
			array('tanggal_pelunasan, penyebab', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pelunasan_id, tanggal_pelunasan, penyebab, segmen, jenis_usaha, nama_nasabah, no_CIF, no_rekening, plafon_awal, OS_pokok_terakhir, angsuran, kolektibilitas_terakhir', 'safe', 'on'=>'search'),
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
			'pelunasan_id' => 'Pelunasan',
			'tanggal_pelunasan' => 'Tanggal Pelunasan',
			'penyebab' => 'Penyebab',
			'segmen' => 'Segmen',
			'jenis_usaha' => 'Jenis Usaha',
			'nama_nasabah' => 'Nama Nasabah',
			'no_CIF' => 'No Cif',
			'no_rekening' => 'No Rekening',
			'plafon_awal' => 'Plafon Awal',
			'OS_pokok_terakhir' => 'Os Pokok Terakhir',
			'angsuran' => 'Angsuran',
			'kolektibilitas_terakhir' => 'Kolektibilitas Terakhir',
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

		$criteria->compare('pelunasan_id',$this->pelunasan_id);
		$criteria->compare('tanggal_pelunasan',$this->tanggal_pelunasan,true);
		$criteria->compare('penyebab',$this->penyebab,true);
		$criteria->compare('segmen',$this->segmen);
		$criteria->compare('jenis_usaha',$this->jenis_usaha,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening',$this->no_rekening,true);
		$criteria->compare('plafon_awal',$this->plafon_awal,true);
		$criteria->compare('OS_pokok_terakhir',$this->OS_pokok_terakhir,true);
		$criteria->compare('angsuran',$this->angsuran,true);
		$criteria->compare('kolektibilitas_terakhir',$this->kolektibilitas_terakhir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return pelunasan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
