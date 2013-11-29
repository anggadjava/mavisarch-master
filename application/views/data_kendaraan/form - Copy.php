<script type="text/javascript">
$(document).ready(function(){
	
	$("#simpan").click(function(){
		var No_LP	= $("#No_LP").val();
   		var jenis	= $("#Jenis_Kend").val();
		
		var string = $("#my-form").serialize();
			
		if(No_LP.length==0){
			$('.bottom-right').notify({
				message: {text:'Maaf, Nomor Laporan tidak boleh kosong'},type:'danger'
			}).show();
			$("#No_LP").focus();
			return false();
		}
		if(jenis.length==0){
			$('.bottom-right').notify({
				message: {text:'Maaf, Jenis Kendaraan tidak boleh kosong'},type:'danger'
			}).show();
			$("#Jenis_Kend").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/data_kendaraan/simpan",
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
<table width="100%">
<tr>
<td width="50%" valign="top">
  <div class="control-group">
    <label class="control-label" for="jenis">Jenis Kendaraan</label>
    <div class="controls">
      <select name="Jenis_Kend" id="Jenis_Kend" class="span3">
      <option value="">-PILIH-</option>
      <option value="Sepeda Motor">Sepeda Motor</option>
      <option value="Mobil">Mobil</option>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nomor">Nomor Polisi</label>
    <div class="controls">
      <input type="text" class="span4 input" name="No_Pol" id="No_Pol" value="<?php echo $No_Pol;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Type Kendaraan</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Tipe_Kend" id="Tipe_Kend" value="<?php echo $Tipe_Kend;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Gerakan Kendaraan</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Gerakan_Kend" id="Gerakan_Kend" value="<?php echo $Gerakan_Kend;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Merek Kendaraan</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Merk_Kend" id="Merk_Kend" value="<?php echo $Merk_Kend;?>" >
    </div>
  </div>
 
  <div class="control-group">
    <label class="control-label" for="nama">Tahun Pembuatan</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Tahun_Pembuatan" id="Tahun_Pembuatan" value="<?php echo $Tahun_Pembuatan;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Warna Plat</label>
    <div class="controls">
		<select name="Warna_Plat" id="Warna_Plat">
        <option value="">-PILIH-</option>
        <option value="Umum (Kuning)">Umum (Kuning)</option>
        <option value="Negeri (Merah)">Negeri (Merah)</option>
        <option value="Swasta (Hitam)">Swasta (Hitam)</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Jumlah Penumpan</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Jumlah_Penumpang" id="Jumlah_Penumpang" value="<?php echo $Jumlah_Penumpang;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Kecepatan</label>
    <div class="controls">
    	<input type="text" class="span4 input" name="Kecepatan" id="Kecepatan" value="<?php echo $Kecepatan;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Kerusakan Kendaraan</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Kerusakan_Kend" id="Kerusakan_Kend" value="<?php echo $Kerusakan_Kend;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Deskripsi Kerusakan</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Desk_Kerusakan" id="Desk_Kerusakan" value="<?php echo $Desk_Kerusakan;?>">
    </div>
  </div>
</td>
<td width="50%" valign="top">   
  <div class="control-group">
    <label class="control-label" for="nama">STUJ</label>
    <div class="controls">
      <input type="text" class="span4 input" name="STUJ" id="STUJ" value="<?php echo $STUJ;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Kerusakan Lain</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Kerusakan_Lain" id="Kerusakan_Lain" value="<?php echo $Kerusakan_Lain;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">BBM</label>
    <div class="controls">
      <input type="text" class="span4 input" name="BBM" id="BBM" value="<?php echo $BBM;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Silinder_CC</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Silinder_CC" id="Silinder_CC" value="<?php echo $Silinder_CC;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">No STNK</label>
    <div class="controls">
      <input type="text" class="span4 input" name="No_STNK" id="No_STNK" value="<?php echo $No_STNK;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Atas Nama STNK</label>
    <div class="controls">
      <input type="text" class="span4 input" name="An_STNK" id="An_STNK" value="<?php echo $An_STNK;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Alamat STNK</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Alamat_STNK" id="Alamat_STNK" value="<?php echo $Alamat_STNK;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">No Rangka</label>
    <div class="controls">
      <input type="text" class="span4 input" name="No_Rangka" id="No_Rangka" value="<?php echo $No_Rangka;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">No Mesin</label>
    <div class="controls">
      <input type="text" class="span4 input" name="No_Mesin" id="No_Mesin" value="<?php echo $No_Mesin;?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">No BPKB</label>
    <div class="controls">
      <input type="text" class="span4 input" name="No_BPKB" id="No_BPKB" value="<?php echo $No_BPKB;?>" >
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2" align="center">
    <button type="button" name="simpan_3" id="simpan_3" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
  </td>
</tr>      
</table>  
</form>