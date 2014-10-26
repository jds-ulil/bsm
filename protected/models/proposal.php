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
    public $from_date;
    public $to_date;
    public $from_plafon;
    public $to_plafon;
    public $unit_kerja;
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
			array('jenis_identitas, nama_nasabah, segmen, marketing, no_kartu_keluarga, no_ktp, tanggal_pengajuan, jenis_usaha', 'required', 'on'=>'create'),
			array('jenis_identitas, nama_nasabah, segmen, marketing, no_kartu_keluarga, no_ktp, tanggal_pengajuan, jenis_usaha', 'required', 'on'=>'update'),
			array('segmen, jenis_nasabah, existing_kolektabilitas, del_flag', 'numerical', 'integerOnly'=>true),
			array('marketing, no_kartu_keluarga, no_buku_nikah, no_ktp, no_proposal, existing_plafon, referal_nama, referal_sektor_usaha', 'length', 'max'=>50),
			//array('no_proposal', 'unique'),
                        array('nama_nasabah', 'checkTolakNama', 'on'=>'create'),
                        array('no_ktp', 'checkTolakKtp', 'on'=>'create'),
                        array('no_buku_nikah', 'checkTolakBukuNikah', 'on'=>'create'),
                        array('no_kartu_keluarga', 'checkNoKK', 'on'=>'create'),
			array('status_pengajuan', 'length', 'max'=>3),
			array('plafon,existing_os, existing_angsuran, referal_telp, referal_fasilitas', 'length', 'max'=>20),
			array('referal_kolektabilitas', 'length', 'max'=>2),
			array('unit_kerja, tanggal_pengajuan,no_proposal, referal_alamat, plafon, mode', 'safe'),
                        array('tanggal_kartu_keluarga', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
                        array('tanggal_pengajuan', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
			array('existing_os, existing_angsuran, existing_kolektabilitas, existing_plafon', 'existing_required'),
			array('referal_nama, referal_alamat, referal_telp, referal_sektor_usaha, referal_fasilitas, referal_kolektabilitas', 'referal_required'),            
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('unit_kerja, jenis_identitas, from_plafon, to_plafon, to_date, from_date, proposal_id, tanggal_pengajuan, segmen, jenis_usaha, marketing, no_kartu_keluarga, no_buku_nikah, no_ktp, no_proposal, status_pengajuan, jenis_nasabah, existing_plafon, existing_os, existing_angsuran, existing_kolektabilitas, referal_nama, referal_alamat, referal_telp, referal_sektor_usaha, referal_fasilitas, referal_kolektabilitas, del_flag', 'safe', 'on'=>'search'),
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
                    'rMar' => array(self::BELONGS_TO, 'pegawai', 'marketing'),
                    'roMar' => array(self::HAS_ONE, 'pegawai', array('pegawai_id'=>'marketing')),
                    'rJen' => array(self::BELONGS_TO, 'jenisIdentitas', 'jenis_identitas'),
                    'rStat' => array(self::BELONGS_TO, 'statusProposal', 'status_pengajuan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'jenis_identitas,' => 'NAMA NASABAH',
			'proposal_id' => 'Proposal',
			'tanggal_pengajuan' => 'Tgl. Pengajuan',
			'segmen' => 'Segmen',
			'plafon' => 'Plafon Pengajuan (Rp)',
			'jenis_usaha' => 'Jenis Usaha',
			'marketing' => 'Nama',
			'no_kartu_keluarga' => 'Nomor',
			'no_buku_nikah' => 'Nomor',
			'no_ktp' => 'No Identitas',
			'no_proposal' => 'No. Proposal',
			'status_pengajuan' => 'Status Proposal',
			'jenis_nasabah' => 'Jenis Nasabah',
			'existing_plafon' => 'Existing Plafon (Rp)',
			'existing_os' => 'Existing Os/Pokok (Rp)',
			'existing_angsuran' => 'Existing Angsuran/Bulan (Rp)',
			'existing_kolektabilitas' => 'Existing Kolektibilitas',
			'referal_nama' => 'Referal Nama',
			'referal_alamat' => 'Referal Alamat',
			'referal_telp' => 'Referal Telp',
			'referal_sektor_usaha' => 'Referal Sektor Usaha',
			'referal_fasilitas' => 'Referal Fasilitas (Rp)',
			'referal_kolektabilitas' => 'Referal Kolektibilitas',
			'del_flag' => 'Del Flag',
			'namaJenisNasabah' => 'Jenis Nasabah',
                        'from_date' => "Dari Tanggal",
                        'to_date' => "Sampai Dengan",
                        'from_plafon' => "Mulai Dari",
                        'to_plafon' => "Sampai Dengan",
                        'jenis_identitas,' => "Jenis Identitas",
                        'tanggal_kartu_keluarga,' => "Tanggal",
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->join= ' INNER JOIN `mtb_pegawai` `rMar` ON (`rMar`.`pegawai_id`=`t`.`marketing`)  ';
                $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON rMar.unit_kerja = uk.unit_kerja_id  ';           
                
		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('tanggal_pengajuan',$this->tanggal_pengajuan,true);
		$criteria->compare('plafon',$this->plafon);
		$criteria->compare('segmen',$this->segmen);
		$criteria->compare('jenis_usaha',$this->jenis_usaha);
		$criteria->compare('rMar.nama',$this->marketing,true);
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
		$criteria->compare('tanggal_kartu_keluarga',$this->tanggal_kartu_keluarga,true);
		$criteria->compare('del_flag',$this->del_flag);
		$criteria->compare('uk.nama',$this->unit_kerja,true);
                
                if (!empty($this->from_date)) {                
                $reFromDate = $this->toDBDate($this->from_date);                
                $criteria->addCondition('tanggal_pengajuan >= "'.$reFromDate.'" ');                
                }
                if (!empty($this->to_date)) {
                $reToDate = $this->toDBDate($this->to_date);                
                $criteria->addCondition('tanggal_pengajuan <= "'.$reToDate.'" ');		
                }
                if (!empty($this->from_plafon)) {
                    $this->from_plafon = str_replace('.','', $this->from_plafon);
                    $this->from_plafon = intval($this->from_plafon);
                    $criteria->addCondition("plafon >= $this->from_plafon ");
                }
                if (!empty($this->to_plafon)) {
                    $this->to_plafon = str_replace('.','', $this->to_plafon);
                    $this->to_plafon = intval($this->to_plafon);
                    $criteria->addCondition("plafon <= $this->to_plafon ");		
                }
        //$criteria->compare('status_pengajuan', vC::APP_status_proposal_new);
        //$criteria->addCondition('plafon <= "'.$this->to_plafon.'" ');	
		return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                            'pageSize'=>25,
                        ),
			'criteria'=>$criteria,
		));
	}
	public function search_print()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->join= ' INNER JOIN `mtb_pegawai` `rMar` ON (`rMar`.`pegawai_id`=`t`.`marketing`)  ';
                $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON rMar.unit_kerja = uk.unit_kerja_id  ';           
                
		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('tanggal_pengajuan',$this->tanggal_pengajuan,true);
		$criteria->compare('plafon',$this->plafon);
		$criteria->compare('segmen',$this->segmen);
		$criteria->compare('jenis_usaha',$this->jenis_usaha);
		$criteria->compare('rMar.nama',$this->marketing,true);
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
		$criteria->compare('tanggal_kartu_keluarga',$this->tanggal_kartu_keluarga,true);
		$criteria->compare('del_flag',$this->del_flag);
		$criteria->compare('uk.nama',$this->unit_kerja,true);
                
                if (!empty($this->from_date)) {                
                $reFromDate = $this->toDBDate($this->from_date);                
                $criteria->addCondition('tanggal_pengajuan >= "'.$reFromDate.'" ');                
                }
                if (!empty($this->to_date)) {
                $reToDate = $this->toDBDate($this->to_date);                
                $criteria->addCondition('tanggal_pengajuan <= "'.$reToDate.'" ');		
                }
                if (!empty($this->from_plafon)) {
                    $this->from_plafon = str_replace('.','', $this->from_plafon);
                    $this->from_plafon = intval($this->from_plafon);
                    $criteria->addCondition("plafon >= $this->from_plafon ");
                }
                if (!empty($this->to_plafon)) {
                    $this->to_plafon = str_replace('.','', $this->to_plafon);
                    $this->to_plafon = intval($this->to_plafon);
                    $criteria->addCondition("plafon <= $this->to_plafon ");		
                }
        //$criteria->compare('status_pengajuan', vC::APP_status_proposal_new);
        //$criteria->addCondition('plafon <= "'.$this->to_plafon.'" ');	
		return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                            'pageSize'=>1000,
                        ),
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
        public function checkTolakNama($attribute_name, $params)
        {
            $arrNamaTolak = Yii::app()->db->createCommand()
                            //->setFetchMode(PDO::FETCH_COLUMN,1)
                            ->select("nama_nasabah,proposal_id")
                            ->from("proposal")            
                            ->where("status_pengajuan = '".vC::APP_status_proposal_tolak."' OR "
                                    . " status_pengajuan = '".vC::APP_status_proposal_tolak_approv ."' ")
                            ->queryAll();                   
            foreach ($arrNamaTolak as $key => $value) {
                        if($value['nama_nasabah'] == $this->$attribute_name) {
                            $model_tolak = tolak::model()->find(" proposal_id = " . $value['proposal_id'] );
                            $this->addError($attribute_name, "Masuk Daftar Nasabah ditolak <a href='".YII::app()->createUrl('tolak/detail',array('id'=>$model_tolak->tolak_id))."' target='_blank'>Lihat Detail</a>");
                            return false;
                        }
                    }
            return true;
        }
        public function checkTolakBukuNikah($attribute_name, $params){
            $arrBukuNikahTolak = Yii::app()->db->createCommand()
                            ->select("pro.no_buku_nikah, pro.proposal_id")
                            ->from("proposal pro")                                                      
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."' OR "
                                    . " pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak_approv ."' ")
                            ->queryAll(); 
            foreach ($arrBukuNikahTolak as $key => $value) {
                        if($value['no_buku_nikah'] == $this->$attribute_name) {
                            $model_tolak = tolak::model()->find(" proposal_id = " . $value['proposal_id'] );
                            $this->addError($attribute_name, "Masuk Daftar Nasabah ditolak <a href='".YII::app()->createUrl('tolak/detail',array('id'=>$model_tolak->tolak_id))."' target='_blank'>Lihat Detail</a>");
                            return false;
                        }
                    }             
            return true;
        }
        public function checkNoKK($attribute_name, $params){
            $arrKKTolak = Yii::app()->db->createCommand()
                            ->select("pro.no_kartu_keluarga, pro.proposal_id")
                            ->from("proposal pro")                                                      
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."' OR "
                                    . " pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak_approv ."' ")
                            ->queryAll(); 
            foreach ($arrKKTolak as $key => $value) {
                        if($value['no_kartu_keluarga'] == $this->$attribute_name) {
                            $model_tolak = tolak::model()->find(" proposal_id = " . $value['proposal_id'] );
                            $this->addError($attribute_name, "Masuk Daftar Nasabah ditolak <a href='".YII::app()->createUrl('tolak/detail',array('id'=>$model_tolak->tolak_id))."' target='_blank'>Lihat Detail</a>");
                            return false;
                        }
                    }             
            return true;
        }
        public function checkTolakKtp($attribute_name, $params)
        {
             $arrKtpKKtolak = Yii::app()->db->createCommand()
                            //->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pkk.no_ktp, pro.proposal_id")
                            ->from("proposal pro")
                            ->join('proposal_kartu_keluarga pkk', 'pro.proposal_id=pkk.proposal_id')                            
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."' OR "
                                    . " pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak_approv ."' ")
                            ->queryAll();             
            $arrKtptolak = Yii::app()->db->createCommand()
                           // ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("pro.no_ktp, pro.proposal_id")
                            ->from("proposal pro")                            
                            ->where("pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak."' OR "
                                    . " pro.`status_pengajuan` = '".vC::APP_status_proposal_tolak_approv ."' ")
                            ->queryAll();            
//            foreach ($arrKtpKKtolak as $key => $value) {
//                        if($value['no_ktp'] == $this->$attribute_name) {
//                            $this->addError($attribute_name, "Masuk Daftar Nasabah ditolak <a href='".YII::app()->createUrl('proposal/detail',array('id'=>$value['proposal_id']))."' target='_blank'>Lihat Detail</a>");
//                            return false;
//                        }
//                    }
            $arrKtptolakAll = array_merge($arrKtpKKtolak, $arrKtptolak);
            foreach ($arrKtptolakAll as $key => $value) {
                        if($value['no_ktp'] == $this->$attribute_name) {
                            $model_tolak = tolak::model()->find(" proposal_id = " . $value['proposal_id'] );
                            $this->addError($attribute_name, "Masuk Daftar Nasabah ditolak <a href='".YII::app()->createUrl('tolak/detail',array('id'=>$model_tolak->tolak_id))."' target='_blank'>Lihat Detail</a>");
                            return false;
                        }
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
        public function beforeSave()
	{
		if(parent::beforeSave())
		{  
            if(!empty($this->tanggal_pengajuan)){
                $data = explode('/' ,$this->tanggal_pengajuan);
                if(count($data) > 2) {
                $this->tanggal_pengajuan = $data[2].'-'.$data[1].'-'.$data[0];
                }
            }
            if(!empty($this->tanggal_kartu_keluarga)){
                $data = explode('/' ,$this->tanggal_kartu_keluarga);
                if(count($data) > 2) {
                $this->tanggal_kartu_keluarga = $data[2].'-'.$data[1].'-'.$data[0];
                }
            }
            if (!empty($this->plafon)) {
                $this->plafon = str_replace(".","",  $this->plafon);
            }
            if (!empty($this->existing_plafon)) {
                $this->existing_plafon = str_replace(".","",  $this->existing_plafon);
            }
            if (!empty($this->existing_os)) {
                $this->existing_os = str_replace(".","",  $this->existing_os);
            }
            if (!empty($this->existing_angsuran)) {
                $this->existing_angsuran = str_replace(".","",  $this->existing_angsuran);
            }
            if (!empty($this->referal_fasilitas)) {
                $this->referal_fasilitas = str_replace(".","",  $this->referal_fasilitas);
            }
                     
		}
	return true;
	}
        public function sendNotif() {
            $mail_set = mailer::model()->findByPk(1);
            $message = new YiiMailMessage();            
            $message->view = 'input_proposal';        
            $message->subject    = 'Proposal Baru KCP'.vC::APP_nama_KCP;
            $model_marketing = pegawai::model()->findByPk($this->marketing);            
            $listEmail = ListEmail::model()->findAll("status = '".vC::APP_status_email_semua."' 
                                        OR status = '".vc::APP_status_email_input_proposal."'");
            foreach ($listEmail as $key => $data) {                    
             $message->addTo($data->email_address);                    
            }
            if(!empty($model_marketing) && !empty($model_marketing->email_atasan)) {
                $message->addTo($model_marketing->email_atasan);                    
            }
            
                $param = array ('proposal'=>$this,'marketing'=>$model_marketing);
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
       function getNextProNumber() {
            $ArrMaxNo = Yii::app()->db->createCommand()
                  ->setFetchMode(PDO::FETCH_COLUMN,0)
                  ->select("MAX(LEFT(pro.`no_proposal`,(LOCATE('/',pro.`no_proposal`)-1)))")
                  ->from("proposal pro")                                             
                  ->queryAll();       
            $input = $ArrMaxNo[0]+1;        
            $input = str_pad($input, 4, 0, STR_PAD_LEFT).'/'.date("m").'/'.date("Y");  
            return $input;
       }
}
