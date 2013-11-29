<script type="text/javascript">
$(document).ready(function(){
	$('#cari_tgl').datepicker({
        inline: true
    });
});
function hapusData(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/bap/hapus",
      data  : "id="+id,
      success : function(data){     
        window.location.assign("<?php echo site_url();?>/bap")
      }
    });
  }
}
function cetakData(ID){
		var No		= ID;//$("#No_LP").val();

		window.open('<?php echo site_url();?>/bap/cetak/'+No);	
}

</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/bap/tambah"><i class="icon-plus-sign icon-white"></i> Tambah Data</a></li>
              <li><a href="<?php echo base_url();?>index.php/bap"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		<div class="span6 pull-right">
        <form id="my-form" class="navbar-form pull-right" method="post" action="<?php echo base_url();?>index.php/surat_tugas/cari">
            <div class="input-append" style="padding-top:0px;">
            <input type="text" class="span2" name="cari_tgl" id="cari_tgl" placeholder="Masukkan Tanggal">
          <input type="text" class="span2" name="cari" id="cari" placeholder="Cari No LP">
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
        <th>No.</th>
        <th>No.LP</th>
        <th>ID Petugas</th>
        <th>Waktu Kejadian</th>
        <th>Waktu Dilaporkan</th>
        <th>Alamat Kejadian</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=$tot+1;
		foreach($data->result_array() as $dp){
			$w_kd = $this->app_model->tgl_jam_str($dp['Waktu_Kejadian']);
      $w_dl = $this->app_model->tgl_jam_str($dp['Waktu_Dilaporkan']);
			//$w_dt = $this->app_model->tgl_jam_str($dp['Waktu_Diterima']);
      $id_petugas = $this->app_model->cari_petugas($dp['ID_Petugas']);
	?>
      <tr>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['No_LP']; ?></center></td>
        <td><center><?php echo $id_petugas; ?></center></td>
        <td><center><?php echo $w_kd; ?></center></td>
        <td><center><?php echo $w_dl; ?></center></td>
        
        <td><?php echo $dp['Alamat_Kejadian']; ?></td>
        <td width="100">
	        <div class="btn-group">
	          <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/bap/edit/<?php echo $dp['No_LP']; ?>"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['No_LP'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
              <a class="btn btn-success" href="javascript:cetakData('<?php echo $dp['No_LP'] ?>')"><i class="icon-print icon-white"></i> Cetak</a>
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