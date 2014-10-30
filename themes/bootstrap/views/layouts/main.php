<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
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
							array('label'=>'Administrasi User', 'url'=>array('#'), 'visible'=> Yii::app()->user->checkAccess('admin'),
								'items'=>array(
								    array('label'=>'Inputer', 'url'=>array('mguser/index', 'id'=> vc::APP_id_hak_akses_inputter),  'visible'=>Yii::app()->user->checkAccess('admin')) ,
								    array('label'=>'Approval', 'url'=>array('mguser/index', 'id'=> vc::APP_id_hak_akses_approval), 'visible'=>Yii::app()->user->checkAccess('admin')),
								    array('label'=>'Admin', 'url'=>array('mguser/index', 'id'=> vc::APP_id_hak_akses_admin), 'visible'=>Yii::app()->user->checkAccess('admin')),
								    array('label'=>'Daftar Email Penerima', 'url'=>array('listemail/index',), 'visible'=>Yii::app()->user->checkAccess('admin')),
								    )
							),							
							array('label'=>'Input Data', 'url'=>array('#'), 'visible'=>Yii::app()->user->checkAccess('inputter'), 
								'items'=>array(
								    array('label'=>'Proposal Pembiayaan Baru', 'url'=>array('proposal/create',), 'visible'=> Yii::app()->user->checkAccess('inputter')),
								    array('label'=>'Daftar Nasabah Ditolak', 'url'=>array('tolak/create',)),
								    array('label'=>'Nasabah Pelunasan Tidak Normal', 'url'=>array('pelunasan/create',)),    
								    array('label'=>'Nasabah Wathclist Akhir Bulan', 'url'=>array('watch/input',)),
                                                                    )
							),																					
							array('label'=>'Input Data', 'url'=>array('#'), 'visible'=>Yii::app()->user->checkAccess('approval') || Yii::app()->user->checkAccess('admin'), 
								'items'=>array(								    
								    array('label'=>'Nasabah Wathclist Akhir Bulan', 'url'=>array('watch/input',)),
                                                )
							),																					
							array('label'=>'Approval', 'url'=>array('#'), 'visible'=>Yii::app()->user->checkAccess('approval') || Yii::app()->user->checkAccess('admin'),
								'items'=>array(
								    array('label'=>'Daftar Nasabah Ditolak', 'url'=>array('tolak/approval',)),                                                             
								    array('label'=>'Nasabah Pelunasan Tidak Normal', 'url'=>array('pelunasan/approval',)),								                                                                  
                                                                    )
							),							
							array('label'=>'Laporan', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,
								'items'=>array(
								    array('label'=>'Proposal Pembiayaan Baru', 'url'=>array('proposal/report',)),								   								    
								    array('label'=>'Daftar Nasabah Ditolak', 'url'=>array('tolak/report',)),
								    array('label'=>'Nasabah Pelunasan Tidak Normal', 'url'=>array('pelunasan/report',)),                                                     
								    array('label'=>'Nasabah Watchlist Akhir Bulan', 'url'=>array('watch/report',)),								                                                          
								    )
							),	                                                    
							array('label'=>'Kuisioner', 'url'=>array('#'), 'visible'=>Yii::app()->user->checkAccess('inputter') || Yii::app()->user->checkAccess('approval'),
								'items'=>array(
								    array('label'=>'Kuisioner', 'url'=>array('Question/index',)),								   
								    //array('label'=>'Kode Merah', 'url'=>array('#',)),
								    array('label'=>'Rekap Kuisioner', 'url'=>array('Question/report',)),								   
								    )
							),													
							array('label'=>'Master Data', 'url'=>array('#'), 'visible'=> Yii::app()->user->checkAccess('admin'), 
								'items'=>array(
								    array('label'=>'Pegawai/Marketing', 'url'=>array('pegawai/index',)),								    
								    array('label'=>'Kolektibilitas', 'url'=>array('kolektabilitas/index',)),								    
								    array('label'=>'Segmen', 'url'=>array('segmen/index',)),								    
								    array('label'=>'Jabatan', 'url'=>array('jabatan/index',)),								    
								    array('label'=>'Unit Kerja', 'url'=>array('unitkerja/index',)),								    
								    array('label'=>'Mail Setting', 'url'=>array('mailer/set',), 'visible'=> Yii::app()->user->checkAccess('admin')),	
                                                                    array('label'=>'Master Pertanyaan', 'url'=>array('question/pertanyaan',)),
                                                                    array('label'=>'Reset Data', 'url'=>array('data/reset',)),
								    )
							),
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
								    array('label'=>'Logout', 'url'=>array('/site/logout',),  'visible'=>!Yii::app()->user->isGuest, 'itemOptions'=>array('id' => 'xyz')),								    
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
        <?php $la = isset(Yii::app()->user->alertSign)?Yii::app()->user->alertSign:0; ?>
        <script type="text/javascript"> 
        $(document).ready(function(){
                var x = 0;    
                $( "li#xyz" ).mouseover(
                  function() {        
                      if ( <?php echo $la ?>  && x == 0) {
                    alert('Terima kasih telah menggunakan Aplikasi SNkP ini.Mohon untuk dapat mengisi kuisioner terlebih dahulu sebelum logout sebagai masukan bagi kami untuk mengetahui manfaat dan efektivitas implementasi aplikasi ini bagi unit kerja Bapak/Ibu.');
                    x = 1;
                    }            
                    return false;
                  }                  
                );
        });
        </script>
            
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
