<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of constantVariabel
 *
 * @author Windows 7
 */
class vC {
    const APP_id_hak_akses_inputter = 3;
    const APP_id_hak_akses_approval = 2;    
    const APP_id_hak_akses_admin = 1;    
    const APP_label_admin = "Admin";
    const APP_label_inputer = "Inputer";
    const APP_label_approval = "Approval";
    
    const APP_jenis_nasabah_WIC = 1;
    const APP_jenis_nasabah_existing = 2;
    const APP_jenis_nasabah_refferal = 3;
    
    const APP_status_proposal_new = 1;
    const APP_status_proposal_tolak = 2;     
    const APP_status_proposal_tolak_approv = 3;     
    
    const APP_status_pelunasan_new = 1;
    const APP_status_pelunasan_to_approv = 2;
    const APP_status_pelunasan_approv = 3;
    
    const APP_tahapan_lainya = 'Lain-lain';
    
    const APP_status_email_semua = 1;
    const APP_status_email_input_proposal = 2;
    const APP_status_email_aproval = 3;
    const APP_status_email_nasabah_tolak = 4;
    const APP_status_email_tidak_aktif = 5;
    
    const APP_nama_KCP = "LUBUK SIKAPING";
    
    const APP_from_email = "oelhil@gmail.com";   
    
    const APP_header_csv_row = 7;
    
    const APP_status_laporan_new = 1;
    const APP_status_laporan_approve = 2;
    const APP_status_laporan_tolak = 3;
    
    const APP_daily_user_approval = 1;
    const APP_daily_user_inputter = 2;
    
    static function getText(){
        $text = Yii::app()->db->createCommand()
                            ->setFetchMode(PDO::FETCH_COLUMN,0)
                            ->select("text")
                            ->from("mtb_text")
                            ->where("`show` = 1")                            
                            ->queryAll();  
        return $text;
    }
}

?>
