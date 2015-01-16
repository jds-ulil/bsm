<!DOCTYPE html>
<?php

/* 
 * file untuk layout khusus daily report
 * tampilan akan berbeda 
 *      - simple
 *      - mudah dipahami
 *      - mudah digunakan 
 *      - with header and footer
 */
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />                  
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/dstyles.css" />       
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>    
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
    <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('bootstrap.widgets.TbDBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>    
        <div class='row'>
            <div class='span10 offset2 dmain'>                            
                <?php echo $content; ?>
            </div>                                  
        </div>    
            <br />
</body>
</html>
