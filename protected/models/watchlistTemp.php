<?php

/**
 * This is the model class for table "watchlist_temp".
 *
 * The followings are the available columns in table 'watchlist_temp':
 * @property integer $watchlist_id
 * @property string $no_loan
 * @property string $nama_nasabah
 * @property string $total_tunggakan
 * @property string $kolektibilitas
 * @property string $jenis_produk
 * @property string $no_CIF
 * @property string $no_rekening_angsuran
 * @property string $plafon
 * @property string $os_pokok
 * @property string $angsuran_bulanan
 * @property string $persentase_bagi_hasil
 * @property string $usaha_nasabah
 * @property string $tujuan_pembiayaan
 */
class watchlistTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'watchlist_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_loan, total_tunggakan, no_rekening_angsuran, plafon, os_pokok, angsuran_bulanan', 'length', 'max'=>20),
			array('nama_nasabah, no_CIF', 'length', 'max'=>50),
			array('kolektibilitas', 'length', 'max'=>3),
			array('jenis_produk, usaha_nasabah, tujuan_pembiayaan', 'length', 'max'=>100),
			array('persentase_bagi_hasil, marketing', 'length', 'max'=>5),            
			array('tgl_upload', 'safe'),            
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_upload, marketing, watchlist_id, no_loan, nama_nasabah, total_tunggakan, kolektibilitas, jenis_produk, no_CIF, no_rekening_angsuran, plafon, os_pokok, angsuran_bulanan, persentase_bagi_hasil, usaha_nasabah, tujuan_pembiayaan', 'safe', 'on'=>'search'),
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
			'watchlist_id' => 'No',
			'no_loan' => 'No Loan',
			'nama_nasabah' => 'Nama Nasabah',
			'total_tunggakan' => 'Total Tunggakan',
			'kolektibilitas' => 'Kolektibilitas',
			'jenis_produk' => 'Jenis Produk',
			'no_CIF' => 'No Cif',
			'no_rekening_angsuran' => 'No Rekening Angsuran',
			'plafon' => 'Plafon',
			'os_pokok' => 'Os Pokok',
			'angsuran_bulanan' => 'Angsuran Bulanan',
			'persentase_bagi_hasil' => 'Persentase Bagi Hasil',
			'usaha_nasabah' => 'Usaha Nasabah',
			'tujuan_pembiayaan' => 'Tujuan Pembiayaan',
            'marketing' => 'Pegawai',
            'tgl_upload' => "Tanggal Upload",
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

        $criteria->compare('marketing',$this->marketing);
		$criteria->compare('watchlist_id',$this->watchlist_id);
		$criteria->compare('no_loan',$this->no_loan,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('total_tunggakan',$this->total_tunggakan,true);
		$criteria->compare('kolektibilitas',$this->kolektibilitas,true);
		$criteria->compare('jenis_produk',$this->jenis_produk,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening_angsuran',$this->no_rekening_angsuran,true);
		$criteria->compare('plafon',$this->plafon,true);
		$criteria->compare('os_pokok',$this->os_pokok,true);
		$criteria->compare('angsuran_bulanan',$this->angsuran_bulanan,true);
		$criteria->compare('persentase_bagi_hasil',$this->persentase_bagi_hasil,true);
		$criteria->compare('usaha_nasabah',$this->usaha_nasabah,true);
		$criteria->compare('tujuan_pembiayaan',$this->tujuan_pembiayaan,true);
        
        if (!empty($this->tgl_upload)) {
                $this->tgl_upload = $this->toDBDate($this->tgl_upload);                
                $criteria->compare('tgl_upload',$this->tgl_upload,true);
            }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        //'pagination'=>array('pageSize'=>50),
		));
	}
	public function search_save()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('watchlist_id',$this->watchlist_id);
		$criteria->compare('no_loan',$this->no_loan,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('total_tunggakan',$this->total_tunggakan,true);
		$criteria->compare('kolektibilitas',$this->kolektibilitas,true);
		$criteria->compare('jenis_produk',$this->jenis_produk,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening_angsuran',$this->no_rekening_angsuran,true);
		$criteria->compare('plafon',$this->plafon,true);
		$criteria->compare('os_pokok',$this->os_pokok,true);
		$criteria->compare('angsuran_bulanan',$this->angsuran_bulanan,true);
		$criteria->compare('persentase_bagi_hasil',$this->persentase_bagi_hasil,true);
		$criteria->compare('usaha_nasabah',$this->usaha_nasabah,true);
		$criteria->compare('tujuan_pembiayaan',$this->tujuan_pembiayaan,true);
        
        if (!empty($this->tgl_upload)) {
               $this->tgl_upload = $this->toDBDate($this->tgl_upload);                
               $criteria->compare('tgl_upload',$this->tgl_upload,true);
           }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>1000),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return watchlistTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    function toDBDate($date){            
            $data = explode('/',$date);
            $value = '';
            $lenght = count($data)-1;
            if (!empty($data)) {                
                for($i=$lenght;$i>=0;$i--) {                    
                    if($i != 0){
                        $value  .= $data[$i].'-';
                    } else {
                        $value  .= $data[$i];
                    }
                }
            }    
            return $value;
        }
}
