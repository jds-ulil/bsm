<?php
$this->breadcrumbs=array(
	'Data Watchlist',
);
?>
<h1>Edit Watchlist</h1>
<?php $this->widget('application.extensions.EJEditable.EJEditable'); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'unitkerja-grid',
	'dataProvider'=>$model_temp->search(),
        'type'=>'bordered striped',
        'afterAjaxUpdate'=>'js:function(id, data) { init_editable(".editable"); }',
        'rowCssClassExpression'=>'($data->watchlist_id%2==0)?"wathclist":""',
	'columns'=>array(            
            array(
                'name'=>'watchlist_id',
                'value'=>'$data->watchlist_id',
                'htmlOptions'=>array('width'=>'20'),
            ),            
            'no_loan',
            array(
                'name'=>'nama_nasabah',
                'value'=>'$data->nama_nasabah',
                'htmlOptions'=>array('width'=>'170'),
            ),            
            array(
                'name'=>'total_tunggakan',
                'value'=>'$data->total_tunggakan',
                'htmlOptions'=>array('width'=>'120'),
            ),                        
            'kolektibilitas',
            array(
                'name'=>'jenis_produk',
                'value'=>'$data->jenis_produk',
                'htmlOptions'=>array('width'=>'250'),
            ),                        
            'status_tunggakan'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'status_tunggakan',                        
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"status_tunggakan"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'tgl_bayar'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'tgl_bayar',                        
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"tgl_bayar"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'no_CIF'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'no_CIF',                        
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"no_CIF"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'no_rekening_angsuran'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'no_rekening_angsuran',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"no_rekening_angsuran"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'plafon'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'plafon',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"plafon"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'os_pokok'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'os_pokok',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"os_pokok"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'angsuran_bulanan'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'angsuran_bulanan',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'150','class'=>'"editable"', 'data-attribute'=>'"angsuran_bulanan"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'persentase_bagi_hasil'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'persentase_bagi_hasil',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'100','class'=>'"editable"', 'data-attribute'=>'"persentase_bagi_hasil"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'usaha_nasabah'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'usaha_nasabah',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'200','class'=>'"editable"', 'data-attribute'=>'"usaha_nasabah"', 'id'=>'"{$data->watchlist_id}"'),
		),
            'tujuan_pembiayaan'=>array(
			'class'=>'application.extensions.EJEditable.components.DataColumn',
			'name'=>'tujuan_pembiayaan',
			'evaluateHtmlOptions'=>true,
			'htmlOptions'=>array('width'=>'200','class'=>'"editable"', 'data-attribute'=>'"tujuan_pembiayaan"', 'id'=>'"{$data->watchlist_id}"'),
		),
	),
)); ?>

<div class="form-actions">
    <?php echo CHtml::link('Simpan',array('watch/save'), array('class'=>'btn btn-success')); ?>        
</div>

