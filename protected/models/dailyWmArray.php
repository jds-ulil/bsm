<?php

/**
 * This is the model class for table "daily_wm".
 *
 * The followings are the available columns in table 'daily_wm':
 * @property integer $daily_wm_id
 * @property integer $jumlah_nasabah
 * @property integer $kriteria_nasabah
 * @property string $no_kontak
 * @property double $total
 * @property string $nama_pegawai
 * @property string $info
 * @property integer $status
 * @property string $tanggal
 */
class dailyWmArray extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_wm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jumlah_nasabah, kriteria_nasabah, status', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('no_kontak', 'length', 'max'=>25),
			array('nama_pegawai', 'length', 'max'=>70),
			array('info, tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daily_wm_id, jumlah_nasabah, kriteria_nasabah, no_kontak, total, nama_pegawai, info, status, tanggal', 'safe', 'on'=>'search'),
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
			'daily_wm_id' => 'Daily Wm',
			'jumlah_nasabah' => 'Jumlah Nasabah',
			'kriteria_nasabah' => 'Kriteria Nasabah',
			'no_kontak' => 'No Kontak',
			'total' => 'Total',
			'nama_pegawai' => 'Nama Pegawai',
			'info' => 'Info',
			'status' => 'Status',
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

		$criteria->compare('daily_wm_id',$this->daily_wm_id);
		$criteria->compare('jumlah_nasabah',$this->jumlah_nasabah);
		$criteria->compare('kriteria_nasabah',$this->kriteria_nasabah);
		$criteria->compare('no_kontak',$this->no_kontak,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tanggal',$this->tanggal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailyWmArray the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
