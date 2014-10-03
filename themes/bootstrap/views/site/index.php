<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'SADAR NADI KALA PENTING ',//.CHtml::encode(Yii::app()->name),
)); ?>

<p class="text-success selamatDatang">Sistem Aplikasi Daftar Nasabah Ditolak, Menunggak Akhir Bulan dan Pelunasan
    Tidak Normal/<i>Strange</i> pada BSM Wilayah Bukittingi</p>

<?php $this->endWidget(); ?>


  <div class="row">
        <div class="span4 kotak BiruFlat">
            <h2 class="headerKotak">Total</h2>
            <span class="jumlahKotakHijau"><?php echo $total_proposal; ?></span>
            <h2 class="footerKotak">Data Proposal</h2>
<!--          <p><a class="btn btn-inverse" href="#">Detail &raquo;</a></p>-->
        </div>
        <div class="span4 kotak HijauFlat">
          <h2 class="headerKotak">Total</h2>
            <span class="jumlahKotakHijau"><?php echo $total_tolak; ?></span>
            <h2 class="footerKotak">Nasabah Ditolak</h2>
<!--          <p><a class="btn btn-inverse" href="#">Detail &raquo;</a></p>-->
       </div>
        <div class="span4 kotak OrangeFlat">
          <h2 class="headerKotak">Belum Diproses</h2>
            <span class="jumlahKotakHijau">112</span>
            <h2 class="footerKotak">Belom Di Otor</h2>
<!--          <p><a class="btn btn-inverse" href="#">Detail &raquo;</a></p>-->
        </div>
</div>