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
        <th rowspan="2">JUMLAH LAKA</th>
        <th colspan="3">KORBAN</th>
        <th rowspan="2">KERUGIAN MATERIAL</th>
        <th rowspan="2">KETERANGAN</th>
      </tr>
      <tr>
        <th>MD</th>
        <th>LB</th>
        <th>LR</th>
      </tr>
    </thead>
    <tbody>
    <tr>
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