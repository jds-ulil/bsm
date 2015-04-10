<?php

/**
 * This is the model class for table "daily_bo".
 *
 * The followings are the available columns in table 'daily_bo':
 * @property integer $daily_bo_id
 * @property integer $jumlah_transaksi
 * @property integer $kriteria_transaksi
 * @property double $total
 * @property string $nama_pegawai
 * @property string $info
 * @property string $tanggal
 * @property integer $status
 * @property integer $status_transaksi
 */
class dailyBoArray extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_bo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('jumlah_transaksi, kriteria_transaksi, status_transaksi', 'required'),
			array('total', 'numerical'),
			array('nama_pegawai', 'length', 'max'=>70),
			array('info, tanggal, status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daily_bo_id, jumlah_transaksi, kriteria_transaksi, total, nama_pegawai, info, tanggal, status, status_transaksi', 'safe', 'on'=>'search'),
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
			'daily_bo_id' => 'Daily Bo',
			'jumlah_transaksi' => 'Jumlah Transaksi',
			'kriteria_transaksi' => 'Kriteria Transaksi',
			'total' => 'Total Nominal (Rp)',
			'nama_pegawai' => 'Nama Pegawai',
			'info' => 'Info Tambahan',
			'tanggal' => 'Tanggal',
			'status' => 'Status',
			'status_transaksi' => 'Status Transaksi',
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

		$criteria->compare('daily_bo_id',$this->daily_bo_id);
		$criteria->compare('jumlah_transaksi',$this->jumlah_transaksi);
		$criteria->compare('kriteria_transaksi',$this->kriteria_transaksi);
		$criteria->compare('total',$this->total);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('status_transaksi',$this->status_transaksi);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailyBoArray the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function beforeSave()
	{
        // ubah tanggal ke db version sebelum disimpan
		if(parent::beforeSave())
		{            
            if(!empty($this->tanggal)){
                $this->tanggal = $this->toDBDate($this->tanggal);
            }
            if (!empty($this->total)) {
                $this->total = str_replace(".","",  $this->total);
            }            
		}
	return true;
	}
    // change format manusia to mesiin
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
