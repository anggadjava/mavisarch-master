<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L412F extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] = "Ranmor yang terlibat Laka Lantas (L412F) ";
			
			//$d['profesi'] = $this->app_model->getAllData("m_pekerjaan");
			$d['content']= $this->load->view('laporan/L412F',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */