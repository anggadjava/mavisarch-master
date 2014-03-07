<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$id['nis'] = $this->input->post('nis');
			$d['data'] = $this->app_model->getSelectedData("tagihan",$id);
			$d['content']= $this->load->view('tagihan/daftar',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function tambah()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$nis = $this->input->post('nis');
			$cabang = $this->session->all_userdata()['cabang'];
			$d['nis']=$nis;
			$d['cabang']=$cabang;
			$d['jenis_tagihan'] = $this->app_model->getAllData("jenis_tagihan");
			$d['content']= $this->load->view('tagihan/form',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function cari_jenis_tagihan(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id');
			$text = "SELECT * FROM jenis_tagihan WHERE nama_tagihan='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM jenis_tagihan WHERE nama_tagihan='$id'");
				foreach ($sql->result() as  $t) {
					$up['besar_tagihan'] = $t->besar_tagihan;
					$up['deskripsi_tagihan'] = $t->deskripsi_tagihan;
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
	}
	public function edit()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Edit Tagihan";
			
			$id = $this->input->post('id');
			$sql = $this->db->query("SELECT * FROM tagihan WHERE id='$id'");
			foreach ($sql->result() as  $t) {
				//$up['No_LP']=$t->No_LP;
				$up['nis'] = $t->nis;
				$up['cabang'] =$t->cabang;
				$up['besar_tagihan'] = $t->besar_tagihan;
				$up['jenis_tagihan'] = $t->jenis_tagihan;
				$up['notes'] = $t->notes;
				$up['potongan'] = $t->potongan;
				echo json_encode($up);
			}
		}else{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['nis'] = $this->input->post('nis');
			$up['cabang'] =$this->input->post('cabang');
			$up['besar_tagihan'] = $this->input->post('besar_tagihan');
			$up['jenis_tagihan'] = $this->input->post('jenis_tagihan');
			$up['notes'] = $this->input->post('notes');
			$up['potongan'] = $this->input->post('potongan');
			$up['tanggal_buat'] = date("Y-m-d");
			$this->app_model->insertData("tagihan",$up);
			echo "Data sukses disimpan";
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM tagihan WHERE id='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */