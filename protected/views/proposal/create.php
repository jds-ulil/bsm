<?php

$this->breadcrumbs=array(	
	'Proposal Pembiayaan Baru',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>

<h1 class="loginHead">Input Data Proposal</h1>

<?php echo $this->renderPartial('_form', 
        array(
            'model_proposal'=>$model_proposal,
            'listSegmen'=>$listSegmen,
            'listAgama'=>$listAgama,
            'listKolektabilitas'=>$listKolektabilitas,
            'model_marketing'=>$model_marketing,
            'model_kartu_keluarga'=>$model_kartu_keluarga,  
            'model_kartu_keluarga'=>$model_kartu_keluarga,
            'model_buku_nikah'=>$model_buku_nikah,
            'model_ktp'=>$model_ktp,
        )); ?>