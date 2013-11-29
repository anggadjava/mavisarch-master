<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelaku extends CI_Controller {
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
			$d['data'] = $this->app_model->getSelectedData("t_pelaku",$id);
			$d['content']= $this->load->view('pelaku/daftar',$d);
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
			$no = $this->app_model->No_Urut("t_pelaku","ID_Pelaku");
			$d['ID_Pelaku']=$no;
			$d['content']= $this->load->view('pelaku/form',$d);
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
			$d['judul'] ="Edit Pelaku";
			
			$id = $this->input->post('id');
			$sql = $this->db->query("SELECT * FROM t_pelaku WHERE ID_Pelaku='$id'");
			foreach ($sql->result() as  $t) {
				//$up['No_LP']=$t->No_LP;
				$up['ID_Pelaku']=$t->ID_Pelaku;
				$up['Nama_Pelaku'] =$t->Nama_Pelaku;
				$up['Alamat_Pelaku'] = $t->Alamat_Pelaku;
				$up['T_Lahir_Pelaku'] = $t->T_Lahir_Pelaku;
				$up['Tgl_Lahir_Pelaku'] = $this->app_model->tgl_str($t->Tgl_Lahir_Pelaku);
				$up['JK_Pelaku'] = $t->JK_Pelaku;
				$up['Pendidikan_Pelaku'] = $t->Pendidikan_Pelaku;
				$up['Pekerjaan_Pelaku'] = $t->Pekerjaan_Pelaku;
				echo json_encode($up);
			}
		}else{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['No_LP'] = $this->input->post('No_LP');
			//$up['ID_Pelaku'] = $this->session->userdata('username');;
			$up['Nama_Pelaku'] =$this->input->post('Nama_Pelaku');
			$up['Alamat_Pelaku'] = $this->input->post('Alamat_Pelaku');
			$up['T_Lahir_Pelaku'] = $this->input->post('T_Lahir_Pelaku');
			$up['Tgl_Lahir_Pelaku'] = $this->app_model->tgl_sql($this->input->post('Tgl_Lahir_Pelaku'));
			$up['JK_Pelaku'] = $this->input->post('JK_Pelaku');
			$up['Pendidikan_Pelaku'] = $this->input->post('Pendidikan_Pelaku');
			$up['Pekerjaan_Pelaku'] = $this->input->post('Pekerjaan_Pelaku');
			
			$id['No_LP'] = $this->input->post('No_LP');
			$id['ID_Pelaku'] = $this->input->post('ID_Pelaku');
			
			$hasil = $this->app_model->getSelectedData("t_pelaku",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_pelaku",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_pelaku",$up);
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
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM t_pelaku WHERE ID_Pelaku='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */