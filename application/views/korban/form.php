<script type="text/javascript">
$(document).ready(function(){
	$('#Tgl_Lahir_Korban').datepicker({
        inline: true,
		option: "sildeDown",
		changeMonth : true,
		changeYear : true,
    });
	
	$("#simpan_5").click(function(){
		var No_LP	= $("#No_LP").val();
		var nama	= $("#Nama_Korban").val();
		
		var a = $("#my-form-korban").serialize();
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
		  			message: {text:'Maaf, Nama Korban tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#Nama_Korban").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/korban/simpan",
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
<form id="my-form-korban" class="form-horizontal">
<input type="hidden" class="span3 input" name="ID" id="ID">
<table width="100%">
<tr>
<td width="50%" valign="top">
  <div class="control-group">
    <label class="control-label" for="id_pelaku">Nama Korban</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Nama_Korban" id="Nama_Korban">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="t_lahir">Tempat Lahir</label>
    <div class="controls">
      <input type="text" class="span4" name="T_Lahir_Korban" id="T_Lahir_Korban" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tgl_lhr">Tanggal Lahir</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Tgl_Lahir_Korban" id="Tgl_Lahir_Korban">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="jk">Jenis Kelamin</label>
    <div class="controls">
      <select name="JK_Korban" id="JK_Korban">
      <option value="">-PILIH-</option>
      <option value="L">Lakli-laki</option>
      <option value="P">Perempuan</option>
      </select>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
      <input type="text" class="span3 input" name="Alamat_Korban" id="Alamat_Korban">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="pendidikan">Agama</label>
    <div class="controls">
      <select name="Agama" id="Agama" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_agama();
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
      <select name="Pendidikan_Korban" id="Pendidikan_Korban" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_pendidikan();
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
	  $data= $this->ref_model->list_pekerjaan();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->pekerjaan;?>"><?php echo $t->pekerjaan;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
</td>
<td width="50%" valign="top">  
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Tingkat Luka</label>
    <div class="controls">
      <select name="Tingkat_Luka" id="Tingkat_Luka" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_tingkat_luka();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->tingkat_luka;?>"><?php echo $t->tingkat_luka;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Tempat Luka</label>
    <div class="controls">
      <select name="Tempat_Luka" id="Tempat_Luka" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_tempat_luka();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->tempat_luka;?>"><?php echo $t->tempat_luka;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="alamat">Korban</label>
    <div class="controls">
      <input type="text" class="span3 input" name="Korban" id="Korban">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Posisi Korban</label>
    <div class="controls">
      <select name="Posisi_Korban" id="Posisi_Korban" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_posisi_korban();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->posisi_korban;?>"><?php echo $t->posisi_korban;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Pengaman</label>
    <div class="controls">
      <select name="Pengaman" id="Pengaman" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_pengaman();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->pengaman;?>"><?php echo $t->pengaman;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Helm</label>
    <div class="controls">
      <select name="Helm" id="Helm" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_helm();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->helm;?>"><?php echo $t->helm;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Safety Belt</label>
    <div class="controls">
      <select name="Safety_Belt" id="Safety_Belt" class="span3">
      <option value="">-PILIH-</option>
       <?php 
	  $data= $this->ref_model->list_safety_belt();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->safety_belt;?>"><?php echo $t->safety_belt;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Posisi Pejalan</label>
    <div class="controls">
      <select name="Posisi_pejalan" id="Posisi_Pejalan" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_posisi_pejalan();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->posisi_pejalan;?>"><?php echo $t->posisi_pejalan;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="pekerjaan">Gerakan Pejalan</label>
    <div class="controls">
      <select name="Gerakan_Pejalan" id="Gerakan_Pejalan" class="span3">
      <option value="">-PILIH-</option>
      <?php 
	  $data= $this->ref_model->list_gerakan_pejalan();
	  foreach($data->result() as $t){
	  ?>
      <option value="<?php echo $t->gerakan_pejalan;?>"><?php echo $t->gerakan_pejalan;?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
  </div>
</td>
</tr>
<td colspan="2" align="center">
    <button type="button" name="simpan_5" id="simpan_5" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
  </td>
  </table>
</form>
