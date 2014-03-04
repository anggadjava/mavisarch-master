<script type="text/javascript">
function hapusData(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus Buku Tamu ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/buku_tamu/hapus",
      data  : "kode_bukutamu="+id,
      success : function(data){     
        window.location.assign("<?php echo site_url();?>/buku_tamu")
      }
    });
  }
}
$('#btn_cari').click(function () {
      window.location.assign("<?php echo site_url();?>/buku_tamu/index/cari/"+$("#cari").val());
    return false;
  });

</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/buku_tamu/tambah"><i class="icon-plus-sign icon-white"></i> Tambah Data</a></li>
              <li><a href="<?php echo base_url();?>index.php/buku_tamu"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		<div class="span6 pull-right">
        <form id="my-form" class="navbar-form pull-right">
            <div class="input-append" style="padding-top:0px;">
          <input type="text" class="span2" name="cari" id="cari" placeholder="Cari Nama/Kode Buku Tamu">
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
        <th>Kode</th>
        <th>Nama</th>
        <th>Cabang</th>
        <th>HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
      <?php if  ($dp['sudah_daftar'] !=''){ echo '<tr style="background-color:#74f3ff;">';}else{echo '<tr>';}?>
      
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['kode_bukutamu']; ?></center></td>
        <td><center><?php echo $dp['nama']; ?></center></td>
        <td><center><?php echo $dp['nama_cabang']; ?></center></td>
        <td><center><?php echo $dp['hp']; ?></center></td>
        <td width="100">
	        <div class="btn-group">
            <?php if  ($dp['sudah_daftar'] ==''){ echo '<a class="btn btn-success" href="'.base_url().'index.php/buku_tamu/pendaftaran/'.$dp['kode_bukutamu'].'"><i class="icon-external-link icon-white"></i> Daftar</a>';}?>
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/buku_tamu/followup/<?php echo $dp['kode_bukutamu']; ?>"><i class="icon-suitcase icon-white"></i> Detail</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/buku_tamu/edit/<?php echo $dp['kode_bukutamu']; ?>"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['kode_bukutamu'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
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