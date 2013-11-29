<script type="text/javascript">
$(document).ready(function(){
	$('#cari_tgl').datepicker({
        inline: true
    });
});
</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/petugas/tambah"><i class="icon-plus-sign icon-white"></i> Tambah Data</a></li>
              <li><a href="<?php echo base_url();?>index.php/petugas"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		<div class="span5 pull-right">
        <form id="my-form" class="navbar-form pull-right" method="post" action="<?php echo base_url();?>index.php/surat_tugas/cari">
            <div class="input-append" style="padding-top:0px;">
          <input type="text" class="span2" name="cari" id="cari" placeholder="Cari Petugas">
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
      <th>ID Petugas</th>
      <th>Nama Petugas</th>
      <th>TTL</th>
      <th>Alamat </th>
      <th>No Telepon</th>
      <th>Pangkat</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data->result_array() as $dp){
          $tgl = $dp['Tempat_Lahir'].', '.$this->app_model->tgl_indo($dp['Tgl_Lahir']);
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['ID_Petugas']; ?></center></td>
      <td><center><?php echo $dp['Nama_Petugas']; ?></center></td>
      <td><center><?php echo $tgl; ?></center></td>
      <td><?php echo $dp['Alamat']; ?></td>
      <td><?php echo $dp['No_Tlp']; ?></td>
      <td><?php echo $dp['Pangkat']; ?></td>
      <td><?php echo $dp['Jabatan']; ?></td>
      <td width="100">
          <div class="btn-group">
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/surat_tugas/edit/<?php echo $dp['ID_Petugas']; ?>"><i class="icon-edit icon-white"></i> Edit</a>
            <a class="btn btn-warning"href="<?php echo base_url(); ?>index.php/surat_tugas/hapus/<?php echo $dp['ID_Petugas']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash icon-white"></i> Hapus</a>
          </div><!-- /btn-group -->
      </td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>