<script type="text/javascript">
$(document).ready(function(){
Cari_Data();
function Cari_Data(){
    var kode_kelas = '<?php echo $this->uri->segment(3) ?>';
    var string = "kode_kelas="+kode_kelas;

    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/penilaianCariData",
      data  : string,
      cache : false,
      success : function(data){
        $.each(JSON.parse(data), function () {
         $('#'+this.nis+'-gram').val(this.gram);
         $('#'+this.nis+'-read').val(this.read);
         $('#'+this.nis+'-comp').val(this.comp);
         $('#'+this.nis+'-list').val(this.list);
         $('#'+this.nis+'-spk').val(this.spk);
         $('#'+this.nis+'-avp').val(this.avp);
         $('#'+this.nis+'-conv').val(this.conv);
         $('#'+this.nis+'-sunmeet').val(this.sunmeet);
         $('#'+this.nis+'-enrich').val(this.enrich);
         $('#'+this.nis+'-hw').val(this.hw);
         $('#'+this.nis+'-mid').val(this.mid);
         $('#'+this.nis+'-absen').val(this.absen);
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
      url   : "<?php echo site_url(); ?>/kelas/penilaianSimpan",
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
  <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Gram</th>
        <th>Read</th>
        <th>Comp</th>
        <th>List</th>
        <th>Spk</th>
        <th>Avp</th>
        <th>Conv</th>
        <th>Sunmeet</th>
        <th>Enrich</th>
        <th>Hw</th>
        <th>Mid</th>
        <th>Absen</th>
        
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
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-gram" name="nilai[<?php echo $no?>][gram]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-read" name="nilai[<?php echo $no?>][read]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-comp" name="nilai[<?php echo $no?>][comp]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-list" name="nilai[<?php echo $no?>][list]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-spk" name="nilai[<?php echo $no?>][spk]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-avp" name="nilai[<?php echo $no?>][avp]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-conv" name="nilai[<?php echo $no?>][conv]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-sunmeet" name="nilai[<?php echo $no?>][sunmeet]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-enrich" name="nilai[<?php echo $no?>][enrich]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-hw" name="nilai[<?php echo $no?>][hw]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-mid" name="nilai[<?php echo $no?>][mid]" style="width:30px;"></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nomor_induk']; ?>-absen" name="nilai[<?php echo $no?>][absen]" style="width:30px;"></center></td>
        <input type="hidden" class="input" id="<?php echo $dp['nomor_induk']; ?>-nis" name="nilai[<?php echo $no?>][nis]" value="<?php echo $dp['nomor_induk'] ; ?>" style="width:30px;">
        <input type="hidden" class="input" id="<?php echo $dp['nomor_induk']; ?>-kode_kelas" name="nilai[<?php echo $no?>][kode_kelas]" value="<?php echo $this->uri->segment(3); ?>" style="width:30px;">
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
  </form>
    <tr>
  <td colspan="16" style="text-align:center;">
    <button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
      <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>
</tr>
    </tbody>
  </table>
  <div class="pagination pagination-centered">
      <ul>
      <?php
      echo $paginator;
      ?>
      </ul>
  </div>
</section>