<?php

/**
 * This is the model class for table "mtb_unit_kerja".
 *
 * The followings are the available columns in table 'mtb_unit_kerja':
 * @property integer $unit_kerja_id
 * @property string $nama
 */
class watch extends CFormModel
{
    public $w_file;
	/**
	 * @return string the associated database table name
	 */
//	public function tableName()
//	{
//		return 'mtb_unit_kerja';
//	}

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
                            'allowEmpty' => false
                    ),	
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
            'w_file' => 'Select file',
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
	
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return unitkerja the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
