<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {

	/*
		***	Controller : guru.php
		***	by Angga
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Data Guru";
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->app_model->getAllData("guru");
			$config['base_url'] = site_url() . '/guru/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->app_model->getAllDataLimited("guru",$limit,$offset);
			
			$d['content']= $this->load->view('guru/daftar',$d,true);
			$this->load->view('home',$d);
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
			$d['judul'] ="Entry Guru";
			
			//$d['l_petugas'] = $this->app_model->getAllData("t_petugas");
			$d['readonly'] = '';
			$d['No_LP']='';
			$d['content']= $this->load->view('guru/form',$d,true);
			$this->load->view('home',$d);
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
			$d['judul'] ="Edit Kecelakaan";
			
			$id = $this->uri->segment(4);
			//$id	 = substr($no,3,2);
			$sql = $this->db->query("SELECT * FROM t_kecelakaan WHERE substr(No_LP,4,2)='$id'");
			foreach ($sql->result() as  $t) {
				$d['No_LP']=$t->No_LP;
			}
			
			$d['readonly'] = 'readonly';
			
			//$d['l_petugas'] = $this->app_model->getAllData("t_petugas");

			$d['content']= $this->load->view('bap/form',$d,true);
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
			$up['NIK'] = $this->input->post('NIK');
			
			$id['No_LP'] = $this->input->post('No_LP');
			
			$hasil = $this->app_model->getSelectedData("t_kecelakaan",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_kecelakaan",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_kecelakaan",$up);
				echo "Data sukses disimpan";
			}
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
			//$id = $this->uri->segment(3);
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM t_kecelakaan WHERE No_LP='$id'");
			//echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/barang'>";			
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
	
	public function cetak()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$d['judul'] ='LAPORAN POLISI';
			$d['id'] = $this->uri->segment(4);
			$this->load->view('cetak_laka',$d);
			//$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */