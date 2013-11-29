<script type="text/javascript">
$(document).ready(function(){
	$("#No_LP").focus();
	Cari_Data();
	
	bentuk_laka();
	input_bentuk_laka();
	
	pelaku();
	input_pelaku();
	
	data_kendaraan();
	input_data_kendaraan();
	
	data_pengemudi();
	input_data_pengemudi();
	
	data_korban();
	input_data_korban();
	
	data_saksi();
	input_data_saksi();
	
	$('#input_bentuk_laka').dialog({
		autoOpen: false,
		width: 1200,
		modal: true,
    	buttons: {
        	"Tutup": function () {
				bentuk_laka();
            	$(this).dialog("close");
        	}
    	}
	});
	$('#input_pelaku').dialog({
		autoOpen: false,
		width: 600,
		modal: true,
    	buttons: {
        	"Tutup": function () {
				pelaku();
            	$(this).dialog("close");
        	}
    	}
	});
	$('#input_data_kendaraan').dialog({
		autoOpen: false,
		width: 1200,
		modal: true,
    	buttons: {
        	"Tutup": function () {
				data_kendaraan();
            	$(this).dialog("close");
        	}
    	}
	});
	$('#input_data_pengemudi').dialog({
		autoOpen: false,
		width: 700,
		modal: true,
    	buttons: {
        	"Tutup": function () {
				data_pengemudi();
            	$(this).dialog("close");
        	}
    	}
	});
	$('#input_data_korban').dialog({
		autoOpen: false,
		width: 1200,
		modal: true,
    	buttons: {
        	"Tutup": function () {
				data_korban();
            	$(this).dialog("close");
        	}
    	}
	});
	$('#input_data_saksi').dialog({
		autoOpen: false,
		width: 600,
		modal: true,
    	buttons: {
        	"Tutup": function () {
				data_saksi();
            	$(this).dialog("close");
        	}
    	}
	});
	$('#add_bentuk_laka').click(function () {
		$('#input_bentuk_laka').dialog('open');
		return false;
	});
	$('#add_pelaku').click(function () {
		$(".input2").val('');
		$('#input_pelaku').dialog('open');
		return false;
	});
	$('#add_data_kendaraan').click(function () {
		$('#input_data_kendaraan').dialog('open');
		//alert('Teeeesss');
		return false;
	});
	$('#add_data_pengemudi').click(function () {
		$('#input_data_pengemudi').dialog('open');
		return false;
	});
	$('#add_data_korban').click(function () {
		$('#input_data_korban').dialog('open');
		return false;
	});
	$('#add_data_saksi').click(function () {
		$('#input_data_saksi').dialog('open');
		return false;
	});
	
	$('#Waktu_Dilaporkan').datetimepicker({
        inline: true,
		option: "sildeDown"
    });
	$('#Waktu_Diterima').datetimepicker({
        inline: true,
		option: "sildeDown"
    });
  $('#Waktu_Kejadian').datetimepicker({
        inline: true,
        option: "sildeDown"
    });
	
  function Cari_Data(){
    var id = $("#No_LP").val();
    var string = "id="+id;

    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/ref_json/Cari_Data",
      data  : string,
      cache : false,
      dataType : "json",
      success : function(data){
        $("#ID_Petugas").val(data.ID_Petugas);
        $("#Waktu_Kejadian").val(data.Waktu_Kejadian);
        $("#Waktu_Dilaporkan").val(data.Waktu_Dilaporkan);
        //$("#Waktu_Diterima").val(data.Waktu_Diterima);
        $("#Alamat_Kejadian").val(data.Alamat_Kejadian);
        $("#Keadaan_Pengemudi").val(data.Keadaan_Pengemudi);
        $("#Keadaan_Cuaca").val(data.Keadaan_Cuaca);
        $("#Posisi").val(data.Posisi);
        $("#Kerusakan_Benda").val(data.Kerusakan_Benda);
        $("#Kerugian_Materi").val(data.Kerugian_Materi);
        $("#Ket_Singkat").val(data.Ket_Singkat);
        $("#Kesimpulan").val(data.Kesimpulan);
        $("#BB").val(data.BB);
        $("#Orang_Ditahan").val(data.Orang_Ditahan);
      }
    });
    //return false();
  }
	$("#simpan").click(function(){
		var No_LP	= $("#No_LP").val();
    var waktu = $("#Waktu_Kejadian").val();
    var waktu_lap = $("#Waktu_Dilaporkan").val();
		
		var string = $("#my-form").serialize();
			
		if(No_LP.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Nomor Laporan tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#No_LP").focus();
			return false();
		}
    if(waktu.length==0){
      $('.bottom-right').notify({
            message: {text:'Maaf, Waktu Kejadian Laporan tidak boleh kosong'},type:'danger'
      }).show();
      $("#Waktu_Kejadian").focus();
      return false();
    }
		if(waktu<waktu_lap){
     $('.bottom-right').notify({
            message: {text:'Maaf, Waktu Laporan tidak lebih cepat dari kajadian'},type:'danger'
      }).show();
      $("#Waktu_Kejadian").focus();
      return false(); 
    }

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/bap/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$('.bottom-right').notify({
		  			message: {text:data},type:'danger'
	 			}).show();
			}
		});
		return false();
	});
	
	$("#cetak").click(function(){
		var No		= $("#No_LP").val();
		//alert('tes');					   
		if(No.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, Nomor tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#No_LP").focus();
			return false();
		}
		window.open('<?php echo site_url();?>/bap/cetak/'+No);	
	});
	
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
	function input_bentuk_laka() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/bentuk_laka/tambah",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#input_bentuk_laka").html(data);
		  }
		});
	}
	
	function pelaku() {
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
	function input_pelaku() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/pelaku/tambah",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#input_pelaku").html(data);
		  }
		});
	}
	
	function data_kendaraan() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/data_kendaraan",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#data_kendaraan").html(data);
		  }
		});
	}
	function input_data_kendaraan() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/data_kendaraan/tambah",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#input_data_kendaraan").html(data);
		  }
		});
	}
	
	function data_pengemudi() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/pengemudi",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#data_pengemudi").html(data);
		  }
		});
	}
	function input_data_pengemudi() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/pengemudi/tambah",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#input_data_pengemudi").html(data);
		  }
		});
	}
	
	function data_korban() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/korban",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#data_korban").html(data);
		  }
		});
	}
	
	function input_data_korban() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/korban/tambah",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#input_data_korban").html(data);
		  }
		});
	}
	
	function data_saksi() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/saksi",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#data_saksi").html(data);
		  }
		});
	}
	function input_data_saksi() {
		var No_LP = $("#No_LP").val();
		$.ajax({
		  type  : 'POST',
		  url   : "<?php echo site_url(); ?>/saksi/tambah",
		  data  : "id="+No_LP,
		  cache : false,
		  success : function(data){
			$("#input_data_saksi").html(data);
		  }
		});
	}
	
  $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/bap")
  });
});
</script>
  <div class="navbar navbar-primary">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#"><?php echo $judul;?></a>
        <div class="span3 pull-right" style="padding:5px;">
		  
          </div>
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->
<form id="my-form" class="form-horizontal">
<table width="100%">
<tr>
<td width="50%" valign="top">
  <div class="control-group">
    <label class="control-label" for="nomor">No.LP</label>
    <div class="controls">
      <input type="text" class="span3 input" name="No_LP" id="No_LP" value="<?php echo $No_LP;?>" <?php echo $readonly;?>>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tgl">Waktu Dilaporkan</label>
    <div class="controls">
      <input type="text" class="span2" name="Waktu_Dilaporkan" id="Waktu_Dilaporkan" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="nip">Waktu Kejadian</label>
    <div class="controls">
      <input type="text" class="span2 input" name="Waktu_Kejadian" id="Waktu_Kejadian">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Alamat Kejadian</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Alamat_Kejadian" id="Alamat_Kejadian" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Keadaan Pengemudi</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Keadaan_Pengemudi" id="Keadaan_Pengemudi" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Keadaan Cuaca</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Keadaan_Cuaca" id="Keadaan_Cuaca" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Posisi</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Posisi" id="Posisi" >
    </div>
  </div>
</td>
<td width="50%" valign="top">  
  <div class="control-group">
    <label class="control-label" for="nama">Kerusakan Benda</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Kerusakan_Benda" id="Kerusakan_Benda" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Kerugian Materi</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Kerugian_Materi" id="Kerugian_Materi" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Keterangan Singkat</label>
    <div class="controls">
      <input type="text" class="span4 input" name="Ket_Singkat" id="Ket_Singkat" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kesimpulan">Kesimpulan</label>
    <div class="controls">
    	<textarea name="Kesimpulan" id="Kesimpulan" class="span4 input" rows="3"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Barang Bukti</label>
    <div class="controls">
      <input type="text" class="span4 input" name="BB" id="BB" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="nama">Orang Ditahan</label>
    <div class="controls">
      <select name="Orang_Ditahan" id="Orang_Ditahan" class="span2">
      <option value="Ada">Ada</option>
      <option value="Tidak Ada">Tidak Ada</option>
      </select>
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2" align="center">
    <button type="button" name="simpan" id="simpan" class="ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
    	<!--
      <button type="button" name="cetak" id="cetak" class="ui-button-success"><i class="icon-print icon-white"></i> Cetak</button>
      -->
      <button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
  </td>
</tr>      
</table>  
</form>
<ul class="nav nav-tabs">
  <li><a href="#A" data-toggle="tab">Bentuk Laka</a></li>
  <li class="active"><a href="#B" data-toggle="tab">Pelaku</a></li>
  <li><a href="#C" data-toggle="tab">Data Kendaraan</a></li>
  <li><a href="#D" data-toggle="tab">Data Pengemudi</a></li>
  <li><a href="#E" data-toggle="tab">Data Korban</a></li>
  <li><a href="#F" data-toggle="tab">Data Saksi</a></li>
</ul>
<div class="tabbable">
  <div class="tab-content">
    <div class="tab-pane " id="A">
    	<button type="button" name="add_bentuk_laka" id="add_bentuk_laka" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="bentuk_laka"></div>
      <div id="input_bentuk_laka" title="Bentuk Kecelakaan">
      </div>
    </div>
    <div class="tab-pane active" id="B">
      <button type="button" name="add_pelaku" id="add_pelaku" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="pelaku"></div>
      <div id="input_pelaku" title="Data Pelaku"></div>
    </div>
    <div class="tab-pane" id="C">
    <button type="button" name="add_data_kendaraan" id="add_data_kendaraan" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="data_kendaraan"></div>
      <div id="input_data_kendaraan" title="Data Kendaraan"></div>
    </div>
    <div class="tab-pane" id="D">
    	<button type="button" name="add_data_pengemudi" id="add_data_pengemudi" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="data_pengemudi"></div>
      <div id="input_data_pengemudi" title="Data Pengemudi"></div>
    </div>
    <div class="tab-pane" id="E">
    <button type="button" name="add_data_korban" id="add_data_korban" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="data_korban"></div>
      <div id="input_data_korban" title="Data Korban"></div>
    </div>
    <div class="tab-pane" id="F">
    <button type="button" name="add_data_saksi" id="add_data_saksi" class="ui-button-primary"><i class="icon-plus-sign icon-white"></i> Tambah</button>
      <div id="data_saksi"></div>
      <div id="input_data_saksi" title="Data Saksi"></div>
    </div>
  </div>
</div> <!-- /tabbable -->  