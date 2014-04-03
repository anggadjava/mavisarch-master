
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th>No.</th>
      <th>NIS</th>
      <th>ID Tagihan</th>
      <th>Jenis</th>
      <th>Besar</th>
      <th>Potongan</th>
      <th>Jumlah Bayar</th>
      <th>Kurang Bayar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data->result_array() as $dp){
        $cek = $dp['totbay']-$dp['besar_tagihan']-$dp['potongan'];
  ?>
  <?php if ($dp['totbay']-$dp['besar_tagihan']-$dp['potongan'] <0 ){ ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['nis']; ?></center></td>
      <td><center><?php echo $dp['id']; ?></center></td>
      <td><center><?php echo $dp['jenis_tagihan']; ?></center></td>
      <td><center><?php echo $dp['besar_tagihan']; ?></center></td>
      <td><center><?php echo $dp['potongan']; ?></center></td>
      <td><center><?php echo $dp['besar_tagihan']-$dp['potongan']; ?></center></td>
      <td><center><?php echo $dp['kurang_bayar']; ?></center></td>
     <td width="100">
	        <div class="btn-group">
	          <a class="btn btn-success" href="javascript:bayar('<?php echo $dp['id'] ?>')"><i class="icon-money icon-white"></i> Bayar</a>
            <script type="text/javascript">
            function bayar(ID){
              var id  = ID;
              $("#tagihan_"+<?php echo $no_item; ?>).val(id);
              $('#listTagihan').dialog('close');
            }
            </script>
	        </div><!-- /btn-group -->
		</td>
    </tr>

   <?php
          $no++;
        }
      }
   ?>
  </tbody>
</table>