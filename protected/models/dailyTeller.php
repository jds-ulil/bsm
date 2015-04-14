<?php

/**
 * This is the model class for table "daily_teller".
 *
 * The followings are the available columns in table 'daily_teller':
 * @property integer $daily_teller_id
 * @property string $nama_pegawai
 * @property integer $kriteria_transaksi
 * @property integer $jumlah
 * @property double $total
 * @property string $info
 * @property string $tanggal
 * @property integer $status
 */
class dailyTeller extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    // user for search by period
    public $from_date;
    public $to_date;
    
    public $record_row = 15;
    
	public function tableName()
	{
		return 'daily_teller';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('kriteria_transaksi, nama_pegawai', 'required'),
			array('kriteria_transaksi, jumlah, status', 'numerical', 'integerOnly'=>true),
			array('nama_pegawai', 'length', 'max'=>70),
			array('info, tanggal, total', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('from_date, to_date, daily_teller_id, nama_pegawai, kriteria_transaksi, jumlah, total, info, tanggal, status', 'safe', 'on'=>'search'),
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
            'rKrit' => array(self::BELONGS_TO, 'dailyTellerKriteriaTransaksi', 'kriteria_transaksi'),
            'rStat' => array(self::BELONGS_TO, 'dailySecurityStatus', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'daily_teller_id' => 'Daily Teller',
			'nama_pegawai' => 'Nama Pegawai',
			'kriteria_transaksi' => 'Kriteria Transaksi',
			'jumlah' => 'Jumlah Nasabah (Orang)',
			'total' => 'Total Nominal (Rp)',
			'info' => 'Info Tambahan',
			'tanggal' => 'Tanggal',
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

		$criteria->compare('daily_teller_id',$this->daily_teller_id);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('kriteria_transaksi',$this->kriteria_transaksi);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('total',$this->total);
		$criteria->compare('info',$this->info,true);
		//$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('status',$this->status);
        
        if (!empty($this->from_date)) {                
            $reFromDate = $this->toDBDate($this->from_date);                
            $criteria->addCondition('tanggal >= "'.$reFromDate.'" ');                
        }
        if (!empty($this->to_date)) {
            $reToDate = $this->toDBDate($this->to_date);                
            $criteria->addCondition('tanggal <= "'.$reToDate.'" ');		
        }
        
        return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                            'pageSize'=> $this->record_row,
                        ),
			'criteria'=>$criteria,
            'sort'=>array(
                    'defaultOrder'=>'tanggal DESC',
                    ),
		));
	}
    
     public function getTotalNasabah($ids)
        {
                $ids = implode(",",$ids);
                
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT SUM(jumlah) FROM `daily_teller` where daily_teller_id in ($ids)");
                return "<b>".$amount = $command->queryScalar()."</b>";
        }
        
    public function getTotalRupiah($ids)
        {
                $ids = implode(",",$ids);
                
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT SUM(total) FROM `daily_teller` where daily_teller_id in ($ids)");
                return $amount = $command->queryScalar();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailyTeller the static model class
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
