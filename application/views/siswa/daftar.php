<script type="text/javascript">
$('#btn_cari').click(function () {
      window.location.assign("<?php echo site_url();?>/siswa/index/cari/"+$("#cari").val());
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
              <li><a href="<?php echo base_url();?>index.php/siswa"><i class="icon-refresh icon-white"></i> Refresh</a></li>
      </ul>
      </div>
    <div class="span6 pull-right">
        <form id="my-form" class="navbar-form pull-right">
            <div class="input-append" style="padding-top:0px;">
          <input type="text" class="span2" name="cari" id="cari" placeholder="Cari NIS atau Nama Siswa">
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
        <th>NIS</th>
        <th>Nama</th>
        <th>Telepon</th>
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
        <td><center><?php echo $dp['nis']; ?></center></td>
        <td><center><?php echo $dp['nama']; ?></center></td>
        <td><center><?php echo $dp['telepon']; ?></center></td>
        <td width="100">
          <div class="btn-group">
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/siswa/detail/<?php echo $dp['nis']; ?>"><i class="icon-eye-open icon-white"></i> Detail Siswa</a>
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