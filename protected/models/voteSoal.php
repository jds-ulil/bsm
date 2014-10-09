<?php

/**
 * This is the model class for table "vote_soal".
 *
 * The followings are the available columns in table 'vote_soal':
 * @property integer $id_soal
 * @property string $soal
 * @property integer $group_soal
 * @property integer $rank
 * @property string $pilihan_jawaban
 */
class voteSoal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vote_soal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_soal, rank', 'numerical', 'integerOnly'=>true),
			array('soal, pilihan_jawaban', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_soal, soal, group_soal, rank, pilihan_jawaban', 'safe', 'on'=>'search'),
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
			'id_soal' => 'Id Soal',
			'soal' => 'Soal',
			'group_soal' => 'Group Soal',
			'rank' => 'Rank',
			'pilihan_jawaban' => 'Pilihan Jawaban',
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

		$criteria->compare('id_soal',$this->id_soal);
		$criteria->compare('soal',$this->soal,true);
		$criteria->compare('group_soal',$this->group_soal);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('pilihan_jawaban',$this->pilihan_jawaban,true);
        $criteria->order = 'rank ASC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return voteSoal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
