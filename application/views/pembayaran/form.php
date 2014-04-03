<script type="text/javascript">
$(document).ready(function(){
  $('#jumlah_bayar_1').priceFormat({
    prefix: 'Rp. ',
    thousandsSeparator: '.',
    centsLimit: 0,
  });
  $('#tanggal').datepicker({
        inline: true,
    option: "sildeDown",
    changeMonth : true,
    changeYear : true,
    });
$('#listTagihan').dialog({
    autoOpen: false,
    width: 600,
    modal: true,
      buttons: {
          "Tutup": function () {
              $(this).dialog("close");
          }
      }
  });

	$("#simpan_pembayaran").click(function(){
    var j = $('#listPembayaran tr').size();
    for (var i = 1; i <= j; i++) {
      $('#jumlah_bayar_'+i).val($('#jumlah_bayar_'+i).unmask());
    };
		var a = $("#form_bayar").serialize();
		var string = a;
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/pembayaran/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$('.bottom-right').notify({
		  			message: {text:data},type:'danger'
	 			}).show();
        window.location.assign("<?php echo site_url();?>/siswa/detail/<?php echo $this->uri->segment(3) ?>")
        // console.log(data);
			},
      error: function(ts) { console.log(ts.responseText) }
		});
		return false;
	});
  $("#tutup").click(function(){
      window.location.assign("<?php echo site_url();?>/siswa/detail/<?php echo $this->uri->segment(3); ?>")
  });

  function cari_data(id) {
    var id = id;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/tagihan/cari_jenis_tagihan",
      data  : "id="+id,
      cache : false,
      dataType : "json",
      success : function(data){
      $("#besar_tagihan").val(data.besar_tagihan);
      }
    });
  }
});
</script>  
<script type="text/javascript">
$(function() {
        var i = $('#listPembayaran tr').size() + 1;
        
        $('#tambah_baris').click(function() {
                $('<tr id="baris_'+i+'"><td><input type="text" class="input" id="tagihan_'+i+'" name="item['+i+'][id_tagihan]" readonly><button type="button" class="btn ui-button-success" onclick="listTagihan('+i+');"><i class="icon-ok-circle icon-white"></i> List Tagihan</button> </td><td><input type="text" class="input" id="jumlah_bayar_'+i+'" name="item['+i+'][jumlah_bayar]"></td><td><input type="text" class="input" name="item['+i+'][notes]"></td><td><button type="button" class="ui-button-error ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="removeRow('+i+');"><i class="icon-off icon-white"></i> Hapus Baris</button></td></tr>').appendTo('tbody');
                 $('#jumlah_bayar_'+i).priceFormat({
                    prefix: 'Rp. ',
                    thousandsSeparator: '.',
                    centsLimit: 0,
                  });
                i++;
                return false;
        });
});
 function removeRow(rnum) {
          jQuery('#baris_'+rnum).remove();
}
function listTagihan(i) {
    var nis = "<?php echo $this->uri->segment(3); ?>";
    var no = i;
    $.ajax({
      type  : 'POST',
      url   : "<?php echo site_url(); ?>/tagihan/getTunggakan",
      data  : "nis="+nis+"&no="+no,
      cache : false,
      success : function(data){
      $('#listTagihan').dialog('open');
      $("#listTagihan").html(data);
      }
    });
  }

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
<form id="form_bayar" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="nis">NIS</label>
    <div class="controls">
      <input type="text" class="span3" name="nis" id="nis" value="<?php echo $nis;?>" readonly="readonly">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="cabang">Cabang</label>
    <div class="controls">
      <input type="text" class="span3" name="cabang" id="cabang" value="<?php echo $cabang;?>" readonly="readonly">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tanggal">Tanggal</label>
    <div class="controls">
      <input type="text" class="span3 input2" name="tanggal" id="tanggal" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="keterangan">Keterangan</label>
    <div class="controls">
      <input type="text" class="span3 input2" name="keterangan" id="keterangan" >
    </div>
  </div>  
   <table class="table table-hover table-striped ">
    <thead>
      <tr>
        <th>Ket Tagihan</th>
        <th>Jumlah</th>
        <th>Notes</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="listPembayaran">
      <tr>
        <td><input type="text" class="input" id="tagihan_1" name="item[1][id_tagihan]" readonly> <button type="button" class="btn ui-button-success" onclick="listTagihan(1);"><i class="icon-ok-circle icon-white"></i> List Tagihan</button> </td>
        <td><input type="text" class="input" id="jumlah_bayar_1" name="item[1][jumlah_bayar]"></td>
        <td><input type="text" class="input" name="item[1][notes]"></td>
        <td><button type="button" name="tambah_baris" id="tambah_baris" class="btn ui-button-success"><i class="icon-ok-circle icon-white"></i> Tambah Baris</button></td>
      </tr>
    </tbody>
  </table>
   <div id="listTagihan"></div>
  
<center>
<button type="button" name="simpan_pembayaran" id="simpan_pembayaran" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
<button type="button" name="tutup" id="tutup" class="ui-button-error"><i class="icon-off icon-white"></i> Tutup</button>
</center>
</form>
