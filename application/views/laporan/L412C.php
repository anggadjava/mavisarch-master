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
        <th colspan="10">PROFESI PELAKU LAKA</th>
        <th rowspan="2">Jumlah Laka</th>
        <th rowspan="2">Keterangan</th>
      </tr>
      <tr>
      	<?php 
		$a=1;
		foreach($profesi->result() as $t){
			$a = $this->ref_model->pelaku_profesi($t->pekerjaan);
		?>
        <th><?php echo $t->pekerjaan;?></th>
        <?php 
		$a++;
		} ?>
      </tr>
    </thead>
    <tbody>
    <tr>
		<?php 
		$x=0;
		foreach($profesi->result() as $t){
			$a = $this->ref_model->pelaku_profesi($t->pekerjaan);
		?>
        <td><center><?php echo $a;?></center></td>
        <?php 
		$x=$x+ $a;
		} ?>
		<td><center><?php echo $x;?></center></td>
        <td><center></center></td>
        <!--
    	<td><center>o0</center></td>
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
        -->
	</tr>
    </tbody>
  </table>
</section>