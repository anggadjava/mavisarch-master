<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
            $this->load->model('siswa_model');
            $this->load->model('tagihan_model');
       }

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Data Siswa";
			$cabang = $this->session->userdata('cabang');
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			if (empty($_GET)) {
				$tot_hal = $this->app_model->getAllData("siswa");
			}
			else{
				$tot_hal = $this->app_model->searchGetAllData('siswa',array('nis','nama'),$_GET['cari']);	
			}
			
			$config['base_url'] = site_url() . '/siswa/index/';
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
				$d['data'] = $this->siswa_model->getAllDataLimited($cabang,"siswa",$limit,$offset);
			}
			else{
				$d['data'] = $this->siswa_model->searchGetAllDataLimited($cabang,"siswa",$limit,$offset,array('nis','nama'),$_GET['cari']);
			}
			
			$d['content']= $this->load->view('siswa/daftar',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function detail()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Detail Siswa";
			$nis = $this->uri->segment(3);
			$d['nis'] = $nis;
			$d['readonly'] = '';
			$d['content']= $this->load->view('siswa/detail',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}	
	}
	public function siswaCariData(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('nis');
			$text = "SELECT * FROM siswa WHERE nis='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM siswa WHERE nis='$id'");
				foreach ($sql->result() as  $t) {
					$up['kode_bukutamu']=$t->kode_bukutamu;
					$up['nis']=$t->nis;
					$up['cabang'] =$t->cabang;
					$up['nama'] =$t->nama;
					$up['tempat_lahir'] = $t->tempat_lahir;
					$up['tanggal_lahir'] = $this->app_model->tgl_str($t->tanggal_lahir);
					$up['alamat'] = $t->alamat;
					$up['agama'] = $t->agama;
					$up['rt'] = $t->rt;
					$up['rw'] = $t->rw;
					$up['kecamatan'] = $t->kecamatan;
					$up['pekerjaan'] = $t->pekerjaan;
					$up['kota'] = $t->kota;
					$up['telepon'] = $t->telepon;
					$up['email'] = $t->email;
					$up['pilihan_jam'] = $t->pilihan_jam;
					$up['pilihan_hari'] = $t->pilihan_hari;
					$up['sekolah_asal'] = $t->sekolah_asal;
					$up['foto'] = $t->foto;
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
}	
	

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */