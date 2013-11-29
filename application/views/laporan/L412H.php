<script type="text/javascript">
$(document).ready(function(){
	$('#cari_tgl').datepicker({
        inline: true
    });
});
function hapusData(ID){
  var id  = ID;
  var pilih = confirm('Yakin akan menghapus data ini  = '+id+ '?');
  if (pilih==true) {
    $.ajax({
      type  : "POST",
      url   : "<?php echo site_url(); ?>/bap/hapus",
      data  : "id="+id,
      success : function(data){     
        window.location.assign("<?php echo site_url();?>/bap")
      }
    });
  }
  
}
</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
		  </div>
		<div class="span6 pull-right">
        <form id="my-form" class="navbar-form pull-right" method="post" action="<?php echo base_url();?>index.php/surat_tugas/cari">
            Bulan : <select name="bulan" id="bulan" class="span2">
            <?php
			for($i=1;$i<=12;$i++){
				$bln = $this->app_model->getBulan($i);
			?>
            <option value="<?php echo $i;?>"><?php echo $bln;?></option>
            <?php
			}
			?>
            </select>
             Tahun : <select name="bulan" id="bulan" class="span1">
            <?php
			$th_aw = date('Y')-4;
			$th_ah = date('Y');
			for($i=$th_aw;$i<=$th_ah;$i++){
			?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php
			}
			?>
            </select>
            
		  <button type="submit" id="btn_cari" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari</button>

		</form>
		</div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->  
<section>
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th rowspan="2">JUMLAH KEJADIAN</th>
        <th colspan="9">GOLONGAN SIM KORBAN LAKA LANTAS</th>
        <th rowspan="2">KETERANGAN</th>
      </tr>
      <tr>
      	<th>A</th>
        <th>A.UMUM</th>
        <th>B.I</th>
        <th>B.I UMUM</th>
        <th>B.II</th>
        <th>B.II UMUM</th>
        <th>C</th>
        <th>D</th>
        <th>TANPA SIM</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    	<td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center>0</center></td>
        <td><center></center></td>
	</tr>
    </tbody>
  </table>
</section>