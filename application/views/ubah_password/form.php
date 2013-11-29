<script type="text/javascript">
$(document).ready(function(){
	$("#password").focus();
	
	$("#simpan").click(function(){
		var pwd	= $("#password").val();
		
		var string = $("#my-form").serialize();
			
		if(No_LP.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, password tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#No_LP").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ubah_password/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$('.bottom-right').notify({
		  			message: {text:data},type:'danger'
	 			}).show();
			}
		});
		return false();
	});
	
});
</script>
<div class="navbar navbar-primary">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#"><?php echo $judul;?></a>
        <div class="span3 pull-right" style="padding:5px;">
          </div>
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->  
<form id="my-form" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="id_pelaku">Password</label>
    <div class="controls">
      <input type="password" class="span3 input" name="password" id="password" size="30">
    </div>
  </div>
<center> 
<button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
</form>
</center>
