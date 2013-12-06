  <script type="text/javascript">
$(document).ready(function(){
  $('#tanggal_lahir').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
  $('#tanggal_masuk').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
  
  $("#simpan").click(function(){
    var nik  = $("#NIK").val();
    var cabang  = $("#cabang").val();
    var nama  = $("#nama").val();
    var a = $("#my-form").serialize();
    var string = a;
    
    if(nik.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Nomor Induk Tidak boleh kosong'},type:'danger'
      }).show();
      $("#NIK").focus();
      return false();
    }
    if(cabang.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Cabang boleh kosong'},type:'danger'
      }).show();
      $("#cabang").focus();
      return false();
    }
    if(nama.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Nama Guru Tidak boleh kosong'},type:'danger'
      }).show();
      $("#nama").focus();
      return false();
    }
    // alert(string);
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/guru/simpan",
      data  : string,
      cache : false,
      success : function(data){
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
    <label class="control-label" for="nomor">Nomor Induk</label>
    <div class="controls">
      <input type="text" class="span3 input" name="NIK" id="NIK" value="" <?php echo $readonly;?>>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nip">Cabang</label>
    <div class="controls">
      <select name="cabang" id="cabang">
      <option value="">-Pilih-</option>
      <?php 
    $data = $this->ref_model->list_cabang();
    foreach($data->result() as $t){
     ?>
         <option value="<?php echo $t->kode_cabang;?>"><?php echo $t->nama_cabang;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tgl">Nama</label>
    <div class="controls">
      <input type="text" class="span2" name="nama" id="nama" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tgl">Tempat,Tanggal Lahir</label>
    <div class="controls">
      <input type="text" class="span2" name="tempat_lahir" id="tempat_lahir" >&nbsp; , &nbsp;
      <input type="text" class="span2" name="tanggal_lahir" id="tanggal_lahir" >
    </div>  
  </div>  
  <div class="control-group">
    <label class="control-label" for="nip">Alamat</label>
    <div class="controls">
      <input type="text" class="span2 input" name="alamat" id="alamat">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Telepon</label>
    <div class="controls">
      <input type="text" class="span4 input" name="telepon" id="telepon" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nip">Email</label>
    <div class="controls">
      <input type="text" class="span2 input" name="email" id="email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">HP</label>
    <div class="controls">
      <input type="text" class="span4 input" name="hp" id="hp" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Tanggal Masuk</label>
    <div class="controls">
      <input type="text" class="span4 input" name="tanggal_masuk" id="tanggal_masuk" >
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2" align="center">
    <button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
    	<!--
      <button type="button" name="cetak" id="cetak" class="ui-button-success"><i class="icon-print icon-white"></i> Cetak</button>
      -->
      <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>
</tr>      
</table>  
</form>
