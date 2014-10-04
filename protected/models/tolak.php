<?php

/**
 * This is the model class for table "tolak".
 *
 * The followings are the available columns in table 'tolak':
 * @property integer $tolak_id
 * @property string $no_proposal
 * @property string $tanggal_tolak
 * @property string $alasan_ditolak
 * @property string $tahap_penolakan
 */
class tolak extends CActiveRecord
{
    public $mode = 'create';
    public $tempLL;
    public $marketing_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tolak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('proposal_id, tanggal_tolak, alasan_ditolak, tahap_penolakan', 'required'),
			array('proposal_id', 'length', 'max'=>50),
			array('proposal_id', 'check_proposal',),
			array('mode, tempLL', 'safe'),
                        array('tanggal_tolak', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'yyyy-MM-dd'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('marketing_search, tolak_id, no_proposal, tanggal_tolak, alasan_ditolak, tahap_penolakan', 'safe', 'on'=>'search'),
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
            'rCM' => array( self::HAS_ONE, 'proposal', array('no_proposal'=>'no_proposal')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tolak_id' => 'Tolak',
			'proposal_id' => 'No Proposal ID',
			'tanggal_tolak' => 'Tanggal Tolak',
			'alasan_ditolak' => 'Alasan Ditolak',
			'tahap_penolakan' => 'Tahap Penolakan',
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
        $criteria->join= ' LEFT OUTER JOIN `proposal` `rCM` ON (`rCM`.`no_proposal`=`t`.`no_proposal`)  ';
        $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = rCM.marketing ';
		$criteria->compare('tolak_id',$this->tolak_id);
		$criteria->compare('no_proposal',$this->no_proposal,true);
		$criteria->compare('tanggal_tolak',$this->tanggal_tolak,true);
		$criteria->compare('alasan_ditolak',$this->alasan_ditolak,true);		
		$criteria->compare('mp.nama',$this->marketing_search,true);		
        if ($this->tahap_penolakan == vc::APP_tahapan_lainya) {
            $arrTahap = tolakTahapan::getArrTahapan();
            foreach ($arrTahap as $key => $value) {
                $criteria->addCondition("tahap_penolakan <> '".$value."' ");                 
            }            
        } else {
            $criteria->compare('tahap_penolakan',$this->tahap_penolakan,true);
        }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function check_proposal($attribute_name, $params)
        {             
            $query1 = "SELECT COUNT(proposal_id) FROM proposal                        
                        WHERE del_flag = 0 and status_pengajuan = 0 and 
                        no_proposal = '".$this->$attribute_name."'";                        
            $count=Yii::app()->db->createCommand($query1)->queryScalar();                        
            if($count == null || $count == 0){
                $this->addError($attribute_name, Yii::t('user', $label.' No Proposal Tidak Ditemukan'));
                return false;
            }
            return true;
        }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return tolak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function sendNotif() {
//            $message = new YiiMailMessage();
//            $message->view = 'input';        
//            $message->subject    = 'Input Data Nasabah';
//            
//            foreach ($listEmail as $key => $data) {                    
//             $message->addTo($data->email_address);       
//            }
//                $param = array ('nasabah'=>$model,'inputer'=>Yii::app()->user->name);
//                $message->setBody($param, 'text/html');                
//                $message->from = 'oelhil@gmail.com';   
//
//            try
//            {            
//                Yii::app()->mail->send($message);                
//                $model->status = 4;
//                $model->save();
//                $this->redirect(array('view','id'=>$model->nasabah_id));
//            }
//            catch (Exception $exc)
//            {
//                $this->render('error',array(			
//                ));
//            }             
//            
        return false;
    }    
    
        public function getTotalTolak () {
            $query1 = "SELECT COUNT(tolak_id) FROM tolak";                        
            $count=Yii::app()->db->createCommand($query1)->queryScalar();            
            return $count==null?0:$count;
        }
}
