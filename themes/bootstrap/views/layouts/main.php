<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>    
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
<div id="wrap">
    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			    <a class="brand" href="<?php echo Yii::app()->createUrl("site/index") ?>"><?php echo Yii::app()->name ?></a>
				<div class="nav-collapse">
					<?php $this->widget('bootstrap.widgets.TbMenu',array(
						'htmlOptions' => array( 'class' => 'nav pull' ),
						'activeCssClass'	=> 'active',

						'items'=>array(
							array('label'=>'Administrasi User', 'url'=>array('#'), 'visible'=> Yii::app()->user->checkAccess('admin') 
															    || Yii::app()->user->checkAccess('approval')
															    || Yii::app()->user->checkAccess('inputter'),
								'items'=>array(
								    array('label'=>'Inputer', 'url'=>array('mguser/index', 'id'=> vc::APP_id_hak_akses_inputter),  'visible'=>Yii::app()->user->checkAccess('admin')),
								    array('label'=>'Approval', 'url'=>array('mguser/index', 'id'=> vc::APP_id_hak_akses_approval), 'visible'=>Yii::app()->user->checkAccess('admin')),
								    array('label'=>'Admin', 'url'=>array('mguser/index', 'id'=> vc::APP_id_hak_akses_admin), 'visible'=>Yii::app()->user->checkAccess('admin')),
								    array('label'=>'Daftar Email Penerima', 'url'=>array('listemail/index',)),
								    )
							),							
							array('label'=>'Input Data', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest, 
								'items'=>array(
								    array('label'=>'Proposal Pembiayaan Baru', 'url'=>array('proposal/create',), 'visible'=> Yii::app()->user->checkAccess('admin')||Yii::app()->user->checkAccess('inputter')),
								    array('label'=>'Daftar Nasabah Ditolak', 'url'=>array('tolak/create',)),
                                                                 /**
                                                    SELOWWW....
								    array('label'=>'Nasabah Wathclist Akhir Bulan', 'url'=>array('#',)),
								    array('label'=>'Nasabah Pelunasan Tidak Normal', 'url'=>array('#',)),								    
                                                                  * 
                                                                  */
                                                                    )
							),																					
							array('label'=>'Approval', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,
								'items'=>array(
								    array('label'=>'Daftar Nasabah Ditolak', 'url'=>array('#',)),
                                                             /**
                                                                SELOWWW....
								    array('label'=>'Nasabah Pelunasan Tidak Normal', 'url'=>array('#',)),								    
                                                              * 
                                                              */
                                                                    )
							),							
							array('label'=>'Laporan', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,
								'items'=>array(
								    array('label'=>'Proposal Pembiayaan Baru', 'url'=>array('#',)),								   
								    array('label'=>'Daftar Nasabah Ditolak', 'url'=>array('#',)),
                                                     /**
                                                    SELOWWW....
								    array('label'=>'Nasabah Watchlist Akhir Bulan', 'url'=>array('#',)),
								    array('label'=>'Nasabah Pelunasan Tidak Normal', 'url'=>array('#',)),
                                                      * 
                                                      */
								    )
							),	
                                                    /**
                                                    SELOWWW....
							array('label'=>'Kuisioner', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,
								'items'=>array(
								    array('label'=>'Kuisioner', 'url'=>array('#',)),								   
								    array('label'=>'Kode Merah', 'url'=>array('#',)),
								    array('label'=>'Rekap Kuisioner', 'url'=>array('#',)),
								    array('label'=>'Rekap Kode Merah', 'url'=>array('#',)),
								    )
							),
                                                     * 
                                                     */														
							array('label'=>'Master Data', 'url'=>array('#'), 'visible'=> Yii::app()->user->checkAccess('admin'), 
								'items'=>array(
								    array('label'=>'Pegawai/Marketing', 'url'=>array('pegawai/index',)),								    
								    array('label'=>'Kolektabilitas', 'url'=>array('kolektabilitas/index',)),								    
								    array('label'=>'Segmen', 'url'=>array('segmen/index',)),								    
								    array('label'=>'Jabatan', 'url'=>array('jabatan/index',)),								    
								    array('label'=>'Unit Kerja', 'url'=>array('unitkerja/index',)),								    
								    )
							),
//							array('label'=>'User', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->checkAccess('otor') || Yii::app()->user->checkAccess('admin')),
//							array('label'=>'Jabatan', 'url'=>array('/jabatan/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),

//							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
				<?php $user =  Yii::app()->user->isGuest?'Selamat Datang':Yii::app()->user->name;?>
				<div class="nav-collapse">
					<?php $this->widget('bootstrap.widgets.TbMenu',array(
						'htmlOptions' => array( 'class' => 'nav pull-right' ),
						'activeCssClass'	=> 'active',

						'items'=>array(		
								array('label'=>$user, 'url'=>array('#'),
								'items'=>array(
								    array('label'=>'Login', 'url'=>array('/site/login',),  'visible'=>Yii::app()->user->isGuest),								   
								    array('label'=>'Akunku', 'url'=>array('/user/setting',),  'visible'=>!Yii::app()->user->isGuest),
								    array('label'=>'Logout', 'url'=>array('/site/logout',),  'visible'=>!Yii::app()->user->isGuest),								    
								    )
								),						    
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
    <div class="container" id="page">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

        <div class="clear"></div>
    </div><!-- page -->
    <div id="push"></div>
</div><!-- wrap -->
<div id="footer">        
  <div class="container">
    <div class="row">
        <div id="footer-copyright" class="col-md-6">
            <br>
        </div> <!-- /span6 -->
        <div id="footer-terms" class="col-md-6">
          © <?php echo date("Y"); ?> BSM 
        </div> <!-- /.span6 -->
     </div> <!-- /row -->
  </div> <!-- /container -->	
		
</div><!-- footer -->


</body>
</html>
