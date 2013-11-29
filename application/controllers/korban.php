<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Korban extends CI_Controller {

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
			$d['data'] = $this->app_model->getSelectedData("t_korban",$id);
			$d['content']= $this->load->view('korban/daftar',$d);
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
			$d['judul'] ="Data Korban";
			$d['ID'] = '';
			$d['content']= $this->load->view('korban/form',$d);
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
			//$up['ID_Pelaku'] = $this->session->userdata('username');;
			$up['Nama_Korban'] =$this->input->post('Nama_Korban');
			$up['Alamat_Korban'] = $this->input->post('Alamat_Korban');
			$up['T_Lahir_Korban'] = $this->input->post('T_Lahir_Korban');
			$up['Tgl_Lahir_Korban'] = $this->app_model->tgl_sql($this->input->post('Tgl_Lahir_Korban'));
			$up['JK_Korban'] = $this->input->post('JK_Korban');
			$up['Pendidikan_Korban'] = $this->input->post('Pendidikan_Korban');
			$up['Pekerjaan'] = $this->input->post('Pekerjaan');
			$up['Agama'] = $this->input->post('Agama');
			$up['Tingkat_Luka'] = $this->input->post('Tingkat_Luka');
			$up['Tempat_Luka'] = $this->input->post('Tempat_Luka');
			$up['Korban'] = $this->input->post('Korban');
			$up['Posisi_Korban'] = $this->input->post('Posisi_Korban');
			$up['Pengaman'] = $this->input->post('Pengaman');
			$up['Helm'] = $this->input->post('Helm');
			$up['Safety_Belt'] = $this->input->post('Safety_Belt');
			$up['Posisi_Pejalan'] = $this->input->post('Posisi_Pejalan');
			$up['Gerakan_Pejalan'] = $this->input->post('Gerakan_Pejalan');
			
			$id['No_LP'] = $this->input->post('No_LP');
			$id['ID_Korban'] = $this->input->post('ID_Korban');
			
			$hasil = $this->app_model->getSelectedData("t_korban",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_korban",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_korban",$up);
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