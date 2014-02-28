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
</script>
<div class="navbar">
    <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#"><?php echo $judul;?></a>
      <div class="nav-collapse">
      <ul class="nav">
          <li><a href="<?php echo base_url(); ?>index.php/buku_tamu/index"><i class="icon-book icon-white"></i> Daftar Buku Tamu</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/buku_tamu/followup_tambah/<?php echo $kode_bukutamu ?>"><i class="icon-plus-sign icon-white"></i> Tambah Follow Up</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/buku_tamu/placement_test/<?php echo $kode_bukutamu ?>"><i class="icon-book icon-white"></i> Placement Test</a></li>
              <li><a href="<?php echo base_url();?>index.php/buku_tamu/followup"><i class="icon-refresh icon-white"></i> Refresh</a></li>
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
        <th>Kode Buku Tamu</th>
        <th>Tanggal</th>
        <th>Via</th>
        <th>Hasil</th>
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
        <td><center><?php echo $dp['kode_bukutamu']; ?></center></td>
        <td><center><?php echo $dp['tanggal']; ?></center></td>
        <td><center><?php echo $dp['via']; ?></center></td>
        <td><center><?php echo $dp['hasil']; ?></center></td>
        <td width="100">
          <div class="btn-group">
            <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['id'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
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