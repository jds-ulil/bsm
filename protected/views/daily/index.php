<?php

/* 
 * index file
 * first impression to daily report page
 */
?>
<style>
.container-fluid{
  height:90%;
  display:table;
  width: 100%;
  padding: 0;
}

.row-fluid {height: 100%; display:table-cell; vertical-align: middle;}

.centering {
  float:none;
  margin:0 auto;
}
.clear{
    clear: both;
}

/*class for menu item on center page*/
.dmenuitem {
    max-width:250px;
    min-height: 30px;
    margin: auto;   
    padding: 10px;
    position: relative; 
}

/*for set image layout*/
.dmenuitem img.laporan{
    max-height: 30px;       
    right: 0px;
    top: 0px;
    position: absolute;     
}

/*for set image layout*/
.dmenuitem img.inputan{
    max-height: 30px;       
    right: 40px;
    top: 0px;
    position: absolute;     
}

/*class for menu head*/
.dmenuheader {
    max-width:250px;
    min-height: 30px;
    margin: auto;   
    padding: 10px;    
    font-size: 24px;
}

.dlaporan {
    background-color: red;
}
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div>
            <div class="dmenuheader">
                <i>Menu Laporan Harian</i>                
            </div>            
            <div class="dmenuitem">
                <a href="<?php echo yii::app()->createUrl('daily/inputSecurity'); ?>">Security</a>
                <a href="<?php echo yii::app()->createUrl('daily/inputSecurity'); ?>">
                    <img class="inputan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/security.png"; ?>" title="Input Data Security" />
                </a> 
                <a href="<?php echo yii::app()->createUrl('daily/laporanSecurity'); ?>">
                    <img class="laporan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/report.png"; ?>" title="Laporan Data Security"  />
                </a>                                                                                             
            </div>               
            <div class="dmenuitem">
                <a href="<?php echo yii::app()->createUrl('daily/inputCS'); ?>">Customer Service</a>
                <a href="<?php echo yii::app()->createUrl('daily/inputCS'); ?>">
                    <img class="inputan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/customer_service.png"; ?>" />
                </a>
                <a href="<?php echo yii::app()->createUrl('daily/laporanCS'); ?>">
                    <img class="laporan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/report.png"; ?>" />
                </a> 
            </div>                   
            <div class="dmenuitem">
                <a href="<?php echo yii::app()->createUrl('daily/inputTeller'); ?>">Teller</a>
                <a href="<?php echo yii::app()->createUrl('daily/inputTeller'); ?>">
                    <img class="inputan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/teller.png"; ?>" />
                </a>
                <a href="<?php echo yii::app()->createUrl('daily/laporanTel'); ?>">
                    <img class="laporan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/report.png"; ?>" />
                </a>                 
            </div>                   
            <div class="dmenuitem">
                <a href="<?php echo yii::app()->createUrl('daily/inputBo'); ?>">Back Office</a>
                <a href="<?php echo yii::app()->createUrl('daily/inputBo'); ?>">
                    <img class="inputan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/bo.png"; ?>" />
                </a>
                <a href="<?php echo yii::app()->createUrl('daily/laporanBo'); ?>">
                    <img class="laporan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/report.png"; ?>" />
                </a>                 
            </div>                   
            <div class="dmenuitem">
                <a href="<?php echo yii::app()->createUrl('daily/inputWm'); ?>">Warung Mikro</a>
                <a href="<?php echo yii::app()->createUrl('daily/inputWm'); ?>">
                    <img class="inputan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/warungmikro.png"; ?>" />
                </a>
                <a href="<?php echo yii::app()->createUrl('daily/laporanWm'); ?>">
                    <img class="laporan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/report.png"; ?>" />
                </a>                 
            </div>                   
            <div class="dmenuitem">
                <a href="<?php echo yii::app()->createUrl('daily/inputSa'); ?>">Sales Assistant</a>
                <a href="<?php echo yii::app()->createUrl('daily/inputSa'); ?>">
                    <img class="inputan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/salesasistant.png"; ?>" />
                </a>
                <a href="<?php echo yii::app()->createUrl('daily/laporanSa'); ?>">
                    <img class="laporan" src = "<?php echo yii::app()->baseUrl."/images/dailymenu/report.png"; ?>" />
                </a>                 
            </div>                   
        </div>
    </div>    
</div>

