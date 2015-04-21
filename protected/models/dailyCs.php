<?php

/**
 * This is the model class for table "daily_cs".
 *
 * The followings are the available columns in table 'daily_cs':
 * @property integer $daily_cs_id
 * @property integer $kriteria_nasabah
 * @property integer $jumlah
 * @property double $total
 * @property string $nama_pegawai
 * @property string $info
 * @property string $tanggal
 * @property integer $status
 */
class dailyCs extends CActiveRecord
{
    
    // user for search by period
    public $from_date;
    public $to_date;
    
    public $record_row = 15;
    
    public $start_rest = 0;
    public $end_rest = 0;
    public $se_read = '';
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_cs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_pegawai, tanggal, kriteria_nasabah', 'required'),			
			array('daily_cs_id, kriteria_nasabah, jumlah, status', 'numerical', 'integerOnly'=>true),			
			array('nama_pegawai', 'length', 'max'=>70),
			array('info, total, start_rest, end_rest, se_read', 'safe'),
			array('from_date,to_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('from_date,to_date,daily_cs_id, kriteria_nasabah, jumlah, total, nama_pegawai, info, tanggal, status', 'safe', 'on'=>'search'),
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
            'rKrit' => array(self::BELONGS_TO, 'dailyCsKriteriaNasabah', 'kriteria_nasabah'),
            'rStat' => array(self::BELONGS_TO, 'dailySecurityStatus', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'daily_cs_id' => 'Daily Cs',
			'kriteria_nasabah' => 'Kriteria Nasabah',
			'jumlah' => 'Jumlah Nasabah (Orang)',
			'total' => 'Total Nominal (Rp)',
			'nama_pegawai' => 'Nama Pegawai',
			'info' => 'Info Tambahan',
			'tanggal' => 'Tanggal',
			'status' => 'Status',
            'se_read' => 'SE yang dibaca'
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

		$criteria->compare('daily_cs_id',$this->daily_cs_id);
		$criteria->compare('kriteria_nasabah',$this->kriteria_nasabah);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('total',$this->total);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('tanggal',$this->tanggal,true);
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
                       'defaultOrder'=>'tanggal DESC, kriteria_nasabah ASC',
                   ),
		));
	}
    
     
    public function getTotalNasabah($ids)
        {
                $ids = implode(",",$ids);
                
                if(empty($ids))
                    return "<b>0</b>";
                
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT SUM(jumlah) FROM `daily_cs` where daily_cs_id in ($ids)");                
                return "<b>".$amount = $command->queryScalar()."</b>";
        }
        
    public function getTotalRupiah($ids)
        {
                $ids = implode(",",$ids);
                
                if(empty($ids))
                    return "<b>0</b>";
                
                $connection=Yii::app()->db;
                $command=$connection->createCommand("SELECT SUM(total) FROM `daily_cs` where daily_cs_id in ($ids)");
                return $amount = $command->queryScalar();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailyCs the static model class
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
