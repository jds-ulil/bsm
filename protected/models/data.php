<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class data extends CFormModel
{
    public $proposal, $watchlist, $pelunasan, $kuisioner, $naspoma;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(		
			// password needs to be authenticated
			array('proposal, watchlist, pelunasan, kuisioner, naspoma', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'proposal'=>'Data Proposal dan Nasabah Ditolak', 
			'watchlist'=>'Data Watchlist', 
			'pelunasan'=>'Data Pelunasan', 
			'kuisioner'=>'Data Kuisioner', 
            'naspoma' => 'Nasabah Wathclist Akhir Bulan'
		);
	}

	
}
