<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span-16">
        <div style="width: 2300px;">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'ACTION',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
                'stacked'=>true, 
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
        ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>