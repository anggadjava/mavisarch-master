<script type="text/javascript">
function hapusData(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus NIK ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/guru/hapus",
      data  : "NIK="+id,
      success : function(data){     
        window.location.assign("<?php echo site_url();?>/guru")
      }
    });
  }
}
$('#btn_cari').click(function () {
      window.location.assign("<?php echo site_url();?>/guru/index/cari/"+$("#cari").val());
    return false;
  });

</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/guru/tambah"><i class="icon-plus-sign icon-white"></i> Tambah Data</a></li>
              <li><a href="<?php echo base_url();?>index.php/guru"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		<div class="span6 pull-right">
        <form id="my-form" class="navbar-form pull-right">
            <div class="input-append" style="padding-top:0px;">
          <input type="text" class="span2" name="cari" id="cari" placeholder="Cari NIK atau Nama Guru">
      <button type="submit" id="btn_cari" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari</button>
          </div>
    </form>
    </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->  
<section>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Tagihan</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
      <tr>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['jenis_tagihan']; ?></center></td>
        <td width="100">
	        <div class="btn-group">
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/guru/edit/<?php echo $dp['NIK']; ?>"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['NIK'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
    </tbody>
  </table>
  <div class="pagination pagination-centered">
      <ul>
      <?php
      echo $paginator;
      ?>
      </ul>
  </div>
</section>
<ul class="nav nav-tabs">
  <li class="active"><a href="#A" data-toggle="tab">Tambah Jenis Tagihan</a></li>
</ul>
<div class="tabbable">
  <div class="tab-content">
    <div class="tab-pane " id="A">
      <button type="button" name="add_bentuk_laka" id="add_bentuk_laka" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="bentuk_laka"></div>
      <div id="input_bentuk_laka" title="Bentuk Kecelakaan">
      </div>
    </div>  
  </div>  
  </div>  