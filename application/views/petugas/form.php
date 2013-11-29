<script type="text/javascript">
$(document).ready(function(){
	$("#No_LP").focus();
	
	$("#simpan").click(function(){
		var No_LP	= $("#No_LP").val();
		
		var string = $("#my-form").serialize();
			
		if(No_LP.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Nomor Laporan tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#No_LP").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/bap/simpan",
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
	
	$("#cetak").click(function(){
							   
		var id		= $("#id").val();					   
		var surat	= $("#nomor").val();
		var nip		= $("#nip").val();
		var tgl		= $("#tgl").val();
		
		if(nomor.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Nomor tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#nomor").focus();
			return false();
		}
		if(tgl.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Tanggal tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#tgl").focus();
			return false();
		}
		if(nip.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, NIP tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#nip").focus();
			return false();
		}
		window.open('<?php echo site_url();?>/surat_tugas/cetak/'+id);	
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
    <label class="control-label" for="id_pelaku">ID Petugas</label>
    <div class="controls">
      <input type="text" class="span3 input" name="ID_Petugas" id="ID_Petugas">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="id_pelaku">Nama Petugas</label>
    <div class="controls">
      <input type="text" class="span3 input" name="Nama_Petugas" id="Nama_Petugas">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="t_lahir">Tempat Lahir</label>
    <div class="controls">
      <input type="text" class="span2" name="Tempat_Lahir" id="Tempat_Lahir" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tgl_lhr">Tanggal Lahir</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Tgl_Lahir" id="Tgl_Lahir">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
      <input type="text" class="span3 input" name="Alamat" id="Alamat">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="pendidikan">Pangkat</label>
    <div class="controls">
      <select name="Pangkat" id="Pangkat" class="span3">
      <option value="">-PILIH-</option>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pekerjaan">Jabatan</label>
    <div class="controls">
      <select name="Jabatan" id="Jabatan" class="span3">
      <option value="">-PILIH-</option>
      </select>
    </div>
  </div>
<center>
<button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
<button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
</form>
</center>
