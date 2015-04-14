<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class dailyData extends CFormModel
{
    public $security, $customer_service, $teller, $back_office, $warung_mikro, $sales_assistan;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(		
			// password needs to be authenticated
			array('security, customer_service, teller, back_office, warung_mikro, sales_assistan', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'security'=>'Kriteria Nasabah Security', 
			'customer_service'=>'Kriteria Nasabah Customer Service', 
			'teller'=>'Kriteria Transaksi Teller', 
			'back_office'=>'Kriteria Transaksi Back Office', 
            'warung_mikro' => 'Kriteria Nasabah Warung Mikro',
            'sales_assistan' => 'Kriteria Nasabah Sales Assistant'
		);
	}

	
}
