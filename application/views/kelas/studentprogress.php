<script type="text/javascript">
$(document).ready(function(){
Cari_Data();
$( "#tabs" ).tabs();
function Cari_Data(){
    var kode_kelas = '<?php echo $this->uri->segment(3) ?>';
    var string = "kode_kelas="+kode_kelas;

    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/studentProgressCariData",
      data  : string,
      cache : false,
      success : function(data){
        $.each(JSON.parse(data), function () {
         $('#'+this.nis+'-spHw_1').val(this.spHw_1);
         $('#'+this.nis+'-spHw_2').val(this.spHw_2);
         $('#'+this.nis+'-spHw_3').val(this.spHw_3);
         $('#'+this.nis+'-spHw_4').val(this.spHw_4);
         $('#'+this.nis+'-spHw_5').val(this.spHw_5);
         $('#'+this.nis+'-spHw_6').val(this.spHw_6);
         $('#'+this.nis+'-spMid').val(this.spMid);
         $('#'+this.nis+'-spSpk_1').val(this.spSpk_1);
         $('#'+this.nis+'-spSpk_2').val(this.spSpk_2);
         $('#'+this.nis+'-spSpk_3').val(this.spSpk_3);
         $('#'+this.nis+'-spSpk_4').val(this.spSpk_4);
         $('#'+this.nis+'-spSpk_5').val(this.spSpk_5);
         $('#'+this.nis+'-spSpk_6').val(this.spSpk_6);
         $('#'+this.nis+'-spSpk_7').val(this.spSpk_7);
         $('#'+this.nis+'-spSpk_8').val(this.spSpk_8);
         $('#'+this.nis+'-spSpk_9').val(this.spSpk_9);
         $('#'+this.nis+'-spSpk_10').val(this.spSpk_10);
         $('#'+this.nis+'-spSpk_11').val(this.spSpk_11);
         $('#'+this.nis+'-spSpk_12').val(this.spSpk_12);
         $('#'+this.nis+'-spEnrich_1').val(this.spEnrich_1);
         $('#'+this.nis+'-spEnrich_2').val(this.spEnrich_2);
         $('#'+this.nis+'-spEnrich_3').val(this.spEnrich_3);
         $('#'+this.nis+'-spEnrich_4').val(this.spEnrich_4);
         $('#'+this.nis+'-spSunmeet').val(this.spSunmeet);
         $('#'+this.nis+'-spAvp').val(this.spAvp);
         $('#'+this.nis+'-spEssay').val(this.spEssay);
         $('#'+this.nis+'-nis').val(this.nis);
         $('#'+this.nis+'-kode_kelas').val(this.kode_kelas);
        });
      }
    });
   } 
 $("#simpan").click(function(e){
     var a = $("#my-form").serialize();
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/studentProgressSimpan",
      data  : a,
      cache : false,
       statusCode: {
          500: function() {
            $('.bottom-right').notify({
               message: {text:'Kesalahan Database'},type:'danger'
            }).show();
          }
        },
      success : function(data){
        $('.bottom-right').notify({
            message: {text:data},type:'danger'
        }).show();
         window.location.assign("<?php echo site_url();?>/kelas/detail/<?php echo $this->uri->segment(3); ?>")
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/kelas/detail/<?php echo $this->uri->segment(3); ?>")
  });
});

</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
              <li><a href="<?php echo base_url();?>index.php/kelas"><i class="icon-refresh icon-white"></i> Refresh</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->  
