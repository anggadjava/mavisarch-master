<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L412A extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] = "Jumlah Kecelakaan Lalu Lintas (L412A) ";
			
			$d['content']= $this->load->view('laporan/L412A',$d,true);
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