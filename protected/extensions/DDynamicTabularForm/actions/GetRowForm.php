<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetRowForm
 *
 * @author Web Developer
 */
class GetRowForm extends CAction{
    //put your code here
    public $view;
    public $modelClass;
    public $processOutput = true;
    public $list;
    
    public function run() {
        $controller = $this->getController();
        $model = new $this->modelClass;
        
        switch ($this->list){
            // security list
            case 1:
                $listData = CHtml::listData(dailySecurityJenisNasabah::model()->findAll(),'jenis_nasabah_id','nama');
                break;                            
            // CS list
            case 2:
                $listData = CHtml::listData(dailyCsKriteriaNasabah::model()->findAll(), 'cs_kriteria_nasabah_id', 'nama');
                break;                            
            // teller
            case 3:
                $listData = CHtml::listData(dailyTellerKriteriaTransaksi::model()->findAll(), 'jenis_transaksi_id', 'nama');
                break;                            
            // BO
            case 4:
                $listData = CHtml::listData(dailyBoKriteriaTransaksi::model()->findAll(), 'jenis_transaksi_id', 'nama');
                break;                            
            // WM
            case 5:
                $listData = CHtml::listData(dailyWmKriteriaNasabah::model()->findAll(), 'wm_kriteria_nasabah_id', 'nama');        
                break;                            
            // SA
            case 6:
                $listData = CHtml::listData(dailySaKriteriaNasabah::model()->findAll(), 'sa_kriteria_nasabah_id', 'nama');
                break;                            
            default :
                $listData = CHtml::listData(dailySecurityJenisNasabah::model()->findAll(),'jenis_nasabah_id','nama');
                break;
        }
        
        $form = new DynamicTabularForm();
        $controller->renderPartial($this->view,array('key'=>$_GET['key'], 'model'=>$model,'form'=>$form,'listData'=>$listData),false, $this->processOutput);
        
    }
}

?>
