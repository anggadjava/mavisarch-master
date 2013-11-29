<script type="text/javascript">
$(document).ready(function(){
	$('#Tanggal_Lahir').datepicker({
        inline: true,
		option: "sildeDown",
		changeMonth : true,
		changeYear : true,
    });
	
	$("#simpan_4").click(function(){
		var No_LP	= $("#No_LP").val();
		var nama	= $("#Nama_Pengemudi").val();
		
		var a = $("#my-form-pengemudi").serialize();
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
		  			message: {text:'Maaf, Nama tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#Nama_Pengemudi").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/pengemudi/simpan",
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
<form id="my-form-pengemudi" class="form-horizontal">
<input type="hidden" class="span3 input" name="ID" id="ID" value="<?php echo $ID;?>">
  <div class="control-group">
    <label class="control-label" for="id_pelaku">Nama Pengemudi</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Nama_Pengemudi" id="Nama_Pengemudi">
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
      <input type="text" class="span2 input" name="Tanggal_Lahir" id="Tanggal_Lahir">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="jk">Jenis Kelamin</label>
    <div class="controls">
      <select name="JK" id="JK">
      <option value="">-PILIH-</option>
      <option value="L">Lakli-laki</option>
      <option value="P">Perempuan</option>
      </select>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
    	<textarea name="Alamat_Pengemudi" class="span4" rows="3"></textarea>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="Agama">Agama</label>
    <div class="controls">
      <select name="Agama" id="Agama" class="span3">
      <option value="">-PILIH-</option>
      <?php
	  $data = $this->ref_model->list_agama();
	  foreach($data->result() as $t){
	?>
    <option value="<?php echo $t->agama;?>"><?php echo $t->agama;?></option>
    <?php
	  }
	  ?>
      </select>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="pendidikan">Pendidikan</label>
    <div class="controls">
      <select name="Pendidikan" id="Pendidikan" class="span3">
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
      <select name="Pekerjaan" id="Pekerjaan" class="span3">
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
	<div class="control-group">
    <label class="control-label" for="alamat">Objek Sebagai</label>
    <div class="controls">
      <input type="text" class="span5 input" name="Objek_Sbgai" id="Objek_Sbgai">
    </div>
  </div>
  <center>
<button type="button" name="simpan_4" id="simpan_4" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
</center>
</form>
