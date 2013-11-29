<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ubah_password extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Ubah Password";
			
			$id = $this->session->userdata('username');
			
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM t_petugas WHERE ID_Petugas='$id' ");
			
			$d['content']= $this->load->view('ubah_password/form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	
	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['pwd'] = md5($this->input->post('password'));

			$id['ID_Petugas'] = $this->session->userdata('username');
			
			$hasil = $this->app_model->getSelectedData("t_petugas",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_petugas",$up,$id);
				echo "Data sukses diubah";
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */