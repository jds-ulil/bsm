<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Data Nasabah Baru</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'daftar-nasabah-grid',
	'dataProvider'=>$model->searchOtor(),
	//'filter'=>$model,
	'columns'=>array(
		//'nasabah_id',
		'kartukeluarga_id',
		'nama',
         array(
            'name'=>'Check',             
            'value'=>'CHtml::checkBox("cid[]",null,array("value"=>$data->nasabah_id,"id"=>"cid_".$data->nasabah_id))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>5),
            //'visible'=>false,
        ),
//		'alamat',
//		  array(
//                'name'=>'status',
//                'value'=>'$data->sNas->nama_status',
//            ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'buttons'=>array
            (
              'view' => array
                (                
                'url'=>'Yii::app()->createUrl("/daftarNasabah/view", array("id"=>$data->primaryKey))',     
                'options' => array('target'=>'_blank'),
                'label' => 'Detail',    
                ),
             ),
            
		),
	),
)); ?>
<div class="form-actions">		
    <span class="pull-right">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Check All',
		)); ?>		
        </span>
	</div>

