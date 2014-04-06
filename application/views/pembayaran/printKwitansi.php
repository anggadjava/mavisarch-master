 <link href="<?php echo base_url(); ?>asset/assets/css/bootstrap.min.css" rel="stylesheet" media="print">
 <script type="text/javascript">

$(document).ready(function(){
  $('.doPrint').click(function() {
    var container = $(this).attr('rel');
    $('#' + container).printArea();
    return false;
  });
  $('.price').priceFormat({
    prefix: 'Rp. ',
    thousandsSeparator: '.',
    centsLimit: 0,
  });
});
</script>
<a class="btn btn-success doPrint"  rel="doPrint"><i class="icon-print icon-white"></i> Print</a>
<div id="doPrint" style="">
<h2>Kwitansi</h2>
<table>
<tr>
  <td>ID Kwitansi</td>
  <td>:</td>
  <td><?php echo $data_kwitansi['id'] ?></td>
</tr>
<tr>
  <td>Nama Siswa</td>
  <td>:</td>
  <td><?php echo $data_kwitansi['nama'] ?></td>
</tr>
<tr>
  <td>Cabang</td>
  <td>:</td>
  <td><?php echo $data_kwitansi['nama_cabang'] ?></td>
</tr>
<tr>
  <td>Tanggal</td>
  <td>:</td>
  <td><?php echo $this->app_model->tgl_str($data_kwitansi['tanggal']) ?></td>
</tr>
</table>
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th>No.</th>
      <th>Jenis Pembayaran</th>
      <th>Keterangan</th>
      <th>Harga</th>
      <th>Potongan</th>
      <th>Dibayar</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($data_item as $dp){
  ?>
    <tr>
      <td width="50"><center><?php echo $no; ?></center></td>
      <td><center><?php echo $dp['jenis_tagihan']; ?></center></td>
      <td><center><?php echo $dp['notes']; ?></center></td>
      <td style="text-align:right;" class="price"><?php echo intval($dp['besar_tagihan']); ?></td>
      <td style="text-align:right;" class="price"><?php echo intval($dp['potongan']); ?></td>
      <td style="text-align:right;" class="price"><?php echo intval($dp['jumlah_bayar']); ?></td>
    </tr>
   <?php
          $no++;
      }
   ?>
   <tr>
      <td colspan=5 style="text-align:center;"><strong>Jumlah</strong></center></td>
      <td style="text-align:right;" class="price"><?php echo intval($data_kwitansi['total_bayar']); ?></td>
    </tr>
  </tbody>
</table>
</div>