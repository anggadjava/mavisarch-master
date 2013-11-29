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
      <th>Nama Korban</th>
      <th>TTL</th>
      <th>Jenis Kelamin</th>
      <th>Alamat Korban</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data->result_array() as $dp){
          $tgl = $dp['T_Lahir_Korban'].', '.$this->app_model->tgl_indo($dp['Tgl_Lahir_Korban']);
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['Nama_Korban']; ?></center></td>
      <td><center><?php echo $tgl; ?></center></td>
      <td><center><?php echo $dp['JK_Korban']; ?></center></td>
      <td><?php echo $dp['Alamat_Korban']; ?></td>
      <td width="100">
          <div class="btn-group">
              <a class="btn btn-success" href="javascript:editData_5('<?php echo $dp['ID_Korban'] ?>')"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData_5('<?php echo $dp['ID_Korban'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
      </td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>