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
        
    public function voteResult($fd,$td,$uk){
        $from_date = '';
        $to_date = '';
        $unk = '';
        if(!empty($fd)) {
            $fd = $this->toDBDate($fd);
            $from_date = " AND vj2.`tanggal_vote` >= '$fd' ";
        }
        if(!empty($td)) {
            $td = $this->toDBDate($td);
            $to_date = " AND vj2.`tanggal_vote` <= '$td' ";
        }
        if(!empty($uk)) {
            $unk = " AND unk.nama = '$uk' ";
        }
        $sql = "
            SELECT jab.nama_jabatan,total_semua.jumlah_input,total_semua.partisipasi,
            CONCAT(ROUND(( tidak_penting.jumlah_input/total_semua.jumlah_input * 100 ),2),'%') AS tidak_penting,
            CONCAT(ROUND(( biasa_saja.jumlah_input/total_semua.jumlah_input * 100 ),2),'%') AS biasa_saja,
            CONCAT(ROUND(( cukup_penting.jumlah_input/total_semua.jumlah_input * 100 ),2),'%') AS cukup_penting,
            CONCAT(ROUND(( penting.jumlah_input/total_semua.jumlah_input * 100 ),2),'%') AS penting,
            CONCAT(ROUND(( sangat_penting.jumlah_input/total_semua.jumlah_input * 100 ),2),'%') AS sangat_penting
                FROM 
                (SELECT * FROM (
                SELECT total_each.nama_jabatan,total_per_jabatan AS jumlah_input, total_each.jenis_jawaban,
                CONCAT(ROUND(( total_per_jabatan/vote_tabel.total_vote * 100 ),2),'%') AS partisipasi
                ,CONCAT(ROUND(( jumlah_input/total_per_jabatan * 100 ),2),'%') AS percentage FROM 

                (SELECT COUNT(vj2.`id_jawab`) AS total_per_jabatan, peg2.`jabatan` FROM vote_jawab vj2 
                INNER JOIN mtb_pegawai peg2 ON vj2.`id_pegawai` = peg2.`pegawai_id`
                
                INNER JOIN mtb_unit_kerja unk ON peg2.`unit_kerja` = unk.`unit_kerja_id`
                WHERE TRUE".$from_date.$to_date.$unk.                
                "
                    
                GROUP BY peg2.`jabatan`) AS total_tabel

                INNER JOIN

                (SELECT vj.`jawaban` AS jenis_jawaban, jab.`nama_jabatan`, peg.`jabatan`, COUNT(vj.`id_jawab`) AS jumlah_input FROM vote_jawab vj 
                INNER JOIN mtb_pegawai peg ON vj.`id_pegawai` = peg.`pegawai_id`
                INNER JOIN mtb_jabatan jab ON peg.`jabatan` = jab.`id_jabatan`
                GROUP BY vj.`jawaban`, jab.`id_jabatan` ORDER BY jab.`nama_jabatan`) AS total_each

                ON total_tabel.jabatan = total_each.jabatan
                JOIN
                (SELECT COUNT(vj.id_jawab) AS total_vote,vj.`jawaban` AS jenis_jawaban FROM vote_jawab vj) AS vote_tabel)
                AS result_table) AS total_semua

                RIGHT JOIN 
                (SELECT * FROM mtb_jabatan) AS jab
                ON jab.nama_jabatan = total_semua.nama_jabatan

                LEFT JOIN

                (SELECT * FROM (
                SELECT total_each.nama_jabatan,jumlah_input, total_each.jenis_jawaban,
                CONCAT(ROUND(( total_per_jabatan/vote_tabel.total_vote * 100 ),2),'%') AS partisipasi
                ,CONCAT(ROUND(( jumlah_input/total_per_jabatan * 100 ),2),'%') AS percentage FROM 

                (SELECT COUNT(vj2.`id_jawab`) AS total_per_jabatan, peg2.`jabatan` FROM vote_jawab vj2 
                INNER JOIN mtb_pegawai peg2 ON vj2.`id_pegawai` = peg2.`pegawai_id`
                INNER JOIN mtb_unit_kerja unk ON peg2.`unit_kerja` = unk.`unit_kerja_id`
                WHERE TRUE".$from_date.$to_date.$unk.                
                "
                GROUP BY peg2.`jabatan`) AS total_tabel

                INNER JOIN

                (SELECT vj.`jawaban` AS jenis_jawaban, jab.`nama_jabatan`, peg.`jabatan`, COUNT(vj.`id_jawab`) AS jumlah_input FROM vote_jawab vj 
                INNER JOIN mtb_pegawai peg ON vj.`id_pegawai` = peg.`pegawai_id`
                INNER JOIN mtb_jabatan jab ON peg.`jabatan` = jab.`id_jabatan`
                GROUP BY vj.`jawaban`, jab.`id_jabatan` ORDER BY jab.`nama_jabatan`) AS total_each

                ON total_tabel.jabatan = total_each.jabatan
                JOIN
                (SELECT COUNT(vj.id_jawab) AS total_vote,vj.`jawaban` AS jenis_jawaban FROM vote_jawab vj) AS vote_tabel)
                AS result_table WHERE result_table.jenis_jawaban = 'Tidak Penting') AS tidak_penting

                ON tidak_penting.nama_jabatan = jab.nama_jabatan
                
                LEFT JOIN

                (SELECT * FROM (
                SELECT total_each.nama_jabatan,jumlah_input, total_each.jenis_jawaban,
                CONCAT(ROUND(( total_per_jabatan/vote_tabel.total_vote * 100 ),2),'%') AS partisipasi
                ,CONCAT(ROUND(( jumlah_input/total_per_jabatan * 100 ),2),'%') AS percentage FROM 

                (SELECT COUNT(vj2.`id_jawab`) AS total_per_jabatan, peg2.`jabatan` FROM vote_jawab vj2 
                INNER JOIN mtb_pegawai peg2 ON vj2.`id_pegawai` = peg2.`pegawai_id`
                INNER JOIN mtb_unit_kerja unk ON peg2.`unit_kerja` = unk.`unit_kerja_id`
                WHERE TRUE".$from_date.$to_date.$unk.                
                "
                GROUP BY peg2.`jabatan`) AS total_tabel

                INNER JOIN

                (SELECT vj.`jawaban` AS jenis_jawaban, jab.`nama_jabatan`, peg.`jabatan`, COUNT(vj.`id_jawab`) AS jumlah_input FROM vote_jawab vj 
                INNER JOIN mtb_pegawai peg ON vj.`id_pegawai` = peg.`pegawai_id`
                INNER JOIN mtb_jabatan jab ON peg.`jabatan` = jab.`id_jabatan`
                GROUP BY vj.`jawaban`, jab.`id_jabatan` ORDER BY jab.`nama_jabatan`) AS total_each

                ON total_tabel.jabatan = total_each.jabatan
                JOIN
                (SELECT COUNT(vj.id_jawab) AS total_vote,vj.`jawaban` AS jenis_jawaban FROM vote_jawab vj) AS vote_tabel)
                AS result_table WHERE result_table.jenis_jawaban = 'Biasa Saja') AS biasa_saja

                ON biasa_saja.nama_jabatan = jab.nama_jabatan

                LEFT JOIN

                (SELECT * FROM (
                SELECT total_each.nama_jabatan,jumlah_input, total_each.jenis_jawaban,
                CONCAT(ROUND(( total_per_jabatan/vote_tabel.total_vote * 100 ),2),'%') AS partisipasi
                ,CONCAT(ROUND(( jumlah_input/total_per_jabatan * 100 ),2),'%') AS percentage FROM 

                (SELECT COUNT(vj2.`id_jawab`) AS total_per_jabatan, peg2.`jabatan` FROM vote_jawab vj2 
                INNER JOIN mtb_pegawai peg2 ON vj2.`id_pegawai` = peg2.`pegawai_id`
                INNER JOIN mtb_unit_kerja unk ON peg2.`unit_kerja` = unk.`unit_kerja_id`
                WHERE TRUE".$from_date.$to_date.$unk.                
                "
                GROUP BY peg2.`jabatan`) AS total_tabel

                INNER JOIN

                (SELECT vj.`jawaban` AS jenis_jawaban, jab.`nama_jabatan`, peg.`jabatan`, COUNT(vj.`id_jawab`) AS jumlah_input FROM vote_jawab vj 
                INNER JOIN mtb_pegawai peg ON vj.`id_pegawai` = peg.`pegawai_id`
                INNER JOIN mtb_jabatan jab ON peg.`jabatan` = jab.`id_jabatan`
                GROUP BY vj.`jawaban`, jab.`id_jabatan` ORDER BY jab.`nama_jabatan`) AS total_each

                ON total_tabel.jabatan = total_each.jabatan
                JOIN
                (SELECT COUNT(vj.id_jawab) AS total_vote,vj.`jawaban` AS jenis_jawaban FROM vote_jawab vj) AS vote_tabel)
                AS result_table WHERE result_table.jenis_jawaban = 'Cukup Penting') AS cukup_penting

                ON cukup_penting.nama_jabatan = jab.nama_jabatan

                LEFT JOIN

                (SELECT * FROM (
                SELECT total_each.nama_jabatan,jumlah_input, total_each.jenis_jawaban,
                CONCAT(ROUND(( total_per_jabatan/vote_tabel.total_vote * 100 ),2),'%') AS partisipasi
                ,CONCAT(ROUND(( jumlah_input/total_per_jabatan * 100 ),2),'%') AS percentage FROM 

                (SELECT COUNT(vj2.`id_jawab`) AS total_per_jabatan, peg2.`jabatan` FROM vote_jawab vj2 
                INNER JOIN mtb_pegawai peg2 ON vj2.`id_pegawai` = peg2.`pegawai_id`
                INNER JOIN mtb_unit_kerja unk ON peg2.`unit_kerja` = unk.`unit_kerja_id`
                WHERE TRUE".$from_date.$to_date.$unk.                
                "
                GROUP BY peg2.`jabatan`) AS total_tabel

                INNER JOIN

                (SELECT vj.`jawaban` AS jenis_jawaban, jab.`nama_jabatan`, peg.`jabatan`, COUNT(vj.`id_jawab`) AS jumlah_input FROM vote_jawab vj 
                INNER JOIN mtb_pegawai peg ON vj.`id_pegawai` = peg.`pegawai_id`
                INNER JOIN mtb_jabatan jab ON peg.`jabatan` = jab.`id_jabatan`
                GROUP BY vj.`jawaban`, jab.`id_jabatan` ORDER BY jab.`nama_jabatan`) AS total_each

                ON total_tabel.jabatan = total_each.jabatan
                JOIN
                (SELECT COUNT(vj.id_jawab) AS total_vote,vj.`jawaban` AS jenis_jawaban FROM vote_jawab vj) AS vote_tabel)
                AS result_table WHERE result_table.jenis_jawaban = 'Penting') AS penting

                ON penting.nama_jabatan = jab.nama_jabatan

                LEFT JOIN

                (SELECT * FROM (
                SELECT total_each.nama_jabatan,jumlah_input, total_each.jenis_jawaban,
                CONCAT(ROUND(( total_per_jabatan/vote_tabel.total_vote * 100 ),2),'%') AS partisipasi
                ,CONCAT(ROUND(( jumlah_input/total_per_jabatan * 100 ),2),'%') AS percentage FROM 

                (SELECT COUNT(vj2.`id_jawab`) AS total_per_jabatan, peg2.`jabatan` FROM vote_jawab vj2 
                INNER JOIN mtb_pegawai peg2 ON vj2.`id_pegawai` = peg2.`pegawai_id`
                INNER JOIN mtb_unit_kerja unk ON peg2.`unit_kerja` = unk.`unit_kerja_id`
                WHERE TRUE".$from_date.$to_date.$unk.                
                "
                GROUP BY peg2.`jabatan`) AS total_tabel

                INNER JOIN

                (SELECT vj.`jawaban` AS jenis_jawaban, jab.`nama_jabatan`, peg.`jabatan`, COUNT(vj.`id_jawab`) AS jumlah_input FROM vote_jawab vj 
                INNER JOIN mtb_pegawai peg ON vj.`id_pegawai` = peg.`pegawai_id`
                INNER JOIN mtb_jabatan jab ON peg.`jabatan` = jab.`id_jabatan`
                GROUP BY vj.`jawaban`, jab.`id_jabatan` ORDER BY jab.`nama_jabatan`) AS total_each

                ON total_tabel.jabatan = total_each.jabatan
                JOIN
                (SELECT COUNT(vj.id_jawab) AS total_vote,vj.`jawaban` AS jenis_jawaban FROM vote_jawab vj) AS vote_tabel)
                AS result_table WHERE result_table.jenis_jawaban = 'Sangat Penting') AS sangat_penting

                ON sangat_penting.nama_jabatan = jab.nama_jabatan

                GROUP BY jab.nama_jabatan 

            ";
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        return $result;
    }
}
