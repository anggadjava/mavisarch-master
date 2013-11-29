<style type="text/css">
*{
font-family: Arial;
font-size:12px;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:21.59cm ;
font-size: 12pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
border:1px solid #000;
padding:7px;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
padding-right:2mm;
border-bottom:0.2mm solid #000;
border:1px solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
h3{
font-size: 10pt;
}
.kop{
	font-size:12px;
	margin-bottom:5px;
	width:21.59cm ;
}
.kop h2{
	font-size:22px;
}
.header{
display: block;
width:21.59cm ;
margin-bottom: 0.3cm;
text-align: left;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:21.59cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:21.59cm ;
}
.page {
width:21cm ;
font-size:12px;
}

</style>
<?php
$sql = $this->db->query("SELECT * FROM t_kecelakaan WHERE substr(No_LP,4,2)='".$id."'");
foreach ($sql->result() as  $t) {
// $hari = date('d',$t->Waktu_Dilaporkan);
	$No_LP = $t->No_LP;
	$tgl = date($t->Waktu_Dilaporkan);
	$exp = explode("-",$tgl);
	$tanggal = $exp[2];
	$thn = $exp[0];
	$exp_tgl = explode(" ",$tanggal);
	$jam = $exp_tgl[1];
	$id_petugas = $t->ID_Petugas;
	$pangkat = $this->ref_model->cari_pangkat($id_petugas);
	$jabatan = $this->ref_model->cari_jabatan($id_petugas);
	$nama_petugas = $this->ref_model->cari_nama_petugas($id_petugas);
?>
<div class="page">
<div id="header" style="width:300px; text-align:center">
POLRI DAERAH BANTEN<br />
RESOR CILEGON<BR />
<u>Jl. Jendral Sudirman No.1 Cilegon 43421</u><br />
PRO JUSTITIA
</div>
<br />
<center><img src="<?php echo base_url();?>asset/images/polri.gif" width="65" height="65" /></center>
<center><h4><?php echo $judul;?></h4></center>
<center><h4>Nomor : <?php echo $t->No_LP;?></h4></center>
<p>Pada hari ini, <?php echo $this->app_model->Hari_Bulan_Indo();?> Tahun <?php echo $thn;?> Pukul <?php echo $jam;?> Pangkat <?php echo $pangkat;?> Jabatan <?php echo $jabatan;?> yang dipekerjakan pada kantor polisi tersebut telah menerima Laporan / Berita dari : <?php echo $nama_petugas;?>
<table class="grid">
  <tbody>
  <tr>
      <td valign="top" width="5">1</td>
      <td valign="top" width="50%">Hari, tanggal dan jam terjadunya kecelakaan lalu lintas</td>
      <td valign="top">Hari : <?php echo $this->app_model->Hari_Bulan_Indo();?><br />
      Tanggal dan Jam : <?php echo $t->Waktu_Dilaporkan;?> WIB</td>
  </tr>
  <tr>
      <td valign="top" width="5">2</td>
      <td valign="top" width="50%">Tempat Kejadian Kecelakaan Lalu lintas</td>
      <td valign="top"><?php echo $t->Alamat_Kejadian;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">3</td>
      <td valign="top" width="50%">Antara apa dengan apa (jenis kendaraan yang tabrakan dan SIM + STNK masing-masing kendaraan</td>
      <?php 
	  $data = $this->app_model->manualQuery("SELECT * FROM t_jenis_kend WHERE No_LP='".$No_LP."'");
	  foreach($data->result() as $tk){
		  $jenis_kend = $tk->Jenis_Kend;
		   $tipe_kend = $tk->Tipe_Kend;
		  $merek_kend = $tk->Merk_Kend; 
		  $no_pol = $tk->No_Pol; 
		  $an_stnk = $tk->An_STNK; 
	  }
	  ?>
      <td valign="top">Jenis  <?php echo $jenis_kend;?> tipe <?php echo $tipe_kend;?> merek <?php echo $merek_kend;?>, Nomor Polisi --<?php echo $no_pol;?> dengan STNK A/n -- <?php echo $an_stnk;?>.
      </td>
  </tr>
  <tr>
      <td valign="top" width="5">4</td>
      <td valign="top" width="50%">Identitas pengemudi yang tabrakan (nama, umur, jenis kelamin, agama, pekerjaan, dan alamat</td>
      <td valign="top">
      <?php 
	  $data = $this->ref_model->data_pengemudi($No_LP);
	  foreach($data->result() as $tk){
		  $nama_pengemudi = $tk->Nama_Pengemudi;
		   $tmpt_lahir = $tk->Tempat_Lahir;
		   $tgl_lahir = $this->app_model->tgl_indo($tk->Tanggal_Lahir);
		  if($tk->JK=='L'){
		  	$sex = 'Laki-laki'; 
		  }else{
			  $sex = 'Perempuan';
		  }
		  $agama = $tk->Agama; 
		  $pekerjaan = $tk->Pekerjaan;
		  $alamat=$tk->Alamat_Pengemudi; 
	  }
	  ?>
      Nama Pengemudi <?php echo $nama_pengemudi;?> Jenis kelamin <?php echo $sex;?>. Temapt Lahir <?php echo $tmpt_lahir;?>, Tanggal Lahir <?php echo $tgl_lahir;?>, Alamat <?php echo $alamat;?>, pekerjaan <?php echo $pekerjaan;?>, agama <?php echo $agama;?>
      </td>
  </tr>
  <tr>
      <td valign="top" width="5">5</td>
      <td valign="top" width="50%">Keadaan jasmani dan rohani pengemudi yang bersangkutan</td>
      <td><?php echo $t->Keadaan_Pengemudi;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">6</td>
      <td valign="top" width="50%">Keadaan Cuaca, jalan dan sebagainya</td>
      <td><?php echo $t->Keadaan_Cuaca;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">7</td>
      <td valign="top" width="50%">Posisi</td>
      <td><?php echo $t->Posisi;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">8</td>
      <td valign="top" width="50%">Saksi(nama, umur, jenis kelamin, agama, pekerjaan dan alamat)</td>
      <td>
      <?php 
	  $data = $this->ref_model->data_saksi($No_LP);
	  foreach($data->result() as $ts){
		?>
        -- <?php echo $ts->Nama_Saksi;?>, Tempat Lahir <?php echo $ts->Tempat_Lahir;?>, Tanggal Lahir <?php echo $this->app_model->tgl_str($ts->Tempat_Lahir);?> dengan alamat <?php echo $ts->Alamat_Saksi;?>. 
        <?php
	  }?>
      </td>
  </tr>
  <tr>
      <td valign="top" width="5">9</td>
      <td valign="top" width="50%">Akibat tabrak korban manusia (nama, umur, jenis kelamin, agama, pekerjaan dan alamat)</td>
      <td>
      <?php 
	  $data = $this->ref_model->data_korban($No_LP);
	  foreach($data->result() as $ts){
		?>
        -- <?php echo $ts->Nama_Korban;?>, Tempat Lahir <?php echo $ts->T_Lahir_Korban;?>, Tanggal Lahir <?php echo $this->app_model->tgl_str($ts->Tgl_Lahir_Korban);?> dengan alamat <?php echo $ts->Alamat_Korban;?>. Agama  <?php echo $ts->Agama;?> <br />
        <?php
	  }?>
      </td>
  </tr>
  <tr>
      <td valign="top" width="5">10</td>
      <td valign="top" width="50%">Kerusakan Benda</td>
      <td><?php echo $t->Kerusakan_Benda;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">11</td>
      <td valign="top" width="50%">Kerugian nilai dengan uang</td>
      <td><?php echo $t->Kerugian_Materi;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">12</td>
      <td valign="top" width="50%">Keterangan singkat tentang terjadinya kecelakaan lalu lintas</td>
      <td><?php echo $t->Ket_Singkat;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">13</td>
      <td valign="top" width="50%">Kesimpulan sementara</td>
      <td><?php echo $t->Kesimpulan;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">14</td>
      <td valign="top" width="50%">Barang bukti yang disita</td>
      <td><?php echo $t->BB;?></td>
  </tr>
  <tr>
      <td valign="top" width="5">15</td>
      <td valign="top" width="50%">Orang yang ditahan</td>
      <td><?php echo $t->Orang_Ditahan;?></td>
  </tr>
  </tbody>
</table>
<p>Demikianlah laporan polisi ini dengan sebenarnya mengingat sumpah jabatan yang ada kemudian ditutup dan ditanda tangani di Cilegon pada hari dan tanggal tersebut diatas.
</section>
<?php 
}?>
<br /><br />
<table width="100%">
<tr>
	<td width="50%" valign="top" align="center">
    Penyidik Pembantu Unit I
    <br />
    <br />
    <br />
    <br />
    <u> SARPAN </u><br />
    Ajun Inspektur Polisi II NRP 68020426
    </td>
	<td width="50%" valign="top" align="center">
    Yang membuat laporan
    <br />
    <br />
    <br />
    <br />
    <u><?php echo $nama_petugas;?></u><br />
    <?php echo $pangkat;?>
    </td>
</tr>
<tr>
	<td colspan="2" align="center">
    Mengetahui<br />
    Kasat Lantas
    <br />
    <br />
    <br />
    <br />
    <u>I KETUT WIDIARTA, S.H, S.IK</u><br />
    Ajun Komisaris Polisi NRP 79071569
    </td>
</tr>    
</table>    
</div>