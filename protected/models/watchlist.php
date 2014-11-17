<?php

/**
 * This is the model class for table "watchlist".
 *
 * The followings are the available columns in table 'watchlist':
 * @property integer $watchlist_id
 * @property string $no_loan
 * @property string $nama_nasabah
 * @property string $total_tunggakan
 * @property string $kolektibilitas
 * @property string $jenis_produk
 * @property string $no_CIF
 * @property string $no_rekening_angsuran
 * @property string $plafon
 * @property string $os_pokok
 * @property string $angsuran_bulanan
 * @property string $persentase_bagi_hasil
 * @property string $usaha_nasabah
 * @property string $tujuan_pembiayaan
 */
class watchlist extends CActiveRecord
{
    public $w_file;
    public $from_plafon;
    public $to_plafon;
    public $from_os;
    public $to_os;
    public $from_persen;
    public $to_persen;
    public $unit_kerja;
    
    public $from_date;
    public $to_date;
    
    public $sKeyword;
    public $sValue;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'watchlist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('w_file', 'file', 
                                    'types'=>'csv',
                                    'maxSize'=>1024 * 1024 * 2, // 10MB
                                    'tooLarge'=>'The file was larger than 2MB. Please upload a smaller file.',
                                    'allowEmpty' => true,
                            ),	                        
                array('sValue, sKeyword, tgl_upload, unit_kerja, from_plafon, to_plafon, from_os, to_os, from_persen, to_persen','safe'),
			array('no_loan, total_tunggakan, no_rekening_angsuran, plafon, os_pokok, angsuran_bulanan', 'length', 'max'=>20),
			array('nama_nasabah, no_CIF', 'length', 'max'=>50),
            array('status_tunggakan, tgl_bayar, from_date, to_date', 'safe'),
			array('kolektibilitas', 'length', 'max'=>3),
			array('jenis_produk, usaha_nasabah, tujuan_pembiayaan', 'length', 'max'=>100),
			array('persentase_bagi_hasil, marketing', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('status_tunggakan, tgl_bayar, from_date, to_date, tgl_upload, unit_kerja, marketing, from_plafon, to_plafon, from_os, to_os, from_persen, to_persen, w_file, watchlist_id, no_loan, nama_nasabah, total_tunggakan, kolektibilitas, jenis_produk, no_CIF, no_rekening_angsuran, plafon, os_pokok, angsuran_bulanan, persentase_bagi_hasil, usaha_nasabah, tujuan_pembiayaan', 'safe', 'on'=>'search'),
            
            // on addrow
            array('no_loan, nama_nasabah', 'required', 'on'=>'addrow'),
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
			'watchlist_id' => 'Watchlist',
			'no_loan' => 'No Loan',
			'nama_nasabah' => 'Nama Nasabah',
			'total_tunggakan' => 'Total Tunggakan',
			'kolektibilitas' => 'Kolektibilitas',
			'jenis_produk' => 'Jenis Produk',
			'no_CIF' => 'No Cif',
			'no_rekening_angsuran' => 'No Rekening Angsuran',
			'plafon' => 'Plafon',
			'os_pokok' => 'Os Pokok',
			'angsuran_bulanan' => 'Angsuran Bulanan',
			'persentase_bagi_hasil' => 'Persentase Bagi Hasil (%)',
			'usaha_nasabah' => 'Usaha Nasabah',
			'tujuan_pembiayaan' => 'Tujuan Pembiayaan',
                        'w_file' => 'Select file',
                        'from_plafon' => "Mulai Dari",
                        'to_plafon' => "Sampai Dengan",
                        'from_os' => "Mulai Dari",
                        'to_os' => "Sampai Dengan",
                        'from_persen' => "Mulai Dari",
                        'to_persen' => "Sampai Dengan",      
                        'marketing' => 'Pegawai',
                        'from_date' => "Dari Tanggal",
                        'to_date' => "Sampai Dengan",
            'tgl_upload' => "Tanggal Upload",
            'status_tunggakan' => "Status Tunggakan",
            'tgl_bayar' => "Tgl.Bayar Tunggakan",
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

		$criteria->compare('marketing',$this->marketing);
		$criteria->compare('watchlist_id',$this->watchlist_id);
		$criteria->compare('no_loan',$this->no_loan,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('total_tunggakan',$this->total_tunggakan,true);
		$criteria->compare('kolektibilitas',$this->kolektibilitas,true);
		$criteria->compare('jenis_produk',$this->jenis_produk,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening_angsuran',$this->no_rekening_angsuran,true);
		$criteria->compare('plafon',$this->plafon,true);
		$criteria->compare('os_pokok',$this->os_pokok,true);
		$criteria->compare('angsuran_bulanan',$this->angsuran_bulanan,true);
		$criteria->compare('persentase_bagi_hasil',$this->persentase_bagi_hasil,true);
		$criteria->compare('usaha_nasabah',$this->usaha_nasabah,true);
		$criteria->compare('tujuan_pembiayaan',$this->tujuan_pembiayaan,true);
                $criteria->compare('status_tunggakan',$this->status_tunggakan,true);
		$criteria->compare('tgl_bayar',$this->tgl_bayar,true);

        
                if (!empty($this->tgl_upload)) {
                    $this->tgl_upload = $this->toDBDate($this->tgl_upload);                
                    $criteria->compare('tgl_upload',$this->tgl_upload,true);
                    }
                    
                 if (!empty($this->from_plafon)) {
                    $this->from_plafon = str_replace(',','', $this->from_plafon);
                    $this->from_plafon = intval($this->from_plafon);
                    $criteria->addCondition("plafon >= $this->from_plafon ");
                }
                if (!empty($this->to_plafon)) {
                    $this->to_plafon = str_replace(',','', $this->to_plafon);
                    $this->to_plafon = intval($this->to_plafon);
                    $criteria->addCondition("plafon <= $this->to_plafon ");		
                }
                 if (!empty($this->from_os)) {
                    $this->from_os = str_replace(',','', $this->from_os);
                    $this->from_os = intval($this->from_os);
                    $criteria->addCondition("os_pokok >= $this->from_os ");
                }
                if (!empty($this->to_os)) {
                    $this->to_os = str_replace(',','', $this->to_os);
                    $this->to_os = intval($this->to_os);
                    $criteria->addCondition("os_pokok <= $this->to_os ");		
                }
                 if (!empty($this->from_persen)) {                      
                    $criteria->addCondition("persentase_bagi_hasil >= $this->from_persen ");                     
                }
                if (!empty($this->to_persen)) {                    
                    $criteria->addCondition("persentase_bagi_hasil <= $this->to_persen ");		
                }
                
                if (!empty($this->from_date)) {                
                    $reFromDate = $this->toDBDate($this->from_date);                
                    $criteria->addCondition('tgl_upload >= "'.$reFromDate.'" ');                
                }
                if (!empty($this->to_date)) {
                    $reToDate = $this->toDBDate($this->to_date);                
                    $criteria->addCondition('tgl_upload <= "'.$reToDate.'" ');		
                }
                
                if(!empty($this->unit_kerja)){
                $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = t.marketing ';
                $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
                $criteria->compare('uk.nama',$this->unit_kerja,true);
                }
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_print()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('watchlist_id',$this->watchlist_id);
		$criteria->compare('no_loan',$this->no_loan,true);
		$criteria->compare('nama_nasabah',$this->nama_nasabah,true);
		$criteria->compare('total_tunggakan',$this->total_tunggakan,true);
		$criteria->compare('kolektibilitas',$this->kolektibilitas,true);
		$criteria->compare('jenis_produk',$this->jenis_produk,true);
		$criteria->compare('no_CIF',$this->no_CIF,true);
		$criteria->compare('no_rekening_angsuran',$this->no_rekening_angsuran,true);
		$criteria->compare('plafon',$this->plafon,true);
		$criteria->compare('os_pokok',$this->os_pokok,true);
		$criteria->compare('angsuran_bulanan',$this->angsuran_bulanan,true);
		$criteria->compare('persentase_bagi_hasil',$this->persentase_bagi_hasil,true);
		$criteria->compare('usaha_nasabah',$this->usaha_nasabah,true);
		$criteria->compare('tujuan_pembiayaan',$this->tujuan_pembiayaan,true);
                $criteria->compare('status_tunggakan',$this->status_tunggakan,true);
		$criteria->compare('tgl_bayar',$this->tgl_bayar,true);
        
                if (!empty($this->tgl_upload)) {
                    $this->tgl_upload = $this->toDBDate($this->tgl_upload);                
                    $criteria->compare('tgl_upload',$this->tgl_upload,true);
                    }
                    
                 if (!empty($this->from_plafon)) {
                    $this->from_plafon = str_replace(',','', $this->from_plafon);
                    $this->from_plafon = intval($this->from_plafon);
                    $criteria->addCondition("plafon >= $this->from_plafon ");
                }
                if (!empty($this->to_plafon)) {
                    $this->to_plafon = str_replace(',','', $this->to_plafon);
                    $this->to_plafon = intval($this->to_plafon);
                    $criteria->addCondition("plafon <= $this->to_plafon ");		
                }
                 if (!empty($this->from_os)) {
                    $this->from_os = str_replace(',','', $this->from_os);
                    $this->from_os = intval($this->from_os);
                    $criteria->addCondition("os_pokok >= $this->from_os ");
                }
                if (!empty($this->to_os)) {
                    $this->to_os = str_replace(',','', $this->to_os);
                    $this->to_os = intval($this->to_os);
                    $criteria->addCondition("os_pokok <= $this->to_os ");		
                }
                 if (!empty($this->from_persen)) {                      
                    $criteria->addCondition("persentase_bagi_hasil >= $this->from_persen ");                     
                }
                if (!empty($this->to_persen)) {                    
                    $criteria->addCondition("persentase_bagi_hasil <= $this->to_persen ");		
                }
                
                if (!empty($this->from_date)) {                
                    $reFromDate = $this->toDBDate($this->from_date);                
                    $criteria->addCondition('tgl_upload >= "'.$reFromDate.'" ');                
                }
                if (!empty($this->to_date)) {
                    $reToDate = $this->toDBDate($this->to_date);                
                    $criteria->addCondition('tgl_upload <= "'.$reToDate.'" ');		
                }
                
                if(!empty($this->unit_kerja)){
                $criteria->join.= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = t.marketing ';
                $criteria->join.= ' INNER JOIN mtb_unit_kerja uk ON mp.unit_kerja = uk.unit_kerja_id ';
                $criteria->compare('uk.nama',$this->unit_kerja,true);
                }
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>1000),
		));
	}

    
    public function search_input($pegawai_id = null)
	{        
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        
        $criteria->select = 'tgl_upload';	
        if($pegawai_id != null) {
            $criteria->join .= ' INNER JOIN mtb_pegawai mp ON mp.pegawai_id = t.marketing ';
            $criteria->join .= ' INNER JOIN mtb_pegawai unit ON mp.`unit_kerja` = unit.`unit_kerja` ';
            $criteria->compare('unit.pegawai_id', $pegawai_id, true);
        }
         	$criteria->group = "tgl_upload";       
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return watchlist the static model class
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
                    $keyword = strtolower($keyword);
                    $keyword_db = addcslashes($keyword, '%_');
                    $criteria->condition = "LOWER(no_rekening_angsuran) like :param ";                    
                    $criteria->params = array(':param'=>"%$keyword_db%");
                        if($this->model()->exists($criteria)) {                              
                            return 'no_rekening_angsuran';  
                        }
                    break;                             
            }
            return;
       }
    public function searchForGlobalWatchlist() {
        $criteria=new CDbCriteria;
        
        if(empty($this->sKeyword)) {
            $this->watchlist_id = 'AADC';
            $criteria->compare('watchlist_id',$this->watchlist_id);
        } else {            
            $var = $this->sKeyword;
            $this->$var = $this->sValue;
            $criteria->compare("LOWER($var)",strtolower($this->$var),true);   
        }
        
        return new CActiveDataProvider($this, array(                   
                'criteria'=>$criteria,
		));
    }
}
