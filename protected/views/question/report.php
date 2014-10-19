<?php
$this->breadcrumbs=array(
	'Rekap Quistionaire',
);
?>
<h1 class="loginHead">Kriteria</h1>
<?php  echo $this->renderPartial('_search', array('model_jawab'=>$model_jawab,'listUnit' => $listUnit,)); ?>
<div class='survey'>
<div class='head-survey'>Laporan</div>
<div class='soal_jawab'>
<?php 
$i = 1;
foreach ($arrSoal as $key => $value) {  
    echo "<div class='soal'>".$i." "."$value";
    echo "</div>";
    echo "<table>";    
    foreach ($arrResult[$key] as $key_j => $value_j) {
        foreach ($value_j as $key_ja => $value_ja) {
            echo "<tr class='jawab span8'><td>";
            echo "$key_j (";
            echo "$value_ja%)";                
            echo "</td></tr>";
        }
    }    
    echo "</table>";
    $i++;   
}
?>
</div>
</div>

<div class='survey'>
<div class='head-survey'>Data Kuisioner</div>
<div class='soal_jawab'>
<?php
echo "<table width='100%' border='solid black 1px'>";
foreach ($result as $key => $value) {  
    if($key == 0){
        echo "<tr>";
            echo "<td rowspan='2' align='center' valign='middle'>No</td>";
            echo "<td rowspan='2'>Nama Jabatan</td>";
            echo "<td rowspan='2' align='center' valign='middle'>Jumlah Input</td>";
            echo "<td rowspan='2' align='center' valign='middle'>Partisipasi</td>";
            echo "<td colspan='4' align='center' valign='middle'>Jenis Jawaban</td>";            
        echo "</tr>";
        echo "<tr>";                                                
            echo "<td align='center' valign='middle'>Tidak Penting</td>";
            echo "<td align='center' valign='middle'>Cukup Penting</td>";
            echo "<td align='center' valign='middle'>Penting</td>";
            echo "<td align='center' valign='middle'>Sangat Penting</td>";
        echo "</tr>";
        
        echo "<tr>";
            echo "<td align='center' valign='middle'>".($key+1)."</td>";
            echo "<td>".($value['nama_jabatan'])."</td>";
            echo "<td align='center' valign='middle'>".($value['jumlah_input']==''?'-':$value['jumlah_input'])."</td>";
            echo "<td align='center' valign='middle'>".($value['partisipasi']==''?'-':$value['partisipasi'])."</td>";
            echo "<td align='center' valign='middle'>".($value['tidak_penting']==''?'-':$value['tidak_penting'])."</td>";
            echo "<td align='center' valign='middle'>".($value['cukup_penting']==''?'-':$value['cukup_penting'])."</td>";
            echo "<td align='center' valign='middle'>".($value['penting']==''?'-':$value['penting'])."</td>";
            echo "<td align='center' valign='middle'>".($value['sangat_penting']==''?'-':$value['sangat_penting'])."</td>";
        echo "</tr>";
    } else {
          echo "<tr>";
            echo "<td align='center' valign='middle'>".($key+1)."</td>";
            echo "<td>".($value['nama_jabatan'])."</td>";
            echo "<td align='center' valign='middle'>".($value['jumlah_input']==''?'-':$value['jumlah_input'])."</td>";
            echo "<td align='center' valign='middle'>".($value['partisipasi']==''?'-':$value['partisipasi'])."</td>";
            echo "<td align='center' valign='middle'>".($value['tidak_penting']==''?'-':$value['tidak_penting'])."</td>";
            echo "<td align='center' valign='middle'>".($value['cukup_penting']==''?'-':$value['cukup_penting'])."</td>";
            echo "<td align='center' valign='middle'>".($value['penting']==''?'-':$value['penting'])."</td>";
            echo "<td align='center' valign='middle'>".($value['sangat_penting']==''?'-':$value['sangat_penting'])."</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>
</div>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl('question/print'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>
<input name="voteJawab[unit_kerja]" id="print_from_plafon" type="hidden" value="<?php echo $model_jawab->unit_kerja; ?>" />
<input name="voteJawab[from_date]" id="print_from_date" type="hidden" value="<?php echo $model_jawab->from_date; ?>" />
<input name="voteJawab[to_date]" id="print_to_date" type="hidden" value="<?php echo $model_jawab->to_date; ?>" />
<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'danger',
                'label'=>'Cetak Laporan',
		)); ?>
    </div>
<?php $this->endWidget(); ?>