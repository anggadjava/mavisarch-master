<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengemudi extends CI_Controller {

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
			$d['data'] = $this->app_model->getSelectedData("t_pengemudi",$id);
			$d['content']= $this->load->view('pengemudi/daftar',$d);
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
			$d['judul'] ="Data Pengemudi";
			$d['ID']='';
			$d['content']= $this->load->view('pengemudi/form',$d);

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
			//$up['No_LP'] = $this->input->post('No_LP');
			$up['Nama_Pengemudi'] = $this->input->post('Nama_Pengemudi');
			$up['Alamat_Pengemudi'] = $this->input->post('Alamat_Pengemudi');
			$up['Tempat_Lahir'] = $this->input->post('Tempat_Lahir');
			$up['Tanggal_Lahir'] = $this->input->post('Tanggal_Lahir');
			$up['Agama'] = $this->input->post('Agama');
			$up['JK'] = $this->input->post('JK');
			$up['Pendidikan'] = $this->input->post('Pendidikan');
			$up['Pekerjaan'] = $this->input->post('Pekerjaan');
			$up['Objek_Sbgai'] = $this->input->post('Objek_Sbgai');
			
			$id['No_LP'] = $this->input->post('No_LP');
			//$id['ID_Pengemudi'] = $this->input->post('ID');
			$id['Nama_Pengemudi'] = $this->input->post('Nama_Pengemudi');
			$hasil = $this->app_model->getSelectedData("t_pengemudi",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_pengemudi",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_pengemudi",$up);
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