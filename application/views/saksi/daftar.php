<script type="text/javascript">
$(document).ready(function(){
	$('#cari_tgl').datepicker({
        inline: true
    });
});
</script>
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama Saksi</th>
      <th>TTL</th>
      <th>Alamat Saksi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data->result_array() as $dp){
          $tgl =$dp['Tempat_Lahir'].', '. $this->app_model->tgl_indo($dp['Tanggal_Lahir']);
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['Nama_Saksi']; ?></center></td>
      <td><center><?php echo $tgl; ?></center></td>
      <td><?php echo $dp['Alamat_Saksi']; ?></td>
      <td width="100">
          <div class="btn-group">
              <a class="btn btn-success" href="javascript:editData_6('<?php echo $dp['ID_Saksi'] ?>')"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData_6('<?php echo $dp['ID_Saksi'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
      </td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>