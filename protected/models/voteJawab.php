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
			array('jawaban, nama_voter, jabatan_voter', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_jawab, soal_id, jawaban, nama_voter, jabatan_voter', 'safe', 'on'=>'search'),
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
			'nama_voter' => 'Nama',
                        'jabatan_voter' => 'Jabatan',
                        'tanggal_vote' => 'Tanggal Vote',
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

		$criteria->compare('id_jawab',$this->id_jawab);
		$criteria->compare('soal_id',$this->soal_id);
		$criteria->compare('jawaban',$this->jawaban,true);
		$criteria->compare('nama_voter',$this->nama_voter,true);
		$criteria->compare('jabatan_voter',$this->jabatan_voter,true);
		$criteria->compare('tanggal_vote',$this->tanggal_vote,true);

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
}
