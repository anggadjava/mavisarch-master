<script type="text/javascript">
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

</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/cabang/tambah"><i class="icon-plus-sign icon-white"></i> Tambah Data</a></li>
              <li><a href="<?php echo base_url();?>index.php/cabang"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->  
<section>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Cabang</th>
        <th>Nama Cabang</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Yahoo Messenger</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
      <tr>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['kode_cabang']; ?></center></td>
        <td><center><?php echo $dp['nama_cabang']; ?></center></td>
        <td><center><?php echo $dp['alamat']; ?></center></td>
        <td><center><?php echo $dp['telepon']; ?></center></td>
        <td><center><?php echo $dp['ym_id']; ?></center></td>
        <td width="100">
	        <div class="btn-group">
	          <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/cabang/edit/<?php echo $dp['kode_cabang']; ?>"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['kode_cabang'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
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