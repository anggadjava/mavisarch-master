<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_model extends CI_Model {

	
	
	public function list_cabang(){
		return $this->db->get("cabang");
	}

	/**
	 * @author : Deddy Rusdiansyah
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/


	public function list_jenis_laka(){
		return $this->db->get("m_jenis_kecelakaan");
	}
	function list_gol_laka(){
		return $this->db->get("m_gol_laka");
	}
	function list_keadaan_lantas(){
		return $this->db->get("m_keadaan_lantas");
	}
	function list_kondisi_jalan(){
		return $this->db->get("m_kondisi_jalan");
	}
	function list_penyebab_laka(){
		return $this->db->get("m_penyebab_laka");
	}
	function list_fungsi_laka(){
		return $this->db->get("m_laka_fungsi_jalan");
	}
	function list_kawasan_laka(){
		return $this->db->get("m_kawasan_laka");
	}
	function list_pendidikan(){
		return $this->db->get("m_pendidikan");
	}
	function list_pekerjaan(){
		return $this->db->get("m_pekerjaan");
	}
	function list_agama(){
		return $this->db->get("m_agama");
	}
	function list_tingkat_luka(){
		return $this->db->get("m_tingkat_luka");
	}
	function list_tempat_luka(){
		return $this->db->get("m_tempat_luka");
	}
	function list_posisi_korban(){
		return $this->db->get("m_posisi_korban");
	}
	function list_pengaman(){
		return $this->db->get("m_pengaman");
	}
	function list_helm(){
		return $this->db->get("m_helm");
	}
	function list_safety_belt(){
		return $this->db->get("m_safety_belt");
	}
	function list_posisi_pejalan(){
		return $this->db->get("m_posisi_pejalan");
	}
	function list_gerakan_pejalan(){
		return $this->db->get("m_gerakan_pejalan");
	}
	
	function cari_pangkat($id){
		$d = $this->db->query("SELECT * FROM t_petugas WHERE ID_Petugas='$id'");
		foreach($d->result()as $t){
			$hasil = $t->Pangkat;
		}
		return $hasil;
		
	}
	
	function cari_jabatan($id){
		$d = $this->db->query("SELECT * FROM t_petugas WHERE ID_Petugas='$id'");
		foreach($d->result()as $t){
			$hasil = $t->Jabatan;
		}
		return $hasil;
		
	}
	function cari_nama_petugas($id){
		$d = $this->db->query("SELECT * FROM t_petugas WHERE ID_Petugas='$id'");
		foreach($d->result()as $t){
			$hasil = $t->Nama_Petugas;
		}
		return $hasil;
		
	}
	
	function data_pengemudi($nolp){
		$hasil = $this->db->query("SELECT * FROM t_pengemudi WHERE No_LP='$nolp'");
		return $hasil;
		
	}
	
	function data_saksi($nolp){
		$hasil = $this->db->query("SELECT * FROM t_saksi WHERE No_LP='$nolp'");
		return $hasil;
		
	}
	function data_korban($nolp){
		$hasil = $this->db->query("SELECT * FROM t_korban WHERE No_LP='$nolp'");
		return $hasil;
		
	}
	
	function pelaku_profesi($id){
		$data = $this->db->query("SELECT * FROM t_pelaku WHERE Pekerjaan_Pelaku='$id'");
		$hasil = $data->num_rows();
		return $hasil;
		
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */