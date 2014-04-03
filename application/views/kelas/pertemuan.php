<script type="text/javascript">
$(document).ready(function(){
function hapusData(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/kelas/hapusPertemuan",
      data  : "id="+id,
      success : function(data){     
        window.location.assign("<?php echo site_url();?>/kelas/pertemuan")
      }
    });
  }
}
 $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/kelas/detail/<?php echo $this->uri->segment(3); ?>")
  });
})
</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
            <li><a href="<?php echo base_url(); ?>index.php/kelas/tambahPertemuan/<?php echo $this->uri->segment(3); ?>"><i class="icon-plus-sign icon-white"></i> Tambah Data</a></li>
              <li><a href="<?php echo base_url();?>index.php/kelas/pertemuan"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->  
<section>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Kelas</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
    $tot=0;
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['kode_kelas']; ?></center></td>
        <td><center><?php echo $dp['tanggal']; ?></center></td>
        <td width="100">
	        <div class="btn-group">
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/kelas/absensi/<?php echo $this->uri->segment(3); ?>/<?php echo $dp['id']; ?>"><i class="icon-ok icon-white"></i> Absensi</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/kelas/editPertemuan/<?php echo $this->uri->segment(3); ?>/<?php echo $dp['id']; ?>"><i class="icon-edit icon-white"></i> Edit</a>
	          <a class="btn btn-warning" href="javascript:hapusData('<?php echo $dp['id'] ?>')"><i class="icon-trash icon-white"></i> Hapus</a>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
    </tbody>
  </table>
  <table width="100%">
    <tr>
      <td colspan="2" align="center">
    <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>

</table>
</section>