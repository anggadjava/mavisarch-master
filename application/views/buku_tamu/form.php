  <link type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fileupload.css" rel="stylesheet" />
  <script type="text/javascript">
$(document).ready(function(){
  
  Cari_Data();

  $('#tanggal_lahir').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
   $(".chosen-select").chosen(); 

  function Cari_Data(){
    var id = $("#kode").val();
    var string = "kode_bukutamu="+id;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/buku_tamu/cari_data",
      data  : string,
      cache : false,
      dataType : "json",
      success : function(data){
        $("#kode").val(data.kode_bukutamu);
        $("#kode_cabang").val(data.cabang);
        $("#nama").val(data.nama);
        $("#tempat_lahir").val(data.tempat_lahir);
        $("#tanggal_lahir").val(data.tanggal_lahir);
        $("#alamat").val(data.alamat);
        $("#hp").val(data.hp);
        $("#email").val(data.email);
        $("#keperluan").val(data.keperluan);
        $("#pilihan_hari").val(data.pilihan_hari);
        $("#pilihan_jam").val(data.pilihan_jam);
        $("#sekolah_asal").val(data.sekolah_asal);
        $("#program").val(data.program);
        $("#sumber_informasi").val(data.sumber_informasi);
        $("#sumber_lain").val(data.sumber_lain);
        $(".chosen-select").trigger("chosen:updated");
      },
       // error: function(ts) { alert(ts.responseText) }
    });

   } 
  
  $("#simpan").click(function(e){
    var nama  = $("#nama").val();
    var kode_bukutamu  = $("#kode").val();
    var cabang  = $("#kode_cabang").val();
    var hp  = $("#hp").val();
    var a = $("#my-form").serialize();
    var string = a+'&kode_bukutamu='+kode_bukutamu+'&cabang='+cabang;
    
    if(nama.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Nama Tidak boleh kosong'},type:'danger'
      }).show();
      $("#nama").focus();
      return false();
    }
    if(hp.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Nomor Telepon Tidak boleh kosong'},type:'danger'
      }).show();
      $("#nama").focus();
      return false();
    }
    // alert(string);
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/buku_tamu/simpan",
      data  : string,
      cache : false,
      success : function(data){
        $('.bottom-right').notify({
            message: {text:data},type:'danger'
        }).show();
         window.location.assign("<?php echo site_url();?>/buku_tamu")
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/buku_tamu")
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
      <input type="text" class="span3 input form-control" name="kode" id="kode" disabled value="<?php echo $kode_bukutamu; ?>" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="cabang">Cabang</label>
    <div class="controls">
      <input type="text" class="span3 input form-control" value="<?php echo $this->session->userdata('cabang'); ?>" name="kode_cabang" id="kode_cabang" disabled >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Nama</label>
    <div class="controls">
      <input type="text" class="span3 input" name="nama" id="nama" >
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
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
      <input type="text" class="span3 input" name="alamat" id="alamat">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">HP</label>
    <div class="controls">
      <input type="text" class="span3 input" name="hp" id="hp" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" class="span3 input" name="email" id="email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="keperluan">Keperluan</label>
    <div class="controls">
      <textarea class="span3 input" name="keperluan" id="keperluan" rows="5"></textarea>
    </div>
  </div>
</td>
<td width="50%" valign="top">
  <div class="control-group">
    <label class="control-label" for="tgl">Pilihan Hari dan Jam</label>
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
    <label class="control-label" for="sekolah_asal">Sekolah Asal</label>
    <div class="controls">
      <input type="text" class="span3 input" name="sekolah_asal" id="sekolah_asal">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="program_pilihan">Program Pilihan</label>
    <div class="controls">
      <select name="program" id="program" class="span3 input chosen-select" multiple>
      <option value="">-Pilih-</option>
      <?php 
    $data = $this->ref_model->list_program();
    foreach($data->result() as $t){
     ?>
         <option value="<?php echo $t->nama_program;?>"><?php echo $t->nama_program;?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="sumber_informasi">Sumber Informasi</label>
    <div class="controls">
      <select name="sumber_informasi" id="sumber_informasi" class="span2 input chosen-select" multiple>
      <option value="">-Pilih-</option>
      <?php 
    $data = $this->ref_model->list_sumber_informasi();
    foreach($data->result() as $t){
     ?>
         <option value="<?php echo $t->sumber_informasi;?>"><?php echo $t->sumber_informasi;?></option>
        <?php } ?>
        </select>
    </div>

  </div>
  <div class="control-group">
    <label class="control-label" for="sumber_lain">Sumber Informasi Lain</label>
    <div class="controls">
      <input type="text" class="span3 input" name="sumber_lain" id="sumber_lain">
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

