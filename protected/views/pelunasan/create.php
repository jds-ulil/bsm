<?php
$this->breadcrumbs=array(	
	'Pelunasan Tidak Normal (Strange)',
);
?>

<h3>Pelunasan Tidak Normal</h3>

<?php echo $this->renderPartial('_form', 
        array(  'model'=>$model,
                'listSegmen' => $listSegmen,
                'listKolektibilitas' => $listKolektibilitas,
                'listPembiayaan' => $listPembiayaan,
                'listSebab' => $listSebab,
            )); ?>