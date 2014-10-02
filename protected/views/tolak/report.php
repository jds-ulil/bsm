
<h1>Kriteria Proposal</h1>
<div class="search-form">

</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model_tolak->search(),	
        'type'=>'bordered striped',
	'columns'=>array(	
        'tanggal_tolak',
        'no_proposal',
        'tahap_penolakan',
        'alasan_ditolak',
         array(
                'class'=>'CDataColumn',
                'name'=>'Marketing',
                'value'=>'$data->rCM->roMar->nama',
                'sortable'=>true,
                'filter'=>true,
            ),
        )	
)); ?>