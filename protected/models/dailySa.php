<?php

/**
 * This is the model class for table "daily_sa".
 *
 * The followings are the available columns in table 'daily_sa':
 * @property integer $daily_sa_id
 * @property integer $jumlah_nasabah
 * @property string $no_kontak
 * @property double $total
 * @property string $segmen
 * @property string $nama_pegawai
 * @property string $info
 * @property integer $status
 * @property string $tanggal
 * @property integer $kriteria_nasabah
 */
class dailySa extends CActiveRecord
{
    // user for search by period
    public $from_date;
    public $to_date;
    
    public $record_row = 15;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_sa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('jumlah_nasabah', 'numerical', 'integerOnly'=>true),
			array('tanggal, nama_pegawai, kriteria_nasabah', 'required'),
			array('no_kontak, segmen', 'length', 'max'=>25),
			array('info, status, total', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('from_date, to_date, daily_sa_id, jumlah_nasabah, no_kontak, total, segmen, nama_pegawai, info, status, tanggal, kriteria_nasabah', 'safe', 'on'=>'search'),
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
            'rKrit' => array(self::BELONGS_TO, 'dailySaKriteriaNasabah', 'kriteria_nasabah'),
            'rStat' => array(self::BELONGS_TO, 'dailySecurityStatus', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'daily_sa_id' => 'Daily Sa',
			'jumlah_nasabah' => 'Jumlah Nasabah',
			'no_kontak' => 'No Kontak',
			'total' => 'Total Nominal (Rp)',
			'segmen' => 'Segmen',
			'nama_pegawai' => 'Nama Pegawai',
			'info' => 'Info Tambahan',
			'status' => 'Status',
			'tanggal' => 'Tanggal',
			'kriteria_nasabah' => 'Kriteria Nasabah',
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

		$criteria->compare('daily_sa_id',$this->daily_sa_id);
		$criteria->compare('jumlah_nasabah',$this->jumlah_nasabah);
		$criteria->compare('no_kontak',$this->no_kontak,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('segmen',$this->segmen,true);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kriteria_nasabah',$this->kriteria_nasabah);

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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailySa the static model class
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
