<?php

/**
 * This is the model class for table "nasabah_tolak".
 *
 * The followings are the available columns in table 'nasabah_tolak':
 * @property integer $nasabah_tolak_id
 * @property string $tanggal_pengajuan
 * @property string $plafon_pengajuan
 * @property string $alasan_ditolak
 * @property string $tahap
 * @property integer $segment
 * @property string $jenis_usaha
 * @property string $marketing
 * @property integer $jenis_nasabah
 * @property string $existing_plafon
 * @property string $existing_os
 * @property string $existing_angsuran
 * @property integer $existing_kolektabilitas
 * @property string $referal_nama
 * @property string $referal_alamat
 * @property string $referal_telp
 * @property string $referal_sektor_usaha
 * @property string $referal_fasilitas
 * @property string $referal_kolektabilitas
 * @property integer $del_flag
 * @property string $no_kartu_keluarga
 * @property string $no_buku_nikah
 * @property string $no_buku_ktp
 */
class nasabahTolak extends CActiveRecord
{
    public $mode = 'create';
    public $jenisNasabah = array (
            vc::APP_jenis_nasabah_WIC => "Walk In Customer (WIC)",
            vc::APP_jenis_nasabah_existing => "Existing",
            vc::APP_jenis_nasabah_refferal => "Referal",
        );
    public $namaJenisNasabah = '';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nasabah_tolak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('segmen, jenis_nasabah, existing_kolektabilitas, del_flag', 'numerical', 'integerOnly'=>true),
			array('plafon_pengajuan', 'length', 'max'=>25),
			array('tahap', 'length', 'max'=>100),
			array('jenis_usaha, marketing, existing_plafon, referal_nama, referal_sektor_usaha, no_kartu_keluarga, no_buku_nikah, no_buku_ktp', 'length', 'max'=>50),
			array('existing_os, existing_angsuran, referal_telp, referal_fasilitas', 'length', 'max'=>20),
			array('referal_kolektabilitas', 'length', 'max'=>2),
			array('tanggal_pengajuan, alasan_ditolak, referal_alamat, mode', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nasabah_tolak_id, tanggal_pengajuan, plafon_pengajuan, alasan_ditolak, tahap, segmen, jenis_usaha, marketing, jenis_nasabah, existing_plafon, existing_os, existing_angsuran, existing_kolektabilitas, referal_nama, referal_alamat, referal_telp, referal_sektor_usaha, referal_fasilitas, referal_kolektabilitas, del_flag, no_kartu_keluarga, no_buku_nikah, no_buku_ktp', 'safe', 'on'=>'search'),
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
			'nasabah_tolak_id' => 'Nasabah Tolak',
			'tanggal_pengajuan' => 'Tanggal Pengajuan',
			'plafon_pengajuan' => 'Plafon Pengajuan',
			'alasan_ditolak' => 'Alasan Ditolak',
			'tahap' => 'Tahap',
			'segment' => 'Segment',
			'jenis_usaha' => 'Jenis Usaha',
			'marketing' => 'Marketing',
			'jenis_nasabah' => 'Jenis Nasabah',
			'existing_plafon' => 'Existing Plafon',
			'existing_os' => 'Existing Os',
			'existing_angsuran' => 'Existing Angsuran',
			'existing_kolektabilitas' => 'Existing Kolektabilitas',
			'referal_nama' => 'Referal Nama',
			'referal_alamat' => 'Referal Alamat',
			'referal_telp' => 'Referal Telp',
			'referal_sektor_usaha' => 'Referal Sektor Usaha',
			'referal_fasilitas' => 'Referal Fasilitas',
			'referal_kolektabilitas' => 'Referal Kolektabilitas',
			'del_flag' => 'Del Flag',
			'no_kartu_keluarga' => 'No Kartu Keluarga',
			'no_buku_nikah' => 'No Buku Nikah',
			'no_buku_ktp' => 'No Buku Ktp',
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

		$criteria->compare('nasabah_tolak_id',$this->nasabah_tolak_id);
		$criteria->compare('tanggal_pengajuan',$this->tanggal_pengajuan,true);
		$criteria->compare('plafon_pengajuan',$this->plafon_pengajuan,true);
		$criteria->compare('alasan_ditolak',$this->alasan_ditolak,true);
		$criteria->compare('tahap',$this->tahap,true);
		$criteria->compare('segment',$this->segment);
		$criteria->compare('jenis_usaha',$this->jenis_usaha,true);
		$criteria->compare('marketing',$this->marketing,true);
		$criteria->compare('jenis_nasabah',$this->jenis_nasabah);
		$criteria->compare('existing_plafon',$this->existing_plafon,true);
		$criteria->compare('existing_os',$this->existing_os,true);
		$criteria->compare('existing_angsuran',$this->existing_angsuran,true);
		$criteria->compare('existing_kolektabilitas',$this->existing_kolektabilitas);
		$criteria->compare('referal_nama',$this->referal_nama,true);
		$criteria->compare('referal_alamat',$this->referal_alamat,true);
		$criteria->compare('referal_telp',$this->referal_telp,true);
		$criteria->compare('referal_sektor_usaha',$this->referal_sektor_usaha,true);
		$criteria->compare('referal_fasilitas',$this->referal_fasilitas,true);
		$criteria->compare('referal_kolektabilitas',$this->referal_kolektabilitas,true);
		$criteria->compare('del_flag',$this->del_flag);
		$criteria->compare('no_kartu_keluarga',$this->no_kartu_keluarga,true);
		$criteria->compare('no_buku_nikah',$this->no_buku_nikah,true);
		$criteria->compare('no_buku_ktp',$this->no_buku_ktp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return nasabahTolak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
