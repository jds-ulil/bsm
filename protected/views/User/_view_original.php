<?php
/* @var $this MtbUserController */
/* @var $data MtbUser */
?>
<style>
    .listHead {
        color: #53A627;
        font-family: serif;
        font-size: 1.5em;
        text-transform: uppercase;        
    }
</style>
<span class="listHead"><?php echo CHtml::encode($data->user_name); ?></span>
<hr>
    
<dl class="dl-horizontal">        
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->email_address); ?></dd>
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('hak_akses')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->rHak->nama_hak_akses); ?></dd>        
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('jabatan_id')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->rJab->nama_jabatan); ?></dd>
    </dl>            
<?php
    if($index ==0) {
        ?>
        <table class="table">
    <thead>
        <tr>
            <th>Row</th>
            <th>Bill</th>
            <th>Payment Date</th>
            <th>Payment Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
    }
    ?>