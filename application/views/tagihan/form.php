<script type="text/javascript">
$(document).ready(function(){
  $("#besar_tagihan").numeric();
  $("#potongan").numeric();
	$("#simpan_tagihan").click(function(){
		var nis	= $("#nis").val();
		var a = $("#form_tagihan").serialize();
		var string = a;
			
		if(nis.length==0){
			$('.bottom-right').notify({
		  			message: {text:'Maaf, NIS tidak boleh kosong'},type:'danger'
	 		}).show();
			$("#nis").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/tagihan/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$('.bottom-right').notify({
		  			message: {text:data},type:'danger'
	 			}).show();
        location.reload();
			}
		});
		return false;
	});
  $(".chosen-select").chosen({width: "50%"}); 
  $("#jenis_tagihan").change(function() {
    id=$("#jenis_tagihan").val();
    cari_data(id);
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
<form id="form_tagihan" class="form-horizontal">
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
    <label class="control-label" for="jenis_tagihan">Jenis tagihan</label>
    <div class="controls">
      <select name="jenis_tagihan" id="jenis_tagihan" class="span2 input chosen-select">
        <option value="">-Pilih-</option>
      <?php 
    $data = $jenis_tagihan;
    foreach($data->result_array() as $t){
     ?>
         <option value="<?php echo $t["nama_tagihan"];?>"><?php echo $t["nama_tagihan"];?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="besar_tagihan">Besar Tagihan</label>
    <div class="controls">
      <input type="text" class="span3 input2" name="besar_tagihan" id="besar_tagihan" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="potongan">Potongan</label>
    <div class="controls">
      <input type="text" class="span3 input2" name="potongan" id="potongan" >
    </div>
  </div>  
  <div class="control-group">
    <label class="control-label" for="notes">Notes</label>
    <div class="controls">
      <textarea class="span3 input2" name="notes" id="notes" />
    </div>  
  </div>  
<center>
<button type="button" name="simpan_tagihan" id="simpan_tagihan" class="btn ui-button-primary"><i class="icon-ok-circle icon-white"></i> Simpan</button>
</center>
</form>
