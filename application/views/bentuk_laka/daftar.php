<script type="text/javascript">
$(document).ready(function(){
	$('#cari_tgl').datepicker({
        inline: true
    });
});
function editData_1(ID){
  var id  = ID;
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/bentuk_laka/edit",
      data  : "id="+id,
	  dataType : "json",
      success : function(data){     
        //bentuk_laka();
		$("#Kd_Bentuk_Laka").val(id);
		$("#Nama_Bentuk_Laka").val(data.Nama_Bentuk_Laka);
		$("#Golongan_Kecelakaan").val(data.Golongan_Kecelakaan);
		$("#Keadaan_Lantas").val(data.Keadaan_Lantas);
		$("#Kondisi_Jalan").val(data.Kondisi_Jalan);
		$("#Kondisi_Permukaan_Jalan").val(data.Kondisi_Permukaan_Jalan);
		$("#Situasi_Jalan").val(data.Situasi_Jalan);
		$("#Perbaikan_Jalan").val(data.Perbaikan_Jalan);
		$("#Bentuk_Simpangan").val(data.Bentuk_Simpangan);
		$("#Arus_Lalulintas").val(data.Arus_Lalulintas);
		$("#Batas_Kecepatan").val(data.Batas_Kecepatan);
		$("#Lingkungan_Sekitar").val(data.Lingkungan_Sekitar);
		$("#Fungsi_Jalan").val(data.Fungsi_Jalan);
		$("#Berdasarkan_Jalur").val(data.Berdasarkan_Jalur);
		$("#Lokasi_Laka").val(data.Lokasi_Laka);
		$("#Penyebab_Laka").val(data.Penyebab_Laka);
		$("#Laka_Fungsi_Jalan").val(data.Laka_Fungsi_Jalan);
		$("#Kawasan_Laka").val(data.Kawasan_Laka);
		
		
		$('#input_bentuk_laka').dialog('open');
		return false;
      }
    });
  
}
function hapusData_1(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/bentuk_laka/hapus",
      data  : "id="+id,
      success : function(data){     
        bentuk_laka();
      }
    });
  }
}
function bentuk_laka() {
	var No_LP = $("#No_LP").val();
	$.ajax({
	  type  : 'POST',
	  url   : "<?php echo site_url(); ?>/bentuk_laka",
	  data  : "id="+No_LP,
	  cache : false,
	  success : function(data){
		$("#bentuk_laka").html(data);
	  }
	});
}
</script>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Golongan</th>
        <th>Keadaan Lantas</th>
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
        <td><center><?php echo $dp['Kd_Bentuk_Laka']; ?></center></td>
        <td><?php echo $dp['Nama_Bentuk_Laka']; ?></td>
        <td><?php echo $dp['Golongan_Kecelakaan']; ?></td>
        <td><?php echo $dp['Keadaan_Lantas']; ?></td>
        <td width="100">
	        <div class="btn-group">
              <a class="btn btn-success" href="javascript:editData_1('<?php echo $dp['Kd_Bentuk_Laka'] ?>')"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData_1('<?php echo $dp['Kd_Bentuk_Laka'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
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