<script type="text/javascript">
$(document).ready(function(){
	//$("#No_LP").focus();
	$('#Tgl_Lahir_Pelaku').datepicker({
        inline: true,
		option: "sildeDown",
		changeMonth : true,
		changeYear : true,
    });
	
	$("#simpan_2").click(function(){
		var No_LP	= $("#No_LP").val();
		var nama	= $("#Nama_Pelaku").val();
		
		var a = $("#my-form-pelaku").serialize();
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
		  			message: {text:'Maaf, Nama Pelaku tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#Nama_Pelaku").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/pelaku/simpan",
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
<form id="my-form-pelaku" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="id_pelaku">ID Pelaku</label>
    <div class="controls">
      <input type="text" class="span3" name="ID_Pelaku" id="ID_Pelaku" value="<?php echo $ID_Pelaku;?>" readonly="readonly">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="id_pelaku">Nama Pelaku</label>
    <div class="controls">
      <input type="text" class="span4 input2" name="Nama_Pelaku" id="Nama_Pelaku">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="t_lahir">Tempat Lahir</label>
    <div class="controls">
      <input type="text" class="span3 input2" name="T_Lahir_Pelaku" id="T_Lahir_Pelaku" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tgl_lhr">Tanggal Lahir</label>
    <div class="controls">
      <input type="text" class="span2 input2" name="Tgl_Lahir_Pelaku" id="Tgl_Lahir_Pelaku">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="jk">Jenis Kelamin</label>
    <div class="controls">
      <select name="JK_Pelaku" id="JK_Pelaku" class="input2">
      <option value="">-PILIH-</option>
      <option value="L">Lakli-laki</option>
      <option value="P">Perempuan</option>
      </select>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
    	<textarea name="Alamat_Pelaku" id="Alamat_Pelaku" rows="3" class="span4 input2"></textarea>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="pendidikan">Pendidikan</label>
    <div class="controls">
      <select name="Pendidikan_Pelaku" id="Pendidikan_Pelaku" class="span3 input2">
      <option value="">-PILIH-</option>
      <?php
	  $data = $this->ref_model->list_pendidikan();
	  foreach($data->result() as $t){
	?>
    <option value="<?php echo $t->pendidikan;?>"><?php echo $t->pendidikan;?></option>
    <?php
	  }
	  ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Pekerjaan</label>
    <div class="controls">
      <select name="Pekerjaan_Pelaku" id="Pekerjaan_Pelaku" class="span3 input2">
      <option value="">-PILIH-</option>
      <?php
	  $data = $this->ref_model->list_pekerjaan();
	  foreach($data->result() as $t){
	?>
    <option value="<?php echo $t->pekerjaan;?>"><?php echo $t->pekerjaan;?></option>
    <?php
	  }
	  ?>
      </select>
    </div>
  </div>
<center>
<button type="button" name="simpan_2" id="simpan_2" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
</center>
</form>
