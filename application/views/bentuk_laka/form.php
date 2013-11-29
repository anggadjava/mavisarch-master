<script type="text/javascript">
$(document).ready(function(){
	//$("#No_LP").focus();
	
	$("#simpan_1").click(function(){
		var No_LP	= $("#No_LP").val();
		var nama = $("#Nama_Bentuk_Laka").val();
   
		
		var a = $("#bentuk-laka-form").serialize();
		var string = a+"&No_LP="+No_LP;
		
		//alert(string);
		
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
	
		  $("#Nama_Bentuk_Laka").focus();
		  return false();
		}
		

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/bentuk_laka/simpan",
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
	

  $("#tutup_1").click(function(){
	  $("#input_bentuk_laka").dialog("close");
  });
});
</script>
<form id="bentuk-laka-form" class="form-horizontal">
<table width="100%">
<tr>
<td width="50%" valign="top">
  <div class="control-group">
    <label class="control-label" for="nama">Kode</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Kd_Bentuk_Laka" id="Kd_Bentuk_Laka" value="<?php echo $Kd_Bentuk_Laka;?>" readonly="readonly" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Nama</label>
    <div class="controls">
      <select name="Nama_Bentuk_Laka" id="Nama_Bentuk_Laka">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_jenis_laka();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->jenis_laka;?>"><?php echo $t->jenis_laka;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Golongan</label>
    <div class="controls">
    <select name="Golongan_Kecelakaan" id="Golongan_Kecelakaan">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_gol_laka();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->gol_laka;?>"><?php echo $t->gol_laka;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Keadaan Lantas</label>
    <div class="controls">
    <select name="Keadaan_Lantas" id="Keadaan_Lantas">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_keadaan_lantas();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->keadaan_lantas;?>"><?php echo $t->keadaan_lantas;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Kondisi Jalan</label>
    <div class="controls">
     <select name="Kondisi_Jalan" id="Kondisi_Jalan">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_kondisi_jalan();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->kondisi_jalan;?>"><?php echo $t->kondisi_jalan;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
 
  <div class="control-group">
    <label class="control-label" for="nama">Situasi Jalan</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Situasi_Jalan" id="Situasi_Jalan" value="<?php echo $Situasi_Jalan;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Perbaikan Jalan</label>
    <div class="controls">
    <select name="Perbaikan_Jalan" id="Perbaikan_Jalan">
      <option value="">-Pilih-</option>
      <option value="Ya">Ya</option>
      <option value="Tidak">Tidak</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kesimpulan">Bentuk Simpangan</label>
    <div class="controls">
    <select name="Bentuk_Simpangan" id="Bentuk_Simpangan">
      <option value="">-Pilih-</option>
      <option value="Ya">Ya</option>
      <option value="Tidak">Tidak</option>
        </select>
    </div>
  </div>
</td>
<td width="50%" valign="top"> 
  <div class="control-group">
    <label class="control-label" for="nama">Arus Lalu Lintas</label>
    <div class="controls">
    <select name="Arus_Lalulintas" id="Arus_Lalulintas">
      <option value="">-Pilih-</option>
      <option value="Ramai">Ramai</option>
      <option value="Sepi">Sepi</option>
      <option value="Lancar">Lancar</option>
      <option value="Macet">Macet</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Batas Kecepatan</label>
    <div class="controls">
    <select name="Batas_Kecepatan" id="Batas_Kecepatan">
      <option value="">-Pilih-</option>
      <option value="Dibawah 60Km/Jam">Dibawah 60Km/Jam</option>
      <option value="Diatas 60Km/Jam">Diatas 60Km/Jam</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Lingkungan Sekitar</label>
    <div class="controls">
    <select name="Lingkungan_Sekitar" id="Lingkungan_Sekitar">
      <option value="">-Pilih-</option>
      <option value="Sepi">Sepi</option>
      <option value="Ramai">Ramai</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Fungsi Jalan</label>
    <div class="controls">
    	 <select name="Fungsi_Jalan" id="Fungsi_Jalan">
      <option value="">-Pilih-</option>
      <option value="Tol">Tol</option>
      <option value="Arteri">Arteri</option>
      <option value="Kolektor">Kolektor</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Berdasarkan Jalur</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Berdasarkan_Jalur" id="Berdasarkan_Jalur" value="<?php echo $Berdasarkan_Jalur;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Lokasi Laka</label>
    <div class="controls">
      <select name="Lokasi_Laka" id="Lokasi_Laka" class="span4">
       <?php
        foreach ($l_lokasi_laka->result() as $t) {
		?>
          <option value="<?php echo $t->lokasi_laka;?>"><?php echo $t->lokasi_laka;?></option>
        <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Penyebab Laka</label>
    <div class="controls">
    	<select name="Penyebab_Laka" id="Penyebab_Laka">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_penyebab_laka();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->penyebab_laka;?>"><?php echo $t->penyebab_laka;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Laka Fungsi Jalan</label>
    <div class="controls">
    <select name="Laka_Fungsi_Jalan" id="Laka_Fungsi_Jalan">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_fungsi_laka();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->laka_fungsi_jalan;?>"><?php echo $t->laka_fungsi_jalan;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Kawasan Laka</label>
    <div class="controls">
    <select name="Kawasan_Laka" id="Kawasan_Laka">
      <option value="">-Pilih-</option>
      <?php 
	  $data = $this->ref_model->list_kawasan_laka();
	  foreach($data->result() as $t){
		 ?>
         <option value="<?php echo $t->kawasan_laka;?>"><?php echo $t->kawasan_laka;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2" align="center">
    <button type="button" name="simpan_1" id="simpan_1" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
  </td>
</tr>      
</table>  
</form>