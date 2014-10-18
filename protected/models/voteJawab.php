<?php

/**
 * This is the model class for table "vote_jawab".
 *
 * The followings are the available columns in table 'vote_jawab':
 * @property integer $id_jawab
 * @property integer $soal_id
 * @property string $jawaban
 * @property string $user_id
 */
class voteJawab extends CActiveRecord
{
    public $from_date;
    public $to_date;
    public $unit_kerja;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vote_jawab';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('tanggal_vote', 'safe'),
			array('soal_id', 'numerical', 'integerOnly'=>true),
			array('jawaban, id_pegawai', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('from_date, to_date, unit_kerja, id_jawab, soal_id, jawaban, id_pegawai', 'safe', 'on'=>'search'),
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
			'id_jawab' => 'Id Jawab',
			'soal_id' => 'Soal',
			'jawaban' => 'Jawaban',		
            'id_pegawai' => 'ID Pegawai',
            'tanggal_vote' => 'Tanggal Vote',
            'from_date' => 'Mulai',
            'to_date' => 'Sampai',
            'unit_kerja' => 'Unit Kerja' 
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
        $criteria->join= ' INNER JOIN `mtb_pegawai` `peg` ON (`peg`.`pegawai_id`=`t`.`id_pegawai`)  ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON peg.unit_kerja = uk.unit_kerja_id ';
        
        
		$criteria->compare('id_jawab',$this->id_jawab);
		$criteria->compare('soal_id',$this->soal_id);
		$criteria->compare('jawaban',$this->jawaban);
		$criteria->compare('id_pegawai',$this->id_pegawai,true);
		$criteria->compare('tanggal_vote',$this->tanggal_vote,true);
		$criteria->compare('uk.nama',$this->unit_kerja,true);

        
         if (!empty($this->from_date)) {                
            $reFromDate = $this->toDBDate($this->from_date);                
            $criteria->addCondition('tanggal_vote >= "'.$reFromDate.'" ');                
            }
        if (!empty($this->to_date)) {
            $reToDate = $this->toDBDate($this->to_date);                
            $criteria->addCondition('tanggal_vote <= "'.$reToDate.'" ');		
            }
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function searchReport(){
        $criteria=new CDbCriteria;
        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    }

    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return voteJawab the static model class
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
