<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class search extends CFormModel
{
    public $search_name;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(		
			// password needs to be authenticated
			array('search_name', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'search_name'=>'Keyword (Nama, NO KTP, NO KK, NO Buku Nikah atau NO Rekening)', 
		);
	}

	
}
