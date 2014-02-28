  <link type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fileupload.css" rel="stylesheet" />
  <script type="text/javascript">
$(document).ready(function(){
  Cari_Data();
  $("#pt_structure_scr, #pt_written_scr, #pt_expression_scr").change(function() {
    var a = parseInt($('#pt_expression_scr').val());
    var b = parseInt($('#pt_written_scr').val());
    var c = parseInt($('#pt_structure_scr').val());
    var rata = (a+b+c)/3;
    $('#pt_rata').val(rata);
  });

  $('#pt_tanggal').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
  $(".chosen-select").chosen(); 


  function Cari_Data(){
    var id = $('#kode_bukutamu').val();
    var string = "kode_bukutamu="+id;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/buku_tamu/pt_cari_data",
      data  : string,
      cache : false,
      dataType : "json",
      success : function(data){
        $("#kode_bukutamu").val(data.kode_bukutamu);
        $("#pt_tanggal").val(data.pt_tanggal);
        $("#pt_pic").val(data.pt_pic);
        $("#pt_structure_scr").val(data.pt_structure_scr);
        $("#pt_written_scr").val(data.pt_written_scr);
        $("#pt_expression_scr").val(data.pt_expression_scr);
        $("#pt_rata").val(data.pt_rata);
        $("#pt_rec_level").val(data.pt_rec_level);
        $(".chosen-select").trigger("chosen:updated");

      },
       error: function(ts) { alert(ts.responseText) }
    });

   }; 
  
  $("#simpan").click(function(e){
    var kode_bukutamu = $("#kode_bukutamu").val()
    var pt_rata = $("#pt_rata").val()
    var a = $("#my-form").serialize();
    var string = a+"&kode_bukutamu="+kode_bukutamu+"&pt_rata="+pt_rata;
    confirm(string);
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/buku_tamu/pt_simpan",
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
      <input type="text" class="span3 input form-control" name="kode_bukutamu" id="kode_bukutamu" disabled value="<?php echo $kode_bukutamu; ?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tgl">Tanggal Placement Test</label>
    <div class="controls">
      <input type="text" class="span3" name="pt_tanggal" id="pt_tanggal" >
    </div>  
  </div>  
  <div class="control-group">
    <label class="control-label" for="pic">PIC</label>
    <div class="controls">
      <select name="pt_pic" id="pt_pic" class="span3 input chosen-select">
      <option value="">-Pilih-</option>
      <?php 
    foreach($pic_data->result() as $t){
     ?>
         <option value="<?php echo $t->NIK;?>"><?php echo $t->nama;?></option>
        <?php } ?>
        </select>
      
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="structure_score">Structure Score</label>
    <div class="controls">
      <input type="text" class="span3" name="pt_structure_scr" id="pt_structure_scr" >
    </div>
  </div>
  <div class="control-group">
            <label class="control-label" for="Written Score">Written Score</label>
            <div class="controls">
              <input type="text" class="span3" name="pt_written_scr" id="pt_written_scr" >
            </div>  
          </div>    
          <div class="control-group">
            <label class="control-label" for="Expression Score">Expression Score</label>
            <div class="controls">
              <input type="text" class="span3" name="pt_expression_scr" id="pt_expression_scr" >
            </div>  
          </div>    
          <div class="control-group">
            <label class="control-label" for="rata-rata">Rata-rata</label>
            <div class="controls">
              <input type="text" class="span3" name="pt_rata" id="pt_rata" disabled >
            </div>  
          </div>
  <div class="control-group">
    <label class="control-label" for="level">Recomended Level</label>
    <div class="controls">
      <select name="pt_rec_level" id="pt_rec_level" class="span2 input chosen-select">
      <option value="">-Pilih-</option>
      <?php 
    $data = $this->ref_model->list_level();
    foreach($data->result() as $t){
     ?>
         <option value="<?php echo $t->id_level;?>"><?php echo $t->nama_level;?></option>
        <?php } ?>
        </select>
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

