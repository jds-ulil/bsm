<!DOCTYPE html>
<?php

/* 
 * file untuk layout khusus daily report
 * tampilan akan berbeda 
 *      - simple
 *      - mudah dipahami
 *      - mudah digunakan 
 */
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />                  
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>    
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
    <?php echo $content; ?>
</body>
</html>
