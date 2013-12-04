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
    <label class="control-label" for="nomor">Kode Cabang</label>
    <div class="controls">
      <input type="text" class="span3 input" name="kode_cabang" id="kode_cabang" value="" <?php echo $readonly;?>>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tgl">Nama Cabang</label>
    <div class="controls">
      <input type="text" class="span2" name="nama_cabang" id="nama_cabang" >
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
    <label class="control-label" for="nama">Yahoo Messenger</label>
    <div class="controls">
      <input type="text" class="span4 input" name="ym_id" id="ym_id" >
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
