<?php
$this->breadcrumbs=array(	
	'Nasabah Potensi Masalah (Proses Exit Strategy)',
);
?>
<h1 class="loginHead">Input Nasabah Potensi Masalah</h1>

<?php echo $this->renderPartial('_form', 
        array(
            'model'=>$model,
            'listSegmen'=>$listSegmen,
            'listPembiayaan' => $listPembiayaan,
            'listKolektibilitas' => $listKolektibilitas,
            'listJenisIdentitas' => $listJenisIdentitas,
            'listAgama' => $listAgama,
            'model_kartu_keluarga' => $model_kartu_keluarga, 
            )); ?>


