<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L412B extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] = "Korban Laka Lantas Berdasarkan Usia (L412B) ";
			
			$d['content']= $this->load->view('laporan/L412B',$d,true);
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