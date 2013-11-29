<script type="text/javascript">
$(document).ready(function(){

});

</script>
<section>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No.</th>
        <th>Jenis Kendaraan</th>
        <th>No Polisi</th>
        <th>Tipe Kendaraan</th>
        <th>Merek </th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=1;
		foreach($data->result_array() as $dp){
	?>
      <tr>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['Jenis_Kend']; ?></center></td>
        <td><?php echo $dp['No_Pol']; ?></td>
        <td><?php echo $dp['Tipe_Kend']; ?></td>
        <td><?php echo $dp['Merk_Kend']; ?></td>
        <td width="100">
	        <div class="btn-group">
              <a class="btn btn-success" href="javascript:editData_3('<?php echo $dp['id_kend'] ?>')"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData_3('<?php echo $dp['id_kend'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
    </tbody>
  </table>
</section>