<?php

/**
 * This is the model class for table "proposal".
 *
 * The followings are the available columns in table 'proposal':
 * @property integer $proposal_id
 * @property string $tanggal_pengajuan
 * @property integer $segmen
 * @property integer $jenis_usaha
 * @property string $marketing
 * @property string $no_kartu_keluarga
 * @property string $no_buku_nikah
 * @property string $no_ktp
 * @property string $no_proposal
 * @property string $status_pengajuan
 * @property integer $jenis_nasabah
 * @property string $existing_plafon
 * @property string $existing_os
 * @property string $existing_angsuran
 * @property integer $existing_kolektabilitas
 * @property string $referal_nama
 * @property string $referal_alamat
 * @property string $referal_telp
 * @property string $referal_sektor_usaha
 * @property string $referal_fasilitas
 * @property string $referal_kolektabilitas
 * @property integer $del_flag
 */
class proposal extends CActiveRecord
{
    public $mode = 'create';
    public $jenisNasabah = array (
            vc::APP_jenis_nasabah_WIC => "Walk In Customer (WIC)",
            vc::APP_jenis_nasabah_existing => "Existing",
            vc::APP_jenis_nasabah_refferal => "Referal",
        );   
    public $namaJenisNasabah = '';
    public $nasabahError;
    public $proposalError;
    public $percobaanInput;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proposal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('segmen,plafon, marketing, no_kartu_keluarga, no_ktp, tanggal_pengajuan, no_proposal, jenis_usaha', 'required'),
			array('segmen, jenis_nasabah, existing_kolektabilitas, del_flag', 'numerical', 'integerOnly'=>true),
			array('marketing, no_kartu_keluarga, no_buku_nikah, no_ktp, no_proposal, existing_plafon, referal_nama, referal_sektor_usaha', 'length', 'max'=>50),
			array('no_proposal', 'unique'),
			array('status_pengajuan', 'length', 'max'=>3),
			array('plafon,existing_os, existing_angsuran, referal_telp, referal_fasilitas', 'length', 'max'=>20),
			array('referal_kolektabilitas', 'length', 'max'=>2),
			array('tanggal_pengajuan, referal_alamat, mode', 'safe'),
                        array('tanggal_pengajuan', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'yyyy-MM-dd'),
			array('existing_os, existing_angsuran, existing_kolektabilitas, existing_plafon', 'existing_required'),
			array('referal_nama, referal_alamat, referal_telp, referal_sektor_usaha, referal_fasilitas, referal_kolektabilitas', 'referal_required'),            
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('proposal_id, tanggal_pengajuan, segmen, jenis_usaha, marketing, no_kartu_keluarga, no_buku_nikah, no_ktp, no_proposal, status_pengajuan, jenis_nasabah, existing_plafon, existing_os, existing_angsuran, existing_kolektabilitas, referal_nama, referal_alamat, referal_telp, referal_sektor_usaha, referal_fasilitas, referal_kolektabilitas, del_flag', 'safe', 'on'=>'search'),
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
                    'rKolEx' => array(self::BELONGS_TO, 'Kolektabilitas', 'existing_kolektabilitas'),
                    'rKolRef' => array(self::BELONGS_TO, 'Kolektabilitas', 'referal_kolektabilitas'),
                    'rSeg' => array(self::BELONGS_TO, 'Segmen', 'segmen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'proposal_id' => 'Proposal',
			'tanggal_pengajuan' => 'Tanggal Pengajuan',
			'segmen' => 'Segmen',
			'plafon' => 'Plafon Pengajuan (Rp)',
			'jenis_usaha' => 'Jenis Usaha',
			'marketing' => 'Marketing',
			'no_kartu_keluarga' => 'No Kartu Keluarga',
			'no_buku_nikah' => 'No Buku Nikah',
			'no_ktp' => 'No Ktp',
			'no_proposal' => 'No Proposal',
			'status_pengajuan' => 'Status Pengajuan',
			'jenis_nasabah' => 'Jenis Nasabah',
			'existing_plafon' => 'Existing Plafon (Rp)',
			'existing_os' => 'Existing Os (Rp)',
			'existing_angsuran' => 'Existing Angsuran (Rp)',
			'existing_kolektabilitas' => 'Existing Kolektabilitas',
			'referal_nama' => 'Referal Nama',
			'referal_alamat' => 'Referal Alamat',
			'referal_telp' => 'Referal Telp',
			'referal_sektor_usaha' => 'Referal Sektor Usaha',
			'referal_fasilitas' => 'Referal Fasilitas (Rp)',
			'referal_kolektabilitas' => 'Referal Kolektabilitas',
			'del_flag' => 'Del Flag',
			'namaJenisNasabah' => 'Jenis Nasabah',
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

		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('tanggal_pengajuan',$this->tanggal_pengajuan,true);
		$criteria->compare('plafon',$this->plafon);
		$criteria->compare('segmen',$this->segmen);
		$criteria->compare('jenis_usaha',$this->jenis_usaha);
		$criteria->compare('marketing',$this->marketing,true);
		$criteria->compare('no_kartu_keluarga',$this->no_kartu_keluarga,true);
		$criteria->compare('no_buku_nikah',$this->no_buku_nikah,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('no_proposal',$this->no_proposal,true);
		$criteria->compare('status_pengajuan',$this->status_pengajuan,true);
		$criteria->compare('jenis_nasabah',$this->jenis_nasabah);
		$criteria->compare('existing_plafon',$this->existing_plafon,true);
		$criteria->compare('existing_os',$this->existing_os,true);
		$criteria->compare('existing_angsuran',$this->existing_angsuran,true);
		$criteria->compare('existing_kolektabilitas',$this->existing_kolektabilitas);
		$criteria->compare('referal_nama',$this->referal_nama,true);
		$criteria->compare('referal_alamat',$this->referal_alamat,true);
		$criteria->compare('referal_telp',$this->referal_telp,true);
		$criteria->compare('referal_sektor_usaha',$this->referal_sektor_usaha,true);
		$criteria->compare('referal_fasilitas',$this->referal_fasilitas,true);
		$criteria->compare('referal_kolektabilitas',$this->referal_kolektabilitas,true);
		$criteria->compare('del_flag',$this->del_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return proposal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
        public function existing_required($attribute_name, $params)
        {
        if ($this->jenis_nasabah == vC::APP_jenis_nasabah_existing && empty($this->$attribute_name)) {
            $label = $this->getAttributeLabel($attribute_name);
            $this->addError($attribute_name, Yii::t('user', $label.' Tidak Boleh Kosong Untuk Jenis Nasabah Existing'));
            return false;
            }
        return true;
        }
        public function referal_required($attribute_name, $params)
        {
            if ($this->jenis_nasabah == vC::APP_jenis_nasabah_refferal && empty($this->$attribute_name)) {
                $label = $this->getAttributeLabel($attribute_name);
                $this->addError($attribute_name, Yii::t('user', $label.' Tidak Boleh Kosong Untuk Jenis Nasabah Existing'));
                return false;
                }
            return true;
        }
        public function getTotalProposal () {
            $query1 = "SELECT COUNT(proposal_id) FROM proposal                        
                        WHERE del_flag = 0";                        
            $count=Yii::app()->db->createCommand($query1)->queryScalar();            
            return $count==null?0:$count;
        }
        public function validNasabah ($model_kartu_keluarga) {
            $arrKtp = array();
            foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {                  
                $arrKtp[] = $model_kartu_keluargaEach->no_ktp;
            }
            $arrKtp[] = $this->no_ktp;
            //$noKtp = array(); = $this->no_ktp;
            
            $arrKtpKKtolak = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pkk.no_ktp")
                            ->from("proposal pro")
                            ->join('proposal_kartu_keluarga pkk', 'pro.no_proposal=pkk.no_proposal')
                            ->join('proposal_ktp pkt', 'pro.no_proposal=pkt.no_proposal')
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."'")
                            ->queryAll();             
            $arrKtptolak = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pro.no_ktp")
                            ->from("proposal pro")                            
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."'")
                            ->queryAll();  
            $arrBukuNikah = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pro.no_buku_nikah")
                            ->from("proposal pro")                            
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."'")
                            ->queryAll();              
            $arrMerge = array_merge($arrKtpKKtolak,$arrKtptolak);                                 
            foreach ($arrKtp as $key => $value) {
                if(in_array($value, $arrMerge)){
                      $arrPro = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pro.no_proposal")
                            ->from("proposal pro")
                            ->join('proposal_kartu_keluarga pkk', 'pro.no_proposal=pkk.no_proposal')
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."' AND 
                                    (
                                    pro.`no_ktp` = '".$value."' OR
                                    pkk.`no_ktp` = '".$value."' 
                                    )")                            
                            ->queryAll();  
                    $this->nasabahError = vC::APP_nasabah_error_tolak;                    
                    $this->proposalError = $arrPro[0];                    
                    return false;
                }
            }            
            if(in_array($this->no_buku_nikah, $arrBukuNikah)){
                      $arrPro = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pro.no_proposal")
                            ->from("proposal pro")
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."' AND                                
                                    pro.`no_buku_nikah` = '".$this->no_buku_nikah."'
                                    ")                            
                            ->queryAll();  
                    $this->nasabahError = vC::APP_nasabah_error_tolak;                    
                    $this->proposalError = $arrPro[0];                    
                    return false;
                }                                    
            return true;
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
}
