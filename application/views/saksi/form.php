<script type="text/javascript">
$(document).ready(function(){
	$('#Tanggal_Lahir_Saksi').datepicker({
        inline: true,
		option: "sildeDown",
		changeMonth : true,
		changeYear : true,
    });
	
	$("#simpan_6").click(function(){
		var No_LP	= $("#No_LP").val();
		var nama	= $("#Nama_Saksi").val();
		
		var a = $("#my-form-saksi").serialize();
		var string = a+"&No_LP="+No_LP;
			
		if(No_LP.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Nomor Laporan tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#No_LP").focus();
			return false();
		}
		if(nama.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Nama Saksi tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#Nama_Saksi").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/saksi/simpan",
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
<form id="my-form-saksi" class="form-horizontal">
<input type="hidden" class="span4 input" name="ID_Saksi" id="ID_Saksi" value="<?php echo $ID;?>">
  <div class="control-group">
    <label class="control-label" for="id_pelaku">Nama Saksi</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Nama_Saksi" id="Nama_Saksi">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="t_lahir">Tempat Lahir</label>
    <div class="controls">
      <input type="text" class="span4" name="Tempat_Lahir" id="Tempat_Lahir" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tgl_lhr">Tanggal Lahir</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Tanggal_Lahir" id="Tanggal_Lahir_Saksi">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="jk">Jenis Kelamin</label>
    <div class="controls">
      <select name="Jenis_Kelamin" id="Jenis_Kelamin">
      <option value="">-PILIH-</option>
      <option value="L">Lakli-laki</option>
      <option value="P">Perempuan</option>
      </select>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
    	<textarea name="Alamat_Saksi" class="span4" rows="4"></textarea>
    </div>
  </div>
<center>
<button type="button" name="simpan_6" id="simpan_6" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
</center>
</form>
