<?php

/**
 * This is the model class for table "naspoma".
 *
 * The followings are the available columns in table 'naspoma':
 * @property integer $id
 * @property string $nama
 * @property string $segmen
 * @property string $alasan
 * @property integer $jenis_pembiayaan
 * @property string $jenis_usaha
 * @property string $no_CIF
 * @property string $no_rekening
 * @property string $OS_pokok_terakhir
 * @property string $angs_per_hasil
 * @property string $kolektibilitas_terakhir
 * @property string $margin
 * @property string $tunggakan
 * @property string $no_ktp
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property integer $agama
 * @property string $status_perkawinan
 * @property string $pekerjaan
 * @property string $kewarganegaraan
 * @property string $masa_berlaku
 * @property string $desa
 */
class naspoma extends CActiveRecord
{
    
    // for searching variable
    public $unit_kerja;
    
    public $sKeyword;
    public $sValue;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'naspoma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kolektibilitas_terakhir, no_kartu_keluarga, nama, segmen, jenis_pembiayaan, jenis_identitas, no_identitas, tanggal_lahir, agama, status_perkawinan, masa_berlaku', 'required'),
			array('jenis_pembiayaan, agama', 'numerical', 'integerOnly'=>true),
			array('nama, jenis_usaha', 'length', 'max'=>100),
			array('segmen, jenis_identitas', 'length', 'max'=>2),
			array('no_kartu_keluarga, no_buku_nikah, no_CIF, no_rekening, tempat_lahir, status_perkawinan, pekerjaan, kewarganegaraan, desa', 'length', 'max'=>50),
			array('OS_pokok_terakhir, plafon_awal, angs_per_hasil, kolektibilitas_terakhir, tunggakan', 'length', 'max'=>20),
			array('marketing, margin', 'length', 'max'=>8),
            
            // checking date format
            array('tgl_kartu_keluarga', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
            array('tanggal_lahir', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
            array('masa_berlaku', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
            array('tgl_buku_nikah', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
            array('tgl_kartu_keluarga', 'type', 'type' => 'date', 'message' => '{attribute} bukan format tanggal.', 'dateFormat' => 'dd/mm/yyyy', 'on'=>'create'),
            
			array('no_identitas', 'length', 'max'=>30),
			array('sKeyword, sValue, tgl_kartu_keluarga, alasan, tanggal_lahir, alamat, masa_berlaku, tgl_buku_nikah', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_kartu_keluarga, tgl_kartu_keluarga, id, jenis_identitas, plafon_awal, nama, segmen, alasan, jenis_pembiayaan, jenis_usaha, no_CIF, no_rekening, OS_pokok_terakhir, angs_per_hasil, kolektibilitas_terakhir, margin, tunggakan, no_identitas, tempat_lahir, tanggal_lahir, alamat, agama, status_perkawinan, pekerjaan, kewarganegaraan, masa_berlaku, desa', 'safe', 'on'=>'search'),
			array('unit_kerja', 'safe', 'on'=>'search'),
            
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
            // connection to table kolektibilitas with id kolektibilitas_terakhir
            'rKol' => array(self::BELONGS_TO, 'kolektabilitas', 'kolektibilitas_terakhir'),
            // connection to table pegawai with id marketing
            'rMar' => array(self::BELONGS_TO, 'pegawai', 'marketing'),
            // connection to table segmen with id segmen
            'rSeg' => array(self::BELONGS_TO, 'Segmen', 'segmen'),
            // connection to table jenis pembiayaan
            'rJen' => array(self::BELONGS_TO, 'jenisPembiayaan', 'jenis_pembiayaan'),
            // conncection to table agama
            'rAgama' => array(self::BELONGS_TO, 'agama', 'agama'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'segmen' => 'Segmen',
			'alasan' => 'Alasan',
			'jenis_pembiayaan' => 'Jenis Pembiayaan',
			'jenis_usaha' => 'Jenis Usaha',
			'no_CIF' => 'No Cif',
			'no_rekening' => 'No Rekening',
            'plafon_awal' => 'Plafon Awal (Rp)',
			'OS_pokok_terakhir' => 'Os Pokok Terakhir (Rp)',
			'angs_per_hasil' => 'Angsuran/Bagi Hasil Perbulan (Rp)',
			'kolektibilitas_terakhir' => 'Kolektibilitas Terakhir',
			'margin' => 'Margin (%)',
			'tunggakan' => 'Tunggakan (Rp)',
            'jenis_identitas' => 'Jenis Identitas',
			'no_identitas' => 'No Identitas',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'alamat' => 'Alamat',
			'agama' => 'Agama',
			'status_perkawinan' => 'Status Perkawinan',
			'pekerjaan' => 'Pekerjaan',
			'kewarganegaraan' => 'Kewarganegaraan',
			'masa_berlaku' => 'Masa Berlaku',
			'desa' => 'Desa',
            'no_buku_nikah' => 'No Buku Nikah',
            'tgl_buku_nikah' => "Tanggal Buku Nikah",
            'no_kartu_keluarga' => "No Kartu Keluarga",
            'tgl_kartu_keluarga' => "Tanggal Kartu Keluarga",
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
        // join with pegawai then unit table
        $criteria->join= ' INNER JOIN `mtb_pegawai` `rMar` ON (`rMar`.`pegawai_id`=`t`.`marketing`)  ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON rMar.unit_kerja = uk.unit_kerja_id  ';           
        
        // add search base on 
        $criteria->compare('jenis_usaha', $this->jenis_usaha);
        $criteria->compare('jenis_pembiayaan', $this->jenis_pembiayaan);
        $criteria->compare('kolektibilitas_terakhir', $this->kolektibilitas_terakhir);
        $criteria->compare('segmen', $this->segmen);
        $criteria->compare('t.nama',$this->nama,true);
        $criteria->compare('uk.nama', $this->unit_kerja, true);
       
        return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                            'pageSize'=>25,
                        ),
			'criteria'=>$criteria,
		));
		
	}
    
    
    /**
     * different in row heigth wiht default search
     * @return \CActiveDataProvider for print as pdf
     */
    public function search_print()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        // join with pegawai then unit table
        $criteria->join= ' INNER JOIN `mtb_pegawai` `rMar` ON (`rMar`.`pegawai_id`=`t`.`marketing`)  ';
        $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON rMar.unit_kerja = uk.unit_kerja_id  ';           
        
        // add search base on 
        $criteria->compare('jenis_usaha', $this->jenis_usaha);
        $criteria->compare('jenis_pembiayaan', $this->jenis_pembiayaan);
        $criteria->compare('kolektibilitas_terakhir', $this->kolektibilitas_terakhir);
        $criteria->compare('segmen', $this->segmen);
        $criteria->compare('t.nama',$this->nama,true);
        $criteria->compare('uk.nama', $this->unit_kerja, true);
        
		return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                            'pageSize'=>10000,
                        ),
			'criteria'=>$criteria,
		));
	}
    
    
    /**
     * 
     * @param type $keyword searching keyword input by user
     * @param type $val use for looping check
     * @return string
     */
    function searchfromglobal($keyword,$val){           
            $criteria = new CDbCriteria();                
            switch ($val){
                // nama
                case 1:    
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(nama) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'nama';  
                        }
                    break;                             
                // no identitas
                case 2:    
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(no_identitas) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'no_identitas';  
                        }
                    break;                             
                // no rekening
                case 3:    
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(no_rekening) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'no_rekening';  
                        }
                    break;                             
                // no kartu keluarga
                case 4:    
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(no_kartu_keluarga) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'no_kartu_keluarga';  
                        }
                    break;                             
                // no buku nikah
                case 5:    
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(no_buku_nikah) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'no_buku_nikah';  
                        }
                    break;                             
            }
            return;
       }
    
    
    
    public function searchForGlobalNaspoma() {
        $criteria=new CDbCriteria;
        
        if(empty($this->sKeyword)) {
            $this->id = 'AADC';
            $criteria->compare('id',$this->id);
        } else {            
            $var = $this->sKeyword;
            $this->$var = $this->sValue;
            $criteria->compare("LOWER($var)",strtolower($this->$var),true);   
        }
        
        return new CActiveDataProvider($this, array(                   
                'criteria'=>$criteria,
		));
    }   
     

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return naspoma the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * ovveride before save function
     *      - for date format
     *      - for money format
     * @return boolean
     */
    public function beforeSave()
	{
		if(parent::beforeSave())
		{  
            // change date format for save
            if(!empty($this->tanggal_lahir)){
                $this->tanggal_lahir = $this->toDBDate($this->tanggal_lahir);              
            }
            if(!empty($this->tgl_buku_nikah)){
                $this->tgl_buku_nikah = $this->toDBDate($this->tgl_buku_nikah);              
            }
            if(!empty($this->tgl_kartu_keluarga)){
                $this->tgl_kartu_keluarga = $this->toDBDate($this->tgl_kartu_keluarga);              
            }
            if(!empty($this->masa_berlaku)){
                $this->masa_berlaku = $this->toDBDate($this->masa_berlaku);              
            }
            if(!empty($this->tgl_kartu_keluarga)){
                $this->tgl_kartu_keluarga = $this->toDBDate($this->tgl_kartu_keluarga);              
            } 

            // variable that format in rupiah ex: 1.000.000
            $rupiah_variabel = array('plafon_awal', 'OS_pokok_terakhir', 'angs_per_hasil', 'tunggakan');
            
            // remove dot in money currency variable
            foreach ($rupiah_variabel as $key => $value) {
                if (!empty($this->$value)) {
                    $this->$value = str_replace(".","",  $this->$value);
                }
            }

		}
	return true;
	}
    
    
    
    //-----------USER DEFINITION FUNCTION---------------------------------//
    /*
     * name : toDBDate
     * param
     *      $date = date format dd/mm/year 
     *          ex : 22/10/2014
     * return
     *      output : 2014-10-22
     */    
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
