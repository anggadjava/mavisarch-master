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
	public function get_last_kode($cabang,$level)
	{
		$this->db->order_by("kode_kelas", "desc"); 
		$query = $this->db->get_where('kelas', array('cabang' => $cabang,'level' => $level));
		if ($query->num_rows()>0) {
			$last_kode = $query->row()->kode_kelas;
			$last_kode = substr($last_kode, -3);
		}
		else {
			$last_kode = '';
		}
		return $last_kode;

	}
	public function getAllDataLimited($table,$limit,$offset)
	{
		$this->db->select('kelas.*,ruang.nama_ruang,guru.nama as nama_guru');
		$this->db->join('ruang', 'kelas.ruang = ruang.id_ruang','left');
		$this->db->join('guru', 'kelas.guru = guru.NIK','left');
		$this->db->order_by("kelas.kode_kelas", "desc"); 
		return $this->db->get($table, $limit, $offset);
	}
	public function searchGetAllDataLimited($table,$limit,$offset,$field,$string)
	{
		$this->db->select('kelas.*,ruang.nama_ruang,guru.nama as nama_guru');
		$this->db->join('ruang', 'kelas.ruang = ruang.id_ruang','left');
		$this->db->join('guru', 'kelas.guru = guru.NIK','left');
		$this->db->like($field[0], $string, 'both'); 
		$this->db->order_by("kelas.kode_kelas", "desc"); 
		foreach ($field as $key) {
			$this->db->or_like($key, $string, 'both'); 
		}
		return $this->db->get($table, $limit, $offset);
	}
	public function getKelasSiswaLimited($table,$limit,$offset)
	{
		$this->db->select('kelas_siswa.*,siswa.*,kelas.*');
		$this->db->join('siswa', 'kelas_siswa.nis = siswa.nis','left');
		$this->db->join('kelas', 'kelas_siswa.kode_kelas = kelas.kode_kelas ','left');
		return $this->db->get($table, $limit, $offset);
	}
	
}
	