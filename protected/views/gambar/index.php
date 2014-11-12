
<div class="control-group ">
	    <label class="control-label">Icon Site (PNG File)</label>
        <div class="controls">
<?php 
	    $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
		'id'=>'image',
		'config'=>array(
		'action'=>Yii::app()->createUrl('/gambar/upload'),
		'allowedExtensions'=>array("jpg", "jpeg", "png", "gif"),
		'sizeLimit'=>2*1024*1024,// maximum file size in bytes
		'onSubmit'=>"js:function(file, extension) { 
				$('div.preview').addClass('loading');
			    }",
		'onComplete'=>"js:function(file, response, responseJSON) {
				$('#thumb').load(function(){
				    $('div.preview').removeClass('loading');
				    $('#thumb').unbind();
				    $('#Associazioni_logo').val(responseJSON['filename']);				   
				});
				$('#thumb').attr('src', '".Yii::app()->request->baseUrl."/images/'+responseJSON['filename']);
                location.reload();
				}",
	    'messages'=>array(
		    'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
		    'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
		    'emptyError'=>"{file} is empty, please select files again without it.",
		    'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
		),
	    )
	    )); ?>
            </div>
<div class="control-group">
	<label class="control-label">&nbsp;</label>
	<div class="controls">	  
		<div class="row">
		<?php echo 
		    CHtml::image(Yii::app()->request->baseUrl.'/images/year.png',"",
			    array(
				"width"=>150,
				"id"=>"thumb",
				"class"=>"span3",
				)); ?> 
		</div>
	    </div>
	</div>
        
    