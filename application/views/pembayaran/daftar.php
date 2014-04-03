<script type="text/javascript">
$(document).ready(function(){

});


function hapusPembayaran(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/pembayaran/hapus",
      data  : "id="+id,
      success : function(data){   
		$('.bottom-right').notify({
				message: {text:'Success, Data berhasil dihapus'},type:'danger'
		}).show();
    location.reload();
      }
    });
  }
}

</script>
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th>No.</th>
      <th>NIS</th>
      <th>Tanggal</th>
      <th>Keterangan</th>
      <th>Jumlah Bayar</th>
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
      <td><center><?php echo $dp['nis']; ?></center></td>
      <td><center><?php echo $dp['tanggal']; ?></center></td>
      <td><center><?php echo $dp['keterangan']; ?></center></td>
      <td><center><?php echo $dp['total_bayar']; ?></center></td>
     <td width="100">
	        <div class="btn-group">
	          <a class="btn btn-warning" href="javascript:hapusPembayaran('<?php echo $dp['id'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
		</td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>