<script type="text/javascript">
$(document).ready(function(){
Cari_Data();
function Cari_Data(){
    var id_pertemuan = '<?php echo $this->uri->segment(4) ?>';
    var string = "id_pertemuan="+id_pertemuan;

    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/absensiCariData",
      data  : string,
      cache : false,
      success : function(data){
        $.each(JSON.parse(data), function () {
          $('#'+this.nis+'-'+this.masuk).prop("checked", true); 
         $('#'+this.nis+'-keterangan').val(this.keterangan);
        });
      }
    });
   } 
 $("#simpan").click(function(e){
     var a = $("#my-form").serialize();
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/kelas/absensiSimpan",
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
         window.location.assign("<?php echo site_url();?>/kelas/pertemuan/<?php echo $this->uri->segment(3); ?>")
      }
    });
    e.preventDefault();
  });
    $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/kelas/pertemuan/<?php echo $this->uri->segment(3); ?>")
  });
});

</script>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo $judul;?></a>
		  <div class="nav-collapse">
			<ul class="nav">
              <li><a href="#"><i class="icon-refresh icon-white"></i> Refresh</a></li>
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
        <th>Masuk</th>
        <th>Absen</th>
        <th>Notes</th>
      </tr>
    </thead>
    <tbody>
      <form id="my-form" class="form-horizontal">
	<?php
    $tot=0;
		$no=$tot+1;
		foreach($data->result_array() as $dp){
	?>
        <td width="50"><center><?php echo $no; ?></center></td>
        <td><center><?php echo $dp['nis']; ?></center></td>
        <td><center><?php echo $dp['nama']; ?></center></td>
        <td><center><input type="radio" class="input" id="<?php echo $dp['nis']; ?>-0" name="absen[<?php echo $dp['nis'];?>][masuk]" value=0></center></td>
        <td><center><input type="radio" class="input" id="<?php echo $dp['nis']; ?>-1" name="absen[<?php echo $dp['nis'];?>][masuk]" value=1></center></td>
        <td><center><input type="text" class="input" id="<?php echo $dp['nis']; ?>-keterangan" name="absen[<?php echo $dp['nis'];?>][keterangan]" ></center></td>
        <input type="hidden" class="input" id="<?php echo $dp['nis']; ?>-nis" name="absen[<?php echo $dp['nis'];?>][nis]" value="<?php echo $dp['nis']; ?>">
        <input type="hidden" class="input" id="<?php echo $dp['nis']; ?>-id_pertemuan" name="absen[<?php echo $dp['nis'];?>][id_pertemuan]" value="<?php echo $this->uri->segment(4); ?>">
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
        <button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
      <!--
      <button type="button" name="cetak" id="cetak" class="ui-button-success"><i class="icon-print icon-white"></i> Cetak</button>
    -->
    <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>

</table>
</section>