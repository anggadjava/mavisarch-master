<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_kendaraan extends CI_Controller {

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
			$d['data'] = $this->app_model->getSelectedData("t_jenis_kend",$id);
			$d['content']= $this->load->view('data_kendaraan/daftar',$d);
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
			$d['judul'] ="Data Kendaraan";
			$d['ID'] = '';
			/*
			$d['No_LP'] = '';
			$d['Jenis_Kend'] = '';
			$d['No_Pol'] = '';
			$d['Tipe_Kend'] = '';
			$d['Gerakan_Kend'] = '';
			$d['Merk_Kend'] = '';
			$d['Tahun_Pembuatan'] = '';
			$d['Warna_Plat'] = '';
			$d['Jumlah_Penumpang'] = '';
			$d['Kecepatan'] = '';
			$d['Kerusakan_Kend'] = '';
			$d['Desk_Kerusakan'] = '';
			$d['STUJ'] = '';
			$d['Kerusakan_Lain'] = '';
			$d['BBM'] = '';
			$d['Silinder_CC'] = '';
			$d['No_STNK'] = '';
			$d['An_STNK'] = '';
			$d['Alamat_STNK'] = '';
			$d['No_Rangka'] = '';
			$d['No_Mesin'] = '';
			$d['No_BPKB'] = '';
			*/
			
			$d['content']= $this->load->view('data_kendaraan/form',$d);
			//$this->load->view('home',$d);
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
			
			
			$id = $this->input->post('id');
			$sql = $this->db->query("SELECT * FROM t_jenis_kend WHERE id_kend='$id'");
			foreach ($sql->result() as  $t) {
				//$d['No_LP']=$t->No_LP;
				$dt['Jenis_Kend'] = $t->Jenis_Kend;
				$dt['No_Pol'] = $t->No_Pol;
				$dt['Tipe_Kend'] = $t->Tipe_Kend;
				$dt['Gerakan_Kend']= $t->Gerakan_Kend;
				$dt['Merk_Kend'] = $t->Merk_Kend;
				$dt['Tahun_Pembuatan'] = $t->Tahun_Pembuatan;
				$dt['Warna_Plat']= $t->Warna_Plat;
				//$dt['Jumlah_Penumpang'] = $this->input->post('');
				$dt['Kecepatan']= $t->Kecepatan;
				$dt['Kerusakan_Kend']= $t->Kerusakan_Kend;
				$dt['Desk_Kerusakan']= $t->Desk_Kerusakan;
				$dt['STUJ']= $t->STUJ;
				$dt['Kerusakan_Lain']= $t->Kerusakan_Lain;
				$dt['BBM']= $t->BBM;
				$dt['Silinder_CC']= $t->Silinder_CC;
				$dt['No_STNK']= $t->No_STNK;
				$dt['An_STNK']= $t->An_STNK;
				$dt['Alamat_STNK']= $t->Alamat_STNK;
				$dt['No_Rangka']= $t->No_Rangka;
				$dt['No_Mesin']= $t->No_Mesin;
				$dt['No_BPKB']= $t->No_BPKB;
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
			
			$dt['No_LP'] = $this->input->post('No_LP');
			//$dt['id_kend'] = $this->input->post('id_kend');
			$dt['Jenis_Kend'] = $this->input->post('Jenis_Kend');
			$dt['No_Pol'] = $this->input->post('No_Pol');
			$dt['Tipe_Kend'] = $this->input->post('Tipe_Kend');
			$dt['Gerakan_Kend']= $this->input->post('Gerakan_Kend');
			$dt['Merk_Kend'] = $this->input->post('Merk_Kend');
			$dt['Tahun_Pembuatan'] = $this->input->post('Tahun_Pembuatan');
			$dt['Warna_Plat']= $this->input->post('Warna_Plat');
			$dt['Jumlah_Penumpang'] = $this->input->post('Jumlah_Penumpang');
			$dt['Kecepatan']= $this->input->post('Kecepatan');
			$dt['Kerusakan_Kend']= $this->input->post('Kerusakan_Kend');
			$dt['Desk_Kerusakan']= $this->input->post('Desk_Kerusakan');
			$dt['STUJ']= $this->input->post('STUJ');
			$dt['Kerusakan_Lain']= $this->input->post('Kerusakan_Lain');
			$dt['BBM']= $this->input->post('BBM');
			$dt['Silinder_CC']= $this->input->post('Silinder_CC');
			$dt['No_STNK']= $this->input->post('No_STNK');
			$dt['An_STNK']= $this->input->post('An_STNK');
			$dt['Alamat_STNK']= $this->input->post('Alamat_STNK');
			$dt['No_Rangka']= $this->input->post('No_Rangka');
			$dt['No_Mesin']= $this->input->post('No_Mesin');
			$dt['No_BPKB']= $this->input->post('No_BPKB');
			
			$id['No_LP'] = $this->input->post('No_LP');
			$dt['id_kend'] = $this->input->post('ID');
			
			$hasil = $this->app_model->getSelectedData("t_jenis_kend",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_jenis_kend",$dt,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_jenis_kend",$dt);
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