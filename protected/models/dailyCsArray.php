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
class dailyCsArray extends CActiveRecord
{
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
			array('kriteria_nasabah', 'required'),	
			array('daily_cs_id, kriteria_nasabah, jumlah, status', 'numerical', 'integerOnly'=>true),			
			array('nama_pegawai', 'length', 'max'=>70),
			array('info, total', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daily_cs_id, kriteria_nasabah, jumlah, total, nama_pegawai, info, tanggal, status', 'safe', 'on'=>'search'),
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
			'daily_cs_id' => 'Daily Cs',
			'kriteria_nasabah' => 'Kriteria Nasabah',
			'jumlah' => 'Jumlah Nasabah (Orang)',
			'total' => 'Total Nominal (Rp)',
			'nama_pegawai' => 'Nama Pegawai',
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

		$criteria->compare('daily_cs_id',$this->daily_cs_id);
		$criteria->compare('kriteria_nasabah',$this->kriteria_nasabah);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('total',$this->total);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
    
    //
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
