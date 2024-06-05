<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_codechamp extends Member_Controller {
	private $kode_menu = 'user-codechamp';
	private $kelompok = 'pengaturan';
	private $url = 'manager/pengaturan_codechamp';
	
    function __construct(){
		parent:: __construct();
		$this->load->model('konfigurasi_model');

		parent::cek_akses($this->kode_menu);
	}
	
    public function index($page=null, $id=null){
        $data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;
        
        $this->template->display_admin($this->kelompok.'/pengaturan_codechamp_view', 'Pengaturan', $data);
    }

    function simpan(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('codechamp-nama', 'Nama','required|strip_tags');
        $this->form_validation->set_rules('codechamp-keterangan', 'Keterangan','required|strip_tags');
		$this->form_validation->set_rules('codechamp-link-login', 'Link Login Operator','required|strip_tags');
		$this->form_validation->set_rules('codechamp-mobile-lock-xambro', 'Lock Mobile Exam Browser','required|strip_tags');
		$this->form_validation->set_rules('codechamp-informasi', 'Informasi Peserta Tes','required');
        
        if($this->form_validation->run() == TRUE){
            $data['konfigurasi_isi'] = $this->input->post('codechamp-nama', true);
			$this->konfigurasi_model->update('konfigurasi_kode', 'nama', $data);
			
			$data['konfigurasi_isi'] = $this->input->post('codechamp-keterangan', true);
			$this->konfigurasi_model->update('konfigurasi_kode', 'keterangan', $data);
			
			$data['konfigurasi_isi'] = $this->input->post('codechamp-link-login', true);
			$this->konfigurasi_model->update('konfigurasi_kode', 'link_login_operator', $data);
			
			$data['konfigurasi_isi'] = $this->input->post('codechamp-mobile-lock-xambro', true);
			$this->konfigurasi_model->update('konfigurasi_kode', 'mobile_lock_xambro', $data);
			
			$data['konfigurasi_isi'] = $this->input->post('codechamp-informasi', true);
			$this->konfigurasi_model->update('konfigurasi_kode', 'informasi', $data);

            $status['status'] = 1;
			$status['pesan'] = 'Pengaturan berhasil disimpan ';
        }else{
            $status['status'] = 0;
            $status['pesan'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function get_pengaturan_codechamp(){
    	$data['data'] = 1;
		$query = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'link_login_operator', 1);
		$data['link_login_operator'] = 'ya';
		if($query->num_rows()>0){
			$data['link_login_operator'] = $query->row()->konfigurasi_isi;
		}
		
		$query = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'nama', 1);
		$data['nama'] = 'Codechamp';
		if($query->num_rows()>0){
			$data['nama'] = $query->row()->konfigurasi_isi;
		}
		
		$query = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'keterangan', 1);
		$data['keterangan'] = 'Kursus Online Berbahasa Indonesia';
		if($query->num_rows()>0){
			$data['keterangan'] = $query->row()->konfigurasi_isi;
		}
		
		$query = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'informasi', 1);
		$data['informasi'] = 'Silahkan pilih Tes yang diikuti dari daftar tes yang tersedia dibawah ini. Apabila tes tidak muncul, silahkan menghubungi Operator yang bertugas.';
		if($query->num_rows()>0){
			$data['informasi'] = $query->row()->konfigurasi_isi;
		}
		
		$query = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'mobile_lock_xambro', 1);
		$data['mobile_lock_xambro'] = 'ya';
		if($query->num_rows()>0){
			$data['mobile_lock_xambro'] = $query->row()->konfigurasi_isi;
		}
		
		echo json_encode($data);
    }
}