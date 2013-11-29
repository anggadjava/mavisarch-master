<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_json extends CI_Controller {

	/**
	 * @keterangan : Controller untuk halaman profil
	 **/
	
	public function cek_struktur(){
		$table = "t_saksi";
		$data = $this->db->query("DESCRIBE $table");
		foreach($data->result() as $t){
			echo $t->Field.'<br>';
		}
	}
	
	public function Cari_Data()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id');
			
			$text = "SELECT * FROM t_kecelakaan WHERE No_LP='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				foreach($d->result() as $t){
					$data['ID_Petugas'] = $t->ID_Petugas;
					$data['Waktu_Kejadian'] = $this->app_model->tgl_jam_str($t->Waktu_Kejadian);
					$data['Waktu_Dilaporkan'] = $this->app_model->tgl_jam_str($t->Waktu_Dilaporkan);
					$data['Waktu_Diterima'] = $this->app_model->tgl_jam_str($t->Waktu_Diterima);
					$data['Alamat_Kejadian'] = $t->Alamat_Kejadian;
					$data['Keadaan_Pengemudi'] = $t->Keadaan_Pengemudi;
					$data['Keadaan_Cuaca'] = $t->Keadaan_Cuaca;
					$data['Posisi']=$t->Posisi;
					$data['Kerusakan_Benda']=$t->Kerusakan_Benda;
					$data['Kerugian_Materi']=$t->Kerugian_Materi;
					$data['Ket_Singkat']=$t->Ket_Singkat;
					$data['Kesimpulan']=$t->Kesimpulan;
					$data['BB']=$t->BB;
					$data['Orang_Ditahan']=$t->Orang_Ditahan;
					echo json_encode($data);
				}
			}else{
				$data['ID_Petugas'] = '';
				$data['Waktu_Dilaporkan'] = '';				
				echo json_encode($data);
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */