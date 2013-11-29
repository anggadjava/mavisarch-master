<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
		***	Controller : login.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek)){
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login',$d);
			}else{
				$u = $this->input->post('username');
				$p = $this->input->post('password');
				$this->app_model->getLoginData($u,$p);
			}
		}else{
			header('location:'.base_url().'index.php/home');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'index.php/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */