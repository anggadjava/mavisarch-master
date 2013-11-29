<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saksi extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$id['No_LP'] = $this->input->post('id');
			$d['data'] = $this->app_model->getSelectedData("t_saksi",$id);
			$d['content']= $this->load->view('saksi/daftar',$d);
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
			$d['judul'] ="Data Saksi";
			$d['ID'] ='';
			$d['content']= $this->load->view('saksi/form',$d);
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
			
			
			$id = $this->uri->segment(3);
			$sql = $this->db->query("SELECT * FROM t_kecelakaan WHERE No_LP='$id'");
			foreach ($sql->result() as  $t) {
				$d['No_LP']=$t->No_LP;
			}

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
			$up['No_LP'] = $this->input->post('No_LP');
			$up['Nama_Saksi'] =$this->input->post('Nama_Saksi');
			$up['Alamat_Saksi'] = $this->input->post('Alamat_Saksi');
			$up['Tempat_Lahir'] = $this->input->post('Tempat_Lahir');
			$up['Tanggal_Lahir'] = $this->app_model->tgl_sql($this->input->post('Tanggal_Lahir'));
			
			$id['No_LP'] = $this->input->post('No_LP');
			$id['ID_Saksi'] = $this->input->post('ID_Saksi');
			
			$hasil = $this->app_model->getSelectedData("t_saksi",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_saksi",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_saksi",$up);
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */