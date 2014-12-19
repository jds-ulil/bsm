<?php
$this->breadcrumbs=array(
	'Halaman Pencarian',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#mtb-proposal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('#mtb-tolak-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('#mtb-pelunasan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('#mtb-watchlist-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('#mtb-naspoma-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1 class="loginHead">Kriteria Pencarian</h1>
<div class="search-form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model_search,'search_name',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
<h1 class="loginHead">Proposal Baru</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-tolak-grid',
	'dataProvider'=>$model_proposal->searchForGlobalBaru(),	
        'type'=>'bordered striped',
	'columns'=>array(	
		'nama_nasabah',		
		 array(
               'name'=>'Tgl Pengajuan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal_pengajuan)',
                ),		
                array(
                'name'=>'Plafon',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->plafon, "Rp ")',
                ),
                'jenis_usaha',
         array(
                'name'=>'Marketing',
                'value'=>'empty($data->rMar->nama)?"Deleted":$data->rMar->nama',
            ),
         array(
                'name'=>'Status',
                'value'=>'empty($data->rStat->nama)?"Deleted":$data->rStat->nama',
            ),
         array(
            'header' => 'Action',
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>"{view}",
                'viewButtonLabel' => "Detail Proposal",
                'viewButtonUrl'=>'Yii::app()->createUrl("/proposal/detail", array("id" =>$data[\'proposal_id\']))',
                'htmlOptions' => array(
                  //  'width' => '6%',
                  //  'align' => 'center',
                ),
            ),
        )	
)); ?>
<h1 class="loginHead">Nasabah Tolak</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model_proposal->searchForGlobalTolak(),	
        'type'=>'bordered striped',
	'columns'=>array(	
		'nama_nasabah',		
		 array(
               'name'=>'Tgl Pengajuan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal_pengajuan)',
                ),		
                array(
                'name'=>'Plafon',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->plafon, "Rp ")',
                ),
                'jenis_usaha',
         array(
                'name'=>'Marketing',
                'value'=>'empty($data->rMar->nama)?"Deleted":$data->rMar->nama',
            ),
         array(
                'name'=>'Status',
                'value'=>'empty($data->rStat->nama)?"Deleted":$data->rStat->nama',
            ),
         array(
            'header' => 'Action',
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>"{view}",
                'viewButtonLabel' => "Detail Penolakan",
                'viewButtonUrl'=>'Yii::app()->createUrl("/tolak/detail", array("id" =>$data->tol->tolak_id))',
                'htmlOptions' => array(
                  //  'width' => '6%',
                  //  'align' => 'center',
                ),
            ),
        )	
)); ?>

<h1 class="loginHead">Pelunasan Tidak Normal</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-pelunasan-grid',
	'dataProvider'=>$model_pelunasan->searchForGlobalPelunasan(),	
        'type'=>'bordered striped',
	'columns'=>array(			
                array(
                'name'=>'Tgl Pelunasan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal_pelunasan)',
                ),            
                'nama_nasabah',
                'no_rekening',
                'penyebab',
                array(
                    'header' => 'Action',
                            'class'=>'bootstrap.widgets.TbButtonColumn',
                            'template'=>'{view}',
                            'viewButtonLabel' => "Detail",
                            'viewButtonUrl'=>'Yii::app()->createUrl("pelunasan/detail", array("id" =>$data[\'pelunasan_id\']))',
                            'htmlOptions' => array(
                            //  'width' => '6%',
                            //  'align' => 'center',
                            ),
                        ),
            ),
        )	
); ?>

<h1 class="loginHead">WATCHLIST</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-watchlist-grid',
	'dataProvider'=>$model_watchlist->searchForGlobalWatchlist(),	
    'type'=>'bordered striped',
	'columns'=>array(	 
            'nama_nasabah',
            'kolektibilitas',              
             array(
                'name'=>'OS Pokok',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->os_pokok, "Rp ")',
                ),            
            'no_rekening_angsuran',
            array(
                'name'=>'Total Tunggakan',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total_tunggakan, "Rp ")',
                ),            
            array(
            'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
                        'viewButtonLabel' => "Detail Watchlist Data",
                        'viewButtonUrl'=>'Yii::app()->createUrl("/watch/detail", array("id" =>$data[\'watchlist_id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )
        )	
); ?>


<!----------------------NASABAH POTENSI TOLAK------------------------->
<h1 class="loginHead">NASABAH POTENSI TOLAK</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-naspoma-grid',
	'dataProvider'=>$model_naspoma->searchForGlobalNaspoma(),	
    'type'=>'bordered striped',
	'columns'=>array(	
		'nama',
        'jenis_usaha',               
        array(
            'name'=>'Segmen',
            'value'=>'empty($data->rSeg->nama)?"Deleted":$data->rSeg->nama',
        ),
        'no_rekening',        
        array(
               'name'=>'Jenis Pembiayaan',
               'value'=>'empty($data->rJen->nama)?"Deleted":$data->rJen->nama',
           ),
        array(
            'name'=>'Kolektibilitas',
            'value'=>'empty($data->rKol->nama)?"Deleted":$data->rKol->nama',
        ),
        array(
               'name'=>'Marketing',
               'value'=>'empty($data->rMar->nama)?"Deleted":$data->rMar->nama',
           ),
        array(
        'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
            'viewButtonLabel' => "Detail",
            'viewButtonUrl'=>'Yii::app()->createUrl("/naspoma/detail", array("id" =>$data[\'id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )	
)); ?>
