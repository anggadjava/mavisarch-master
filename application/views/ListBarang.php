<script type="text/javascript">
function pilih(id){
	$("#kode").val(id);
	$("#DataBarang").dialog("close");
	$("#kode").focus();
}
</script>
<style type="text/css">
table {
	margin-top:5px;
}
.table tr th {
	text-align:center;
	background-color:#000;
	color:#fff;
}
</style>
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Ambil</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data->result_array() as $dp){
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['kd_barang']; ?></center></td>
      <td><?php echo $dp['nama_barang']; ?></td>
      <td><center><?php echo $dp['satuan']; ?></center></td>
      <td><center><?php echo number_format($dp['harga']); ?></center></td>
      <td width="100">
      <div class="btn-group">
      	<a class="btn btn-small btn-info" href="javascript:pilih('<?php echo $dp['kd_barang'];?>')" >
        <i class="icon-check icon-white"></i> Ambil</a>
      </div><!-- /btn-group -->
		</td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>