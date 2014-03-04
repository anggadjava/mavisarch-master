  <link type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fileupload.css" rel="stylesheet" />
  <script type="text/javascript">
$(document).ready(function(){
  Cari_Data();


  $('#tanggal').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });

  function Cari_Data(){
    var id = $('#id').val();
    var string = "id="+id;
    if (id!='') {
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/buku_tamu/followup_cari_data",
      data  : string,
      cache : false,
      dataType : "json",
      success : function(data){
        $("#kode_bukutamu").val(data.kode_bukutamu);
        $("#tanggal").val(data.tanggal);
        $("#via").val(data.via);
        $("#hasil").val(data.hasil);

      },
       error: function(ts) { alert(ts.responseText) }
    });
    };

   } 
  
  $("#simpan").click(function(e){
    var kode_bukutamu = $("#kode_bukutamu").val()
    var a = $("#my-form").serialize();
    var string = a+"&kode_bukutamu="+kode_bukutamu;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/buku_tamu/followup_simpan",
      data  : string,
      cache : false,
      success : function(data){
        $('.bottom-right').notify({
            message: {text:data},type:'danger'
        }).show();
         window.location.assign("<?php echo site_url();?>/buku_tamu/followup/"+kode_bukutamu)
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/buku_tamu");
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
    <label class="control-label" for="nomor">Kode Buku Tamu</label>
    <div class="controls">
      <input type="hidden" name="id" id="id" value="<?php if (isset($id)) {echo $id;} ?>" >
      <input type="text" class="span3 input form-control" name="kode_bukutamu" id="kode_bukutamu" disabled value="<?php echo $kode_bukutamu; ?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tgl">Tanggal Follow Up</label>
    <div class="controls">
      <input type="text" class="span3" name="tanggal" id="tanggal" >
    </div>  
  </div>  
  <div class="control-group">
    <label class="control-label" for="via">Via</label>
    <div class="controls">
      <select name="via" id="via" class="span3 input">
      <option value="">-Pilih-</option>
               <option value="Telepon">Telepon</option>
               <option value="Email">Email</option>
               <option value="Chat">Chat</option>
               <option value="Surat">Surat</option>
                 
      </select>
      
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Hasil</label>
    <div class="controls">
      <textarea class="span3 input" name="hasil" id="hasil" rows="5"></textarea>
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

