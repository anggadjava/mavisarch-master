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
	public function getKelasSiswaLimited($kelas,$table,$limit,$offset)
	{
		$this->db->select('nilai.*,siswa.nis as nomor_induk,siswa.*,kelas.*');
		$this->db->join('siswa', 'nilai.nis = siswa.nis','left');
		$this->db->join('kelas', 'nilai.kode_kelas = kelas.kode_kelas ','left');
		$this->db->where('nilai.kode_kelas =', $kelas); 
		return $this->db->get($table, $limit, $offset);
	}
	public function getListSiswaKelas($cabang)
	{
		$tanggal = date("Y-m-d");
		$this->db->select('siswa.*,siswa.nis as nomor_induk,nilai.*,kelas.*');
		$this->db->join('nilai', 'nilai.nis = siswa.nis','left');
		$this->db->join('kelas', 'nilai.kode_kelas = kelas.kode_kelas ','left');
		$this->db->where('kelas.tgl_selesai <', $tanggal); 
		$this->db->where('siswa.cabang =', $cabang); 
		$this->db->or_where('kelas.tgl_mulai IS NULL'); 
		return $this->db->get('siswa');
	}
	public function getKelasData($kode_kelas)
	{
		$this->db->where('kode_kelas =', $kode_kelas); 
		$query = $this->db->get('kelas');
		return $query->row();
	}
	public function getListPertemuan($kode_kelas)
	{
		$this->db->where('kode_kelas =', $kode_kelas); 
		return $this->db->get('kelas_pertemuan');
	}
	public function getKelasSiswa()
	{
		$this->db->select('nilai.*,siswa.nis as nomor_induk,siswa.*,kelas.*');
		$this->db->join('siswa', 'nilai.nis = siswa.nis','left');
		$this->db->join('kelas', 'nilai.kode_kelas = kelas.kode_kelas ','left');
		return $this->db->get('nilai');
	}
	public function getPertemuanId($kode_kelas,$tanggal)
	{
		$query = $this->db->get_where('kelas_pertemuan', array('kode_kelas' => $kode_kelas,'tanggal' => $tanggal));
		if ($query->num_rows()>0) {
			$last_kode = $query->row()->id;
		}
		return $last_kode;
	}
	public function getListAbsensi($id_pertemuan)
	{
		$this->db->join('siswa', 'presensi.nis = siswa.nis','left');
		$this->db->where('id_pertemuan =', $id_pertemuan); 
		return $this->db->get('presensi');
	}

	
}
	