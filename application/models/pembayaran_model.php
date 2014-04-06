<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	/**
	 * @author : Deddy Rusdiansyah
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	
	public function getAllData($nis)
	{
		$this->db->where('nis =',$nis);
		return $this->db->get('kwitansi');
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	public function searchGetAllData($table,$field,$string)
	{
	
		$this->db->like($field[0], $string, 'both'); 
		foreach ($field as $key) {
			$this->db->or_like($key, $string, 'both'); 
		}
		return $this->db->get($table);
	}
	public function getLastKode($cabang)
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get_where('kwitansi', array('cabang' => $cabang));
		if ($query->num_rows()>0) {
			$last_kode = $query->row()->id;
			$last_kode = substr($last_kode, -3);
		}
		else {
			$last_kode = '';
		}
		return $last_kode;

	}
	public function getKwitansiData($nis,$id_kwitansi)
	{
		$this->db->select('kwitansi.*,siswa.nama,cabang.nama_cabang');
		$this->db->where('kwitansi.nis',$nis);
		$this->db->where('kwitansi.id',$id_kwitansi);
		$this->db->join('siswa', 'kwitansi.nis = siswa.nis','left');
		$this->db->join('cabang', 'kwitansi.cabang = cabang.kode_cabang','left');
		return $this->db->get('kwitansi');
	}
	public function getKwitansiItem($id_kwitansi){
		$this->db->select('kwitansi_item.*,tagihan.*');
		$this->db->join('tagihan', 'kwitansi_item.id_tagihan = tagihan.id','left');
		$this->db->where('id_kwitansi',$id_kwitansi);
		return $this->db->get('kwitansi_item');
	}
	
	public function searchGetAllDataLimited($table,$limit,$offset,$field,$string)
	{
		$this->db->like($field[0], $string, 'both'); 
		foreach ($field as $key) {
			$this->db->or_like($key, $string, 'both'); 
		}
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
		
	//select table
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
}	