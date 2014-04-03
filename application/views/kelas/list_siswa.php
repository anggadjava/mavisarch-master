<script type="text/javascript">
function hapusData(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/kelas/hapus",
      data  : "kode_kelas="+id,
      success : function(data){     
        window.location.assign("<?php echo site_url();?>/kelas")
      }
    });
  }
}
$('#btn_cari').click(function () {
      window.location.assign("<?php echo site_url();?>/kelas/index/cari/"+$("#cari").val());
    return false;
  });

</script>

<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/kelas/tambahKelasSiswa/<?php echo $this->uri->segment(3); ?>" id="tambah_siswa"><i class="icon-plus-sign icon-white"></i> Tambah Siswa</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/kelas/penilaian/<?php echo $this->uri->segment(3); ?>"><i class="icon-trophy icon-white"></i> Penilaian</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/kelas/studentprogress/<?php echo $this->uri->segment(3); ?>"><i class="icon-bar-chart icon-white"></i> Student Progress</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/kelas/pertemuan/<?php echo $this->uri->segment(3); ?>"><i class="icon-bell icon-white"></i> Pertemuan</a></li>
              <li><a href="<?php echo base_url();?>index.php/kelas"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->  
<section>
  <h3>Kelas : <?php echo $this->uri->segment(3); ?></h3>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Cabang</th>
        <th>Kota</th>
        <th>Telepon</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['nis']; ?></center></td>
        <td><center><?php echo $dp['nama']; ?></center></td>
        <td><center><?php echo $dp['cabang']; ?></center></td>
        <td><center><?php echo $dp['kota']; ?></center></td>
        <td><center><?php echo $dp['guru']; ?></center></td>
        <td width="100">
	        <div class="btn-group">
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/kelas/detail/<?php echo $dp['nis']; ?>"><i class="icon-folder-open icon-white"></i> Detail Siswa</a>
	          <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['kode_kelas'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
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