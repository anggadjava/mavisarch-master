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
    var id = $("#id").val();
    var string = "id="+id;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/cariDataPertemuan",
      data  : string,
      cache : false,
      dataType : "json",
      success : function(data){
        $("#tanggal").val(data.tanggal);
      },
    });

   } 
  
  $("#simpan").click(function(e){
    var a = $("#my-form").serialize();
    var string = a;
    
    if(tanggal.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Tanggal Tidak boleh kosong'},type:'danger'
      }).show();
      $("#tanggal").focus();
      return false();
    }
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/simpanPertemuan",
      data  : string,
      cache : false,
      success : function(data){
        $('.bottom-right').notify({
            message: {text:data},type:'danger'
        }).show();
         window.location.assign("<?php echo site_url();?>/kelas/pertemuan/<?php echo $this->uri->segment(3); ?>")
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/kelas/pertemuan/<?php echo $this->uri->segment(3); ?>")
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
    <label class="control-label" for="tanggal">Tanggal Pertemuan</label>
    <div class="controls">
      <input type="text" class="span2" name="tanggal" id="tanggal" >
      <input type="hidden" class="span2" name="kode_kelas" id="kode_kelas" value="<?php echo $this->uri->segment(3); ?>" >
      <?php if(isset($id)){ ?>
        <input type="hidden" class="span2" name="id" id="id" value="<?php echo $id; ?>" >
     <?php } ?>
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