<section>
  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">Intrakurikuler</a></li>
      <li><a href="#tabs-2">Cocuriculer</a></li>
    </ul>
    <div id="tabs-1">
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Homework 1</th>
        <th>Homework 2</th>
        <th>Homework 3</th>
        <th>Homework 4</th>
        <th>Homework 5</th>
        <th>Homework 6</th>
        <th>MID</th>
      </tr>
    </thead>
    <tbody>
      <form id="my-form" class="form-horizontal">
	<?php
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['nomor_induk']; ?></center></td>
        <td><center><?php echo $dp['nama']; ?></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spHw_1" name="nilai[<?php echo $no?>][spHw_1]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spHw_2" name="nilai[<?php echo $no?>][spHw_2]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spHw_3" name="nilai[<?php echo $no?>][spHw_3]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spHw_4" name="nilai[<?php echo $no?>][spHw_4]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spHw_5" name="nilai[<?php echo $no?>][spHw_5]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spHw_6" name="nilai[<?php echo $no?>][spHw_6]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spMid" name="nilai[<?php echo $no?>][spMid]" style="width:30px;"></center></td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
    </tbody>
  </table>
</div>  <!-- tabs 1 -->
<div id="tabs-2">
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th rowspan=2>No</th>
        <th rowspan=2>NIS</th>
        <th rowspan=2>Nama</th>
        <th colspan=12>Speaking</th>
        <th colspan=4>Enrich</th>
        <th rowspan=2>Sun Meet</th>
        <th rowspan=2>AVP</th>
        <th rowspan=2>Essay</th>
      </tr>
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
      </tr>
    </thead>
    <tbody>
  <?php
    $no=$tot+1;
    foreach($data->result_array() as $dp){
  ?>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['nomor_induk']; ?></center></td>
        <td><center><?php echo $dp['nama']; ?></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_1" name="nilai[<?php echo $no?>][spSpk_1]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_2" name="nilai[<?php echo $no?>][spSpk_2]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_3" name="nilai[<?php echo $no?>][spSpk_3]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_4" name="nilai[<?php echo $no?>][spSpk_4]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_5" name="nilai[<?php echo $no?>][spSpk_5]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_6" name="nilai[<?php echo $no?>][spSpk_6]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_7" name="nilai[<?php echo $no?>][spSpk_7]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_8" name="nilai[<?php echo $no?>][spSpk_8]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_9" name="nilai[<?php echo $no?>][spSpk_9]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_10" name="nilai[<?php echo $no?>][spSpk_10]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_11" name="nilai[<?php echo $no?>][spSpk_11]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSpk_12" name="nilai[<?php echo $no?>][spSpk_12]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spEnrich_1" name="nilai[<?php echo $no?>][spEnrich_1]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spEnrich_2" name="nilai[<?php echo $no?>][spEnrich_2]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spEnrich_3" name="nilai[<?php echo $no?>][spEnrich_3]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spEnrich_4" name="nilai[<?php echo $no?>][spEnrich_4]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spSunmeet" name="nilai[<?php echo $no?>][spSunmeet]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spAvp" name="nilai[<?php echo $no?>][spAvp]" style="width:20px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spEssay" name="nilai[<?php echo $no?>][spEssay]" style="width:20px;"></center></td>
        <input type="hidden" class="input" id="<?php echo $dp['nomor_induk']; ?>-nis" name="nilai[<?php echo $no?>][nis]" value="<?php echo $dp['nomor_induk'] ; ?>" style="width:20px;">
        <input type="hidden" class="input" id="<?php echo $dp['nomor_induk']; ?>-kode_kelas" name="nilai[<?php echo $no?>][kode_kelas]" value="<?php echo $this->uri->segment(3); ?>" style="width:20px;">
      </tr>
   <?php
      $no++;
    }
   ?>
  </form>
    </tbody>
  </table>
</div>  <!-- tabs 2 -->
</div><!-- tabs -->
<table width="100%">
    <tr>
      <td colspan="2" align="center">
        <button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
      <!--
      <button type="button" name="cetak" id="cetak" class="ui-button-success"><i class="icon-print icon-white"></i> Cetak</button>
    -->
    <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>

</table>
  <div class="pagination pagination-centered">
      <ul>
      <?php
      echo $paginator;
      ?>
      </ul>
  </div>
</section>