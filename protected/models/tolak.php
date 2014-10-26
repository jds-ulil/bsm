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
    public $nama_nasabah;
    public $from_date;
    public $to_date;
    public $unit_kerja;
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
                        array('nama_nasabah, proposal_id, tanggal_tolak, alasan_ditolak, tahap_penolakan', 'required', 'on'=>'insert'),
			array('proposal_id', 'length', 'max'=>50),
			//array('proposal_id', 'check_proposal',),
			array('mode, tempLL', 'safe'),
                        array('tanggal_tolak', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/MM/yyyy','on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('unit_kerja, nama_nasabah, from_date, to_date, marketing_search, tolak_id, no_proposal, tanggal_tolak, alasan_ditolak, tahap_penolakan', 'safe', 'on'=>'search'),
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
                    'rCM' => array( self::HAS_ONE, 'proposal', array('proposal_id'=>'proposal_id')),
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
                        'nama_nasabah' => 'NAMA NASABAH',
                        'marketing_search' => 'Marketing',
                        'unit_kerja' => "Unit Kerja",
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
	public function search() {		
		$criteria=new CDbCriteria;           
                $criteria->join= ' INNER JOIN `proposal` `rCM` ON (`rCM`.`proposal_id`=`t`.`proposal_id`)  ';
                $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = rCM.marketing ';
                $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
		$criteria->compare('tolak_id',$this->tolak_id);		
		$criteria->compare('tanggal_tolak',$this->tanggal_tolak,true);
		$criteria->compare('alasan_ditolak',$this->alasan_ditolak,true);		
		$criteria->compare('mp.nama',$this->marketing_search,true);		
		$criteria->compare('rCM.nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('uk.nama',$this->unit_kerja,true);
                $criteria->addCondition("rCM.status_pengajuan = '".vC::APP_status_proposal_tolak."' ");   
        if ($this->tahap_penolakan == vc::APP_tahapan_lainya) {
            $arrTahap = tolakTahapan::getArrTahapan();
            foreach ($arrTahap as $key => $value) {
                $criteria->addCondition("tahap_penolakan <> '".$value."' ");                 
            }            
        } else {
            $criteria->compare('tahap_penolakan',$this->tahap_penolakan,true);
        }
        if (!empty($this->from_date)) {                
        $reFromDate = $this->toDBDate($this->from_date);                
        $criteria->addCondition('tanggal_tolak >= "'.$reFromDate.'" ');                
        }
        if (!empty($this->to_date)) {
        $reToDate = $this->toDBDate($this->to_date);                
        $criteria->addCondition('tanggal_tolak <= "'.$reToDate.'" ');		
        }
                
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
	}
	public function searchTolak() {		
		$criteria=new CDbCriteria;           
        $criteria->join= ' INNER JOIN `proposal` `rCM` ON (`rCM`.`proposal_id`=`t`.`proposal_id`)  ';
        $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = rCM.marketing ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
		$criteria->compare('tolak_id',$this->tolak_id);		
		$criteria->compare('tanggal_tolak',$this->tanggal_tolak,true);
		$criteria->compare('alasan_ditolak',$this->alasan_ditolak,true);		
		$criteria->compare('mp.nama',$this->marketing_search,true);		
		$criteria->compare('rCM.nama_nasabah',$this->nama_nasabah,true);
                $criteria->compare('uk.nama',$this->unit_kerja,true);
        $criteria->addCondition("rCM.status_pengajuan = '".vC::APP_status_proposal_tolak_approv."' ");   
        if ($this->tahap_penolakan == vc::APP_tahapan_lainya) {
            $arrTahap = tolakTahapan::getArrTahapan();
            foreach ($arrTahap as $key => $value) {
                $criteria->addCondition("tahap_penolakan <> '".$value."' ");                 
            }            
        } else {
            $criteria->compare('tahap_penolakan',$this->tahap_penolakan,true);
        }
        if (!empty($this->from_date)) {                
        $reFromDate = $this->toDBDate($this->from_date);                
        $criteria->addCondition('tanggal_tolak >= "'.$reFromDate.'" ');                
        }
        if (!empty($this->to_date)) {
        $reToDate = $this->toDBDate($this->to_date);                
        $criteria->addCondition('tanggal_tolak <= "'.$reToDate.'" ');		
        }
                
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
	}
	public function searchTolak_Print() {		
		$criteria=new CDbCriteria;           
        $criteria->join= ' INNER JOIN `proposal` `rCM` ON (`rCM`.`proposal_id`=`t`.`proposal_id`)  ';
        $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = rCM.marketing ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
		$criteria->compare('tolak_id',$this->tolak_id);		
		$criteria->compare('tanggal_tolak',$this->tanggal_tolak,true);
		$criteria->compare('alasan_ditolak',$this->alasan_ditolak,true);		
		$criteria->compare('mp.nama',$this->marketing_search,true);		
		$criteria->compare('rCM.nama_nasabah',$this->nama_nasabah,true);
                $criteria->compare('uk.nama',$this->unit_kerja,true);
        $criteria->addCondition("rCM.status_pengajuan = '".vC::APP_status_proposal_tolak_approv."' ");   
        if ($this->tahap_penolakan == vc::APP_tahapan_lainya) {
            $arrTahap = tolakTahapan::getArrTahapan();
            foreach ($arrTahap as $key => $value) {
                $criteria->addCondition("tahap_penolakan <> '".$value."' ");                 
            }            
        } else {
            $criteria->compare('tahap_penolakan',$this->tahap_penolakan,true);
        }
        if (!empty($this->from_date)) {                
        $reFromDate = $this->toDBDate($this->from_date);                
        $criteria->addCondition('tanggal_tolak >= "'.$reFromDate.'" ');                
        }
        if (!empty($this->to_date)) {
        $reToDate = $this->toDBDate($this->to_date);                
        $criteria->addCondition('tanggal_tolak <= "'.$reToDate.'" ');		
        }
                
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                            'pageSize'=>1000,
                        ),
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
    
        public function getTotalTolak () {
            $query1 = "SELECT COUNT(tolak_id) FROM tolak";                        
            $count=Yii::app()->db->createCommand($query1)->queryScalar();            
            return $count==null?0:$count;
        }
        public function beforeSave()
        {
                if(parent::beforeSave())
                {  
                    if(!empty($this->tanggal_tolak)){
                        $data = explode('/' ,$this->tanggal_tolak);                
                        if(count($data) > 2) {
                        $this->tanggal_tolak = $data[2].'-'.$data[1].'-'.$data[0];
                        }
                    }                                
                }
        return true;
        }
        public function sendMailApprove(){
            $mail_set = mailer::model()->findByPk(1);
            $model_proposal = proposal::model()->findByPk($this->proposal_id);
            $model_marketing = pegawai::model()->findByPk($model_proposal->marketing);
           
            $message = new YiiMailMessage();            
            $message->view = 'approval_nasabah_tolak';        
            $message->subject    = 'Nasabah Ditolak KCP Lubuk Sikaping  '.vC::APP_nama_KCP.
                    ' tanggal '.Yii::app()->numberFormatter->formatDate($this->tanggal_tolak)
                    .' '.$model_marketing->rUnK->nama;    
            $listEmail = ListEmail::model()->findAll("status = '".vC::APP_status_email_semua."' 
                                      OR status = '".vc::APP_status_email_aproval ."'");                       
           foreach ($listEmail as $key => $data) {                    
            $message->addTo($data->email_address);                    
            }
           if(empty($model_proposal)){
               $model_proposal = new proposal;
           }
           if(empty($model_marketing)){
               $model_marketing = new pegawai;
           }
            $param = array (
                'model_tolak'=>$this,
                'model_proposal'=>$model_proposal,
                'model_marketing'=>$model_marketing
                    );          
            $message->setBody($param, 'text/html');                
            $message->from = vc::APP_from_email;   

            try
            {  
                 Yii::app()->mail->transportOptions = array(
                    'host' => "$mail_set->host",
                    'username' => "$mail_set->nama",
                    'password' => "$mail_set->password",
                    'port' => "$mail_set->port",
                    );
                Yii::app()->mail->send($message);                
                //$model->status = 4;
                //$model->save();
                //$this->redirect(array('view','id'=>$model->nasabah_id));
            }
            catch (Exception $exc)
            {                                        
                return false;
            }             

            return true;
        }
        public function sendNotif() {
          $mail_set = mailer::model()->findByPk(1);
          $message = new YiiMailMessage();            
          $message->view = 'input_nasabah_tolak';        
          $message->subject    = 'Nasabah Tolak Baru KCP'.vC::APP_nama_KCP;         
          $listEmail = ListEmail::model()->findAll("status = '".vC::APP_status_email_semua."' 
                                      OR status = '".vc::APP_status_email_nasabah_tolak ."'");
          $model_marketing = pegawai::model()->findByPk("nama = '".$this->nama_nasabah."'"); 
          foreach ($listEmail as $key => $data) {                    
           $message->addTo($data->email_address);                    
          }
          if(!empty($model_marketing) && !empty($model_marketing->email_atasan)) {
              $message->addTo($model_marketing->email_atasan);                    
          }

              $param = array ('tolak'=>$this);
              $message->setBody($param, 'text/html');                
              $message->from = vc::APP_from_email;   

          try
          {  
               Yii::app()->mail->transportOptions = array(
                  'host' => "$mail_set->host",
                  'username' => "$mail_set->nama",
                  'password' => "$mail_set->password",
                  'port' => "$mail_set->port",
                  );
              Yii::app()->mail->send($message);                
              //$model->status = 4;
              //$model->save();
              //$this->redirect(array('view','id'=>$model->nasabah_id));
          }
          catch (Exception $exc)
          {                                        
              return false;
          }             

          return true;
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
