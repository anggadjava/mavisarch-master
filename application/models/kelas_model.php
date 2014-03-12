<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_model extends CI_Model {
	
	public function getAllData($table)
	{
		$this->db->order_by('id','desc');
		return $this->db->get($table);
	}
	public function searchGetAllData($table,$field,$string)
	{
		$this->db->like($field[0], $string, 'both'); 
		foreach ($field as $key) {
			$this->db->or_like($key, $string, 'both'); 
		}
		$this->db->order_by('id','desc');
		return $this->db->get($table);
	}
	public function get_last_kode($cabang)
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get_where('bukutamu', array('cabang' => $cabang));
		if ($query->num_rows()>0) {
			$last_kode = $query->row()->kode_bukutamu;
			$last_kode = substr($last_kode, -3);
		}
		else {
			$last_kode = '';
		}
		return $last_kode;

	}
	public function getAllDataLimited($table,$limit,$offset)
	{
		$this->db->select('bukutamu.*,cabang.nama_cabang');
		$this->db->join('cabang', 'bukutamu.cabang = cabang.kode_cabang','left');
		$this->db->order_by("id", "desc"); 
		return $this->db->get($table, $limit, $offset);
	}
	public function searchGetAllDataLimited($table,$limit,$offset,$field,$string)
	{
		$this->db->select('bukutamu.*,cabang.nama_cabang');
		$this->db->join('cabang', 'bukutamu.cabang = cabang.kode_cabang','left');
		$this->db->like($field[0], $string, 'both'); 
		$this->db->order_by("id", "desc"); 
		foreach ($field as $key) {
			$this->db->or_like($key, $string, 'both'); 
		}
		return $this->db->get($table, $limit, $offset);
	}
	public function followup_getAllDataLimited($table,$kode,$limit,$offset)
	{
		return $this->db->get_where($table,array('kode_bukutamu' => $kode), $limit, $offset);
	}
	public function followup_getAllData($table,$kode)
	{
		return $this->db->get_where($table,array('kode_bukutamu' => $kode));
	}
	public function get_nis($cabang)
	{
		$this->db->order_by("tanggal_buat", "desc"); 
		$query = $this->db->get_where('siswa', array('cabang' => $cabang));
		if ($query->num_rows()>0) {
			$last_kode = $query->row()->nis;
			$last_kode = substr($last_kode, -3);
		}
		else {
			$last_kode = '';
		}
		return $last_kode;

	}
	
}
	