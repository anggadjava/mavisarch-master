  <link type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fileupload.css" rel="stylesheet" />
  <script type="text/javascript">
$(document).ready(function(){
  
  Cari_Data();
  $('#tanggal_mulai').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });

  $('#tanggal_ujian').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
  $('#tanggal_selesai').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
   $(".chosen-select").chosen(); 

  function Cari_Data(){
    var id = $("#kode_kelas").val();
    var string = "kode_kelas="+id;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/cari_data",
      data  : string,
      cache : false,
      dataType : "json",
      success : function(data){
        $("#kode_kelas").val(data.kode_kelas);
        $("#cabang").val(data.cabang);
        $("#level").val(data.level);
        $("#ruang").val(data.ruang);
        $("#pilihan_hari").val(data.hari);
        $("#pilihan_jam").val(data.jam);
        $("#tanggal_mulai").val(data.tanggal_mulai);
        $("#tanggal_ujian").val(data.tanggal_ujian);
        $("#tanggal_selesai").val(data.tanggal_selesai);
        $("#guru").val(data.guru);
        $("#harga").val(data.harga);
        $("#jumlah_pertemuan").val(data.jumlah_pertemuan);
        $(".chosen-select").trigger("chosen:updated");
      },
       // error: function(ts) { alert(ts.responseText) }
    });

   } 
   $("#level").change(function(e){
    var level  = $("#level").val();
    var string = 'level='+level;
    
    // alert(string);
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/get_kode_kelas",
      data  : string,
      dataType : "json",
      cache : false,
      success : function(data){
        $("#kode_kelas").val(data.kode);
      }
    });
    e.preventDefault();
  });
  
  $("#simpan").click(function(e){
    var cabang  = $("#cabang").val();
    var kode_kelas  = $("#kode_kelas").val();
    var a = $("#my-form").serialize();
    var string = a+"&kode_kelas="+kode_kelas;
    
    if(level.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Level Tidak boleh kosong'},type:'danger'
      }).show();
      $("#level").focus();
      return false();
    }
    // alert(string);
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/simpan",
      data  : string,
      cache : false,
      success : function(data){
        $('.bottom-right').notify({
            message: {text:data},type:'danger'
        }).show();
         window.location.assign("<?php echo site_url();?>/kelas")
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/kelas")
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
    <label class="control-label" for="kode_kelas">Kode Kelas</label>
    <div class="controls">
      <input type="text" class="span3 input form-control" name="kode_kelas" id="kode_kelas" disabled value="<?php echo $kode_kelas; ?>" >
      <input type="hidden" class="span3 input form-control" value="<?php echo $this->session->userdata('cabang'); ?>" name="cabang" id="cabang" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="level">Level</label>
    <div class="controls">
       <select name="level" id="level" class="span2 input chosen-select">
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
  <div class="control-group">
    <label class="control-label" for="ruang">Ruang</label>
    <div class="controls">
       <select name="ruang" id="ruang" class="span2 input chosen-select">
      <option value="">-Pilih-</option>
      <?php 
    $data = $this->ref_model->list_ruang($this->session->userdata('cabang'));
    foreach($data->result() as $t){
     ?>
         <option value="<?php echo $t->id_ruang;?>"><?php echo $t->nama_ruang;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tgl">Jadwal</label>
    <div class="controls">
      <select name="pilihan_hari" id="pilihan_hari" class="span2 input">
      <option value="">-Pilih-</option>
               <option value="Senin">Senin</option>
               <option value="Selasa">Selasa</option>
               <option value="Rabu">Rabu</option>
               <option value="Kamis">Kamis</option>
               <option value="Jumat">Jumat</option>
               <option value="Sabtu">Sabtu</option>
               <option value="Minggu">Minggu</option>
                 
                </select>
      
      <input type="text" name="pilihan_jam" id="pilihan_jam" value="" class="span2" />
      <script type="text/javascript">
      $('#pilihan_jam').timepicker({
        hourMin: 12,
        hourMax: 20,
        stepMinute: 10,
      });
      </script>
    </div>  
   </div> 
   <div class="control-group">
    <label class="control-label" for="tanggal_mulai">Tanggal Mulai</label>
    <div class="controls">
      <input type="text" class="span2" name="tanggal_mulai" id="tanggal_mulai" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tanggal_ujian">Tanggal Ujian</label>
    <div class="controls">
      <input type="text" class="span2" name="tanggal_ujian" id="tanggal_ujian" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>
    <div class="controls">
      <input type="text" class="span2" name="tanggal_selesai" id="tanggal_selesai" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="guru">Guru</label>
    <div class="controls">
       <select name="guru" id="guru" class="span2 input chosen-select">
      <option value="">-Pilih-</option>
      <?php 
    $data = $this->ref_model->list_guru($this->session->userdata('cabang'));
    foreach($data->result() as $t){
     ?>
         <option value="<?php echo $t->NIK;?>"><?php echo $t->nama;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="harga">Harga Kelas</label>
    <div class="controls">
      <input type="text" class="span2 input" name="harga" id="harga" >
    </div>
  </div>
  <script>
  $(function() {
    var spinner = $( "#jumlah_pertemuan" ).spinner();
  });
  </script>  
  <div class="control-group">
    <label class="control-label" for="pertemuan">Jumlah Pertemuan</label>
    <div class="controls">
      <input class="span2 input" name="jumlah_pertemuan" id="jumlah_pertemuan" >
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

