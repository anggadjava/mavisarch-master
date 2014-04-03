  <link type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fileupload.css" rel="stylesheet" />
  <script type="text/javascript">
$(document).ready(function(){
  
  // Cari_Data();

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
       error: function(ts) { alert(ts.responseText) }
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
<script>
$(function() {
  $( "#tabs" ).tabs();
});
</script>
<form id="my-form" class="form-horizontal">
  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">Data Pribadi</a></li>
      <li><a href="#tabs-2">Tagihan Pendaftaran</a></li>
    </ul>
    <div id="tabs-1">
      <table width="100%">
        <tr>
          <td colspan=2 valign="top"><h3>Data Pribadi</h3></td>
          
        </tr>
        <tr>  
          <td width="50%" valign="top">
            <div class="control-group">
              <label class="control-label" for="nis">NIS</label>
              <div class="controls">
                <input type="text" class="span3 input form-control" name="nis" disabled id="nis" value="<?php echo $nis; ?>" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nomor">Kode Buku Tamu</label>
              <div class="controls">
                <input type="text" class="span3 input form-control" name="kode_bukutamu" id="kode_bukutamu" value="" >
              </div>
            </div>
            <div class="control-group">
    <label class="control-label" for="cabang">Cabang</label>
    <div class="controls">
      <input type="text" class="span3 input form-control" value="<?php echo $this->session->userdata('cabang'); ?>" name="cabang" id="cabang" disabled >
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
                <input type="text" class="span3 input" name="alamat" id="alamat">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="rt">RT/RW</label>
              <div class="controls">
                <input type="text" class="span1 input" name="rt" id="rt">/
                <input type="text" class="span1 input" name="rw" id="rw">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nip">kelurahan</label>
              <div class="controls">
                <input type="text" class="span3 input" name="kelurahan" id="kelurahan">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nip">Kota</label>
              <div class="controls">
                <input type="text" class="span3 input" name="kota" id="kota">
              </div>
            </div>
          </td>
          <td valign="top">
            <div class="control-group">
              <label class="control-label" for="nama">Telepon</label>
              <div class="controls">
                <input type="text" class="span2 input" name="telepon" id="telepon" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nip">Email</label>
              <div class="controls">
                <input type="text" class="span2 input" name="email" id="email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="nama">Keperluan</label>
              <div class="controls">
                <textarea class="span2 input" name="hp" id="hp"></textarea>
              </div>
            </div>
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
    <label class="control-label" for="nama">Nama Foto</label>
    <div class="controls">
      <input type="text" class="span2 input" name="foto" id="foto" readonly>
    </div>
  </div>
  </form>
  <div class="control-group">
    <label class="control-label" for="nama">Unggah Foto</label>
    <div class="controls">
        <script src="<?php echo base_url(); ?>asset/js/blueimp/jquery.fileupload.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>asset/js/blueimp/jquery.ui.widget.js" type="text/javascript"></script>
        <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span>Pilih file</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files" >
      
        
      <script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?=site_url()?>/guru/uploadFoto';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                
               $("#files").attr("src",file.thumbnailUrl);
                $("#foto").val(file.url);
            });

        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>

    </span>
    
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Foto Guru</label>
    <div class="controls">
      <img id="files" class="files"></img>
    </div>
  </div>
          </td>
        </tr>

      </table>  
    </div>

</div> <!-- close tab -->
<table width="100%">
  <tr>
    <td colspan="2" align="center">
      <button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
      <!--
      <button type="button" name="cetak" id="cetak" class="ui-button-success"><i class="icon-print icon-white"></i> Cetak</button>
    -->
    <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>

</table>
</form>

