<script type="text/javascript">
$(document).ready(function(){

});

function editData_2(ID){
  var id  = ID;
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/pelaku/edit",
      data  : "id="+id,
	  dataType : "json",
      success : function(data){  
		
		$("#ID_Pelaku").val(data.ID_Pelaku);
		$("#Nama_Pelaku").val(data.Nama_Pelaku);
		$("#Alamat_Pelaku").val(data.Alamat_Pelaku);
		$("#T_Lahir_Pelaku").val(data.T_Lahir_Pelaku);
		$("#Tgl_Lahir_Pelaku").val(data.Tgl_Lahir_Pelaku);
		$("#JK_Pelaku").val(data.JK_Pelaku);
		$("#Pendidikan_Pelaku").val(data.Pendidikan_Pelaku);
		$("#Pekerjaan_Pelaku").val(data.Pekerjaan_Pelaku);
		
		$('#input_pelaku').dialog('open');
		return false;
      }
    });
  
}

function hapusData_2(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/pelaku/hapus",
      data  : "id="+id,
      success : function(data){     
        bentuk_laka();
		$('.bottom-right').notify({
				message: {text:'Success, Data berhasil dihapus'},type:'danger'
		}).show();
      }
    });
  }
}

function bentuk_laka() {
	var No_LP = $("#No_LP").val();
	$.ajax({
	  type  : 'POST',
	  url   : "<?php echo site_url(); ?>/pelaku",
	  data  : "id="+No_LP,
	  cache : false,
	  success : function(data){
		$("#pelaku").html(data);
	  }
	});
}
</script>
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama Pelaku</th>
      <th>TTL</th>
      <th>Jenis Kelamin</th>
      <th>Alamat Pelaku</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data->result_array() as $dp){
          $tgl = $this->app_model->tgl_indo($dp['Tgl_Lahir_Pelaku']);
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['Nama_Pelaku']; ?></center></td>
      <td><center><?php echo $tgl; ?></center></td>
      <td><center><?php echo $dp['JK_Pelaku']; ?></center></td>
      <td><?php echo $dp['Alamat_Pelaku']; ?></td>
     <td width="100">
	        <div class="btn-group">
              <a class="btn btn-success" href="javascript:editData_2('<?php echo $dp['ID_Pelaku'] ?>')"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData_2('<?php echo $dp['ID_Pelaku'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
		</td>
    </tr>
   <?php
          $no++;
      }
   ?>
  </tbody>
</table>