<?php

/**
 * This is the model class for table "daily_security".
 *
 * The followings are the available columns in table 'daily_security':
 * @property integer $daily_security_id
 * @property string $nama_inputer
 * @property integer $teler_jumlah
 * @property string $teler_info
 * @property integer $cs_jumlah
 * @property string $cs_info
 * @property integer $marketing_jumlah
 * @property string $marketing_info
 * @property integer $mikro_jumlah
 * @property string $mikro_info
 * @property integer $gadai_jumlah
 * @property string $gadai_info
 * @property string $lain_jumlah
 * @property string $lain_info
 * @property string $tanggal
 */
class dailySecurityArray extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daily_security';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(			
			array('jumlah, jenis_nasabah', 'numerical', 'integerOnly'=>true),
			array('info', 'length', 'max'=>100),			
            array('jenis_nasabah', 'required'),
            
            //tanggal validation
            array('tanggal', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
            
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nama_inputer, tanggal, jumlah, info, jenis_nasabah', 'safe', 'on'=>'search'),
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
			'daily_security_id' => 'Daily Security',
			'nama_inputer' => 'Nama Inputer',
            'tanggal' => 'Tanggal',
			'jumlah' => 'Jumlah (Orang)',
			'info' => 'Info',
			'jenis_nasabah' => 'Jenis Nasabah', 			
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

		$criteria->compare('daily_security_id',$this->daily_security_id);
		$criteria->compare('nama_inputer',$this->nama_inputer,true);
        $criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jenis_nasabah',$this->jenis_nasabah);
        $criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('info',$this->info,true);						

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dailySecurity the static model class
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
