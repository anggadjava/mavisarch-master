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
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */