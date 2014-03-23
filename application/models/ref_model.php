<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_model extends CI_Model {

	
	
	public function list_cabang(){
		return $this->db->get("cabang");
	}
	public function list_sumber_informasi(){
		return $this->db->get("sumber_informasi");
	}
	public function list_program(){
		return $this->db->get("program");
	}
	public function list_level(){
		return $this->db->get("level");
	}
	public function list_ruang($cabang){
		return $this->db->get_where("ruang",array('cabang'=>$cabang));
	}
	public function list_guru($cabang){
		return $this->db->get_where("guru",array('cabang'=>$cabang));
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */