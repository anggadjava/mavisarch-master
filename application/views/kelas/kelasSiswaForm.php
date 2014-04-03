  <link type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fileupload.css" rel="stylesheet" />
  <script type="text/javascript">
$(document).ready(function(){
  
   $(".chosen-select").chosen(); 

  
   $("#nis").change(function(e){
    var nis  = $("#nis").val();
    var string = 'nis='+nis;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/getDataSiswa",
      data  : string,
      dataType : "json",
      cache : false,
      success : function(data){
        $("#nis2").val(data.nis);
        $("#tempat_lahir").val(data.tempat_lahir);
        $("#tanggal_lahir").val(data.tanggal_lahir);
        $("#alamat").val(data.alamat);
        $("#telepon").val(data.telepon);
      }
    });
    e.preventDefault();
  });
  
  $("#simpan").click(function(e){
    var nis  = $("#nis").val();
    var kode_kelas  = $("#kode_kelas").val();
    var string = "nis="+nis+'&kode_kelas='+kode_kelas;
    
    if(nis.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, NIS Tidak boleh kosong'},type:'danger'
      }).show();
      $("#nis").focus();
      return false();
    }
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/kelasSiswaSimpan",
      data  : string,
      cache : false,
       statusCode: {
          500: function() {
            $('.bottom-right').notify({
               message: {text:'Siswa ini sudah masuk dalam kelas'},type:'danger'
            }).show();
          }
        },
      success : function(data){
        $('.bottom-right').notify({
            message: {text:data},type:'danger'
        }).show();
         window.location.assign("<?php echo site_url();?>/kelas/detail/<?php echo $this->uri->segment(3); ?>")
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/kelas/detail/<?php echo $this->uri->segment(3); ?>")
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
    <label class="control-label" for="nis">Nama</label>
    <div class="controls">
      <select name="nis" id="nis" class="span2 input chosen-select">
      <option value="">-Pilih-</option>
      <?php 
    foreach($list_siswa->result() as $t){
     ?>
         <option value="<?php echo $t->nomor_induk;?>"><?php echo $t->nama;?></option>
        <?php } ?>
        </select>
      <input type="hidden" class="span3 input form-control" value="<?php echo $this->uri->segment(3) ?>" name="kode_kelas" id="kode_kelas" >
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="nis">NIS</label>
    <div class="controls">
      <input type="text" class="span2" id="nis2" disabled>
    </div>
  </div>  
   <div class="control-group">
    <label class="control-label" for="TTL">Tempat, Tanggal Lahir</label>
    <div class="controls">
      <input type="text" class="span2" id="tempat_lahir" disabled> , 
      <input type="text" class="span2" id="tanggal_lahir" disabled>
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="Alamat">Alamat</label>
    <div class="controls">
      <input type="text" class="span2" id="alamat" disabled>
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="telepon">Telepon</label>
    <div class="controls">
      <input type="text" class="span2" id="telepon" disabled>
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

