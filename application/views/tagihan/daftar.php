<script type="text/javascript">
$(document).ready(function(){

});

function editData_2(ID){
  var id  = ID;
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/tagihan/edit",
      data  : "id="+id,
	  dataType : "json",
      success : function(data){  
		
  		$("#nis").val(data.nis);
  		$("#jenis_tagihan").val(data.jenis_tagihan);
  		$("#besar_tagihan").val(data.besar_tagihan);
  		$("#cabang").val(data.cabang);
  		$("#potongan").val(data.potongan);
  		$("#notes").val(data.notes);
  		
  		$('#input_tagihan').dialog('open');
      $(".chosen-select").trigger("chosen:updated");
  		return false;
      },
      error: function(ts) { alert(ts.responseText) }
    });
  
}

function hapusData_2(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/tagihan/hapus",
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
      <th>Jenis</th>
      <th>Besar</th>
      <th>Cabang</th>
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
      <td><center><?php echo $dp['jenis_tagihan']; ?></center></td>
      <td><center><?php echo $dp['besar_tagihan']; ?></center></td>
      <td><?php echo $dp['cabang']; ?></td>
     <td width="100">
	        <div class="btn-group">
	          <a class="btn btn-warning" href="javascript:hapusData_2('<?php echo $dp['id'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
		</td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>