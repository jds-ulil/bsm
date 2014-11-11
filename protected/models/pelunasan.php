<?php

/**
 * This is the model class for table "pelunasan".
 *
 * The followings are the available columns in table 'pelunasan':
 * @property integer $pelunasan_id
 * @property string $tanggal_pelunasan
 * @property string $penyebab
 * @property integer $segmen
 * @property string $jenis_usaha
 * @property string $nama_nasabah
 * @property string $no_CIF
 * @property string $no_rekening
 * @property string $plafon_awal
 * @property string $OS_pokok_terakhir
 * @property string $angsuran
 * @property string $kolektibilitas_terakhir
 * @property string $alamat_nasabah
 * @property integer $jenis_pembiayaan
 * @property string $margin
 * @property string $tunggakan_terakhir
 */
class pelunasan extends CActiveRecord
{
    public $tempLL;
    public $from_date;
    public $to_date;
    public $unit_kerja;
    public $sKeyword;
    public $sValue;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelunasan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('tanggal_pelunasan, nama_nasabah, segmen, penyebab, jenis_pembiayaan, 
                            no_rekening','required','on'=>'insert'),
                        array('tanggal_pelunasan', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'insert'),
			array('segmen, jenis_pembiayaan, no_CIF, no_rekening', 'numerical', 'integerOnly'=>true),
			array('no_CIF,', 'length', 'max'=>8),
                        array('sValue, sKeyword, tempLL, status_pelunasan, marketing, unit_kerja','safe'),
			array('no_rekening,', 'length', 'max'=>10),
			array('jenis_usaha', 'length', 'max'=>50),
			array('nama_nasabah', 'length', 'max'=>100),
			array('plafon_awal, OS_pokok_terakhir, angsuran, kolektibilitas_terakhir, tunggakan_terakhir', 'length', 'max'=>20),
			array('margin', 'length', 'max'=>8),
			array('tanggal_pelunasan, penyebab, alamat_nasabah, from_date, to_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pelunasan_id,unit_kerja, tanggal_pelunasan, penyebab, segmen, jenis_usaha, nama_nasabah, no_CIF, no_rekening, plafon_awal, OS_pokok_terakhir, angsuran, kolektibilitas_terakhir, alamat_nasabah, jenis_pembiayaan, margin, tunggakan_terakhir', 'safe', 'on'=>'search'),
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
                    'rSeg' => array(self::BELONGS_TO, 'Segmen', 'segmen'),
                    'rJen' => array(self::BELONGS_TO, 'jenisPembiayaan', 'jenis_pembiayaan'),
                    'rKol' => array(self::BELONGS_TO, 'Kolektabilitas', 'kolektibilitas_terakhir'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pelunasan_id' => 'Pelunasan',
			'tanggal_pelunasan' => 'Tanggal Pelunasan',
			'penyebab' => 'Penyebab',
			'segmen' => 'Segmen',
			'jenis_usaha' => 'Jenis Usaha',
			'nama_nasabah' => 'Nama Nasabah',
			'no_CIF' => 'No. CIF',
			'no_rekening' => 'No. Rekening',
			'plafon_awal' => 'Plafon Awal (Rp)',
			'OS_pokok_terakhir' => 'Os Pokok Terakhir (Rp)',
			'angsuran' => 'Angsuran (Rp)',
			'kolektibilitas_terakhir' => 'Kolektibilitas Terakhir',
			'alamat_nasabah' => 'Alamat Nasabah',
			'jenis_pembiayaan' => 'Jenis Pembiayaan',
			'margin' => 'Margin (%)',
			'tunggakan_terakhir' => 'Tunggakan Terakhir (Rp)',
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
        
        if(!empty($this->unit_kerja)){
        $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = t.marketing ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
        $criteria->compare('uk.nama',$this->unit_kerja,true);
        }
              
		$criteria->compare('pelunasan_id',$this->pelunasan_id);
		$criteria->compare('tanggal_pelunasan',$this->tanggal_pelunasan,true);
		$criteria->compare('penyebab',$this->penyebab,true);
		$criteria->compare('segmen',$this->segmen);
		$criteria->compare('jenis_usaha',$this->jenis_usaha,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening',$this->no_rekening,true);
		$criteria->compare('plafon_awal',$this->plafon_awal,true);
		$criteria->compare('OS_pokok_terakhir',$this->OS_pokok_terakhir,true);
		$criteria->compare('angsuran',$this->angsuran,true);
		$criteria->compare('kolektibilitas_terakhir',$this->kolektibilitas_terakhir,true);
		$criteria->compare('alamat_nasabah',$this->alamat_nasabah,true);
		$criteria->compare('jenis_pembiayaan',$this->jenis_pembiayaan);
		$criteria->compare('margin',$this->margin,true);
		$criteria->compare('tunggakan_terakhir',$this->tunggakan_terakhir,true);
		$criteria->compare('status_pelunasan',$this->status_pelunasan,true);
        //$criteria->compare('uk.nama',$this->unit_kerja,true);
                
                
                if (!empty($this->from_date)) {                
                $reFromDate = $this->toDBDate($this->from_date);                
                $criteria->addCondition('tanggal_pelunasan >= "'.$reFromDate.'" ');                
                }
                if (!empty($this->to_date)) {
                $reToDate = $this->toDBDate($this->to_date);                
                $criteria->addCondition('tanggal_pelunasan <= "'.$reToDate.'" ');		
                }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_print()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        
        if(!empty($this->unit_kerja)){
        $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = t.marketing ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
        $criteria->compare('uk.nama',$this->unit_kerja,true);
        }
              
		$criteria->compare('pelunasan_id',$this->pelunasan_id);
		$criteria->compare('tanggal_pelunasan',$this->tanggal_pelunasan,true);
		$criteria->compare('penyebab',$this->penyebab,true);
		$criteria->compare('segmen',$this->segmen);
		$criteria->compare('jenis_usaha',$this->jenis_usaha,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening',$this->no_rekening,true);
		$criteria->compare('plafon_awal',$this->plafon_awal,true);
		$criteria->compare('OS_pokok_terakhir',$this->OS_pokok_terakhir,true);
		$criteria->compare('angsuran',$this->angsuran,true);
		$criteria->compare('kolektibilitas_terakhir',$this->kolektibilitas_terakhir,true);
		$criteria->compare('alamat_nasabah',$this->alamat_nasabah,true);
		$criteria->compare('jenis_pembiayaan',$this->jenis_pembiayaan);
		$criteria->compare('margin',$this->margin,true);
		$criteria->compare('tunggakan_terakhir',$this->tunggakan_terakhir,true);
		$criteria->compare('status_pelunasan',$this->status_pelunasan,true);
        //$criteria->compare('uk.nama',$this->unit_kerja,true);
                
                
                if (!empty($this->from_date)) {                
                $reFromDate = $this->toDBDate($this->from_date);                
                $criteria->addCondition('tanggal_pelunasan >= "'.$reFromDate.'" ');                
                }
                if (!empty($this->to_date)) {
                $reToDate = $this->toDBDate($this->to_date);                
                $criteria->addCondition('tanggal_pelunasan <= "'.$reToDate.'" ');		
                }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>1000,
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return pelunasan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}       
        public function beforeSave()
	{
            if(parent::beforeSave())
            { 
            if(!empty($this->tanggal_pelunasan)){
                $this->tanggal_pelunasan = $this->toDBDate($this->tanggal_pelunasan);                        
                }
            }
            if (!empty($this->plafon_awal)) {
                $this->plafon_awal = str_replace(".","",  $this->plafon_awal);
            }
            if (!empty($this->OS_pokok_terakhir)) {
                $this->OS_pokok_terakhir = str_replace(".","",  $this->OS_pokok_terakhir);
            }
            if (!empty($this->angsuran)) {
                $this->angsuran = str_replace(".","",  $this->angsuran);
            }
            if (!empty($this->tunggakan_terakhir)) {
                $this->tunggakan_terakhir = str_replace(".","",  $this->tunggakan_terakhir);
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
        function searchfromglobal($keyword,$val){           
            $criteria = new CDbCriteria();                
            switch ($val){
                case 1:    
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(nama_nasabah) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'nama_nasabah';  
                        }
                    break;   
                case 2:                    
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(no_rekening) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'no_rekening';  
                        }
                    break;  
            }
            return;
       }
       
       public function searchForGlobalPelunasan()
        {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;               
        if (!empty($this->sKeyword)) {            
                $this->status_pelunasan = vC::APP_status_pelunasan_approv;
                $criteria->compare('status_pelunasan',$this->status_pelunasan);
                $var = $this->sKeyword;
                $this->$var = $this->sValue;
                $criteria->compare("LOWER($var)",strtolower($this->$var),true);   
            } else {
                $this->status_pelunasan = 22;
                $criteria->compare('status_pelunasan',$this->status_pelunasan);
            }
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,                        
		));
	}
}
