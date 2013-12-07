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
			if (empty($_GET)) {
				$tot_hal = $this->app_model->getAllData("guru");
			}
			else{
				$tot_hal = $this->app_model->searchGetAllData('guru',array('NIK','nama'),$_GET['cari']);	
			}
			
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
			if (empty($_GET)) {
				$d['data'] = $this->app_model->getAllDataLimited("guru",$limit,$offset);
			}
			else{
				$d['data'] = $this->app_model->searchGetAllDataLimited("guru",$limit,$offset,array('NIK','nama'),$_GET['cari']);
			}
			
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
			$d['NIK'] = '';
			$d['cabang'] = '';
			$d['nama'] = '';
			$d['tempat_lahir'] = '';
			$d['tanggal_lahir'] = '';
			$d['tanggal_masuk'] = '';
			$d['alamat'] = '';
			$d['hp'] = '';
			$d['email'] = '';
			$d['telepon'] = '';
			
			$d['readonly'] = '';
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
			$d['judul'] ="Edit Guru";
			$id = $this->uri->segment(3);
			$d['NIK']= $id;
			// $id = $this->input->post('id');
			
			$d['readonly'] = 'readonly';
			//$d['l_petugas'] = $this->app_model->getAllData("t_petugas");

			$d['content']= $this->load->view('guru/form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function cari_data(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id');
			
			$text = "SELECT * FROM guru WHERE NIK='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM guru WHERE NIK='$id'");
				foreach ($sql->result() as  $t) {
					//$up['No_LP']=$t->No_LP;
					$up['NIK']=$t->NIK;
					$up['cabang'] =$t->cabang;
					$up['nama'] =$t->nama;
					$up['tempat_lahir'] = $t->tempat_lahir;
					$up['tanggal_lahir'] = $this->app_model->tgl_str($t->tanggal_lahir);
					$up['tanggal_masuk'] = $this->app_model->tgl_str($t->tanggal_masuk);
					$up['alamat'] = $t->alamat;
					$up['hp'] = $t->hp;
					$up['email'] = $t->email;
					$up['telepon'] = $t->telepon;
					$up['foto'] = $t->foto;
					echo json_encode($up);
				}
			}else{
				$data['NIK'] = '';
				echo json_encode($data);
			}
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
			$up['cabang'] = $this->input->post('cabang');
			$up['nama'] = $this->input->post('nama');
			$up['tempat_lahir'] = $this->input->post('tempat_lahir');
			$up['tanggal_lahir'] = $this->app_model->tgl_sql($this->input->post('tanggal_lahir'));
			$up['tanggal_masuk'] = $this->app_model->tgl_sql($this->input->post('tanggal_masuk'));
			$up['alamat'] = $this->input->post('alamat');
			$up['telepon'] = $this->input->post('telepon');
			$up['hp'] = $this->input->post('hp');
			$up['foto'] = $this->input->post('foto');
			$up['email'] = $this->input->post('email');
			
			$id['NIK'] = $this->input->post('NIK');
			
			$hasil = $this->app_model->getSelectedData("guru",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("guru",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("guru",$up);
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
			$id = $this->input->post('NIK');
			$this->app_model->manualQuery("DELETE FROM guru WHERE NIK='$id'");
			//echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/barang'>";			
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}

	public function uploadFoto(){
		$this->load->helper('blueimp');
		$upload_handler = new Blueimp();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */