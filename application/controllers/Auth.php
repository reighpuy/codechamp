<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	private $kelompok = 'ujian';
	private $url = 'auth';
	public $url2 = 'manager/peserta_daftar';

	function __construct(){
		parent:: __construct();
		$this->load->model('konfigurasi_model');
		$this->load->library('access_tes');
		$this->load->library('user_agent');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
	}
    
	public function index(){
		$data['url'] = $this->url;

		$data['timestamp'] = strtotime(date('Y-m-d H:i:s'));
		if ($this->agent->is_browser()){
            if($this->agent->browser()=='Internet Explorer' ){
                $this->template->display_user('blokbrowser_view', 'Browser yang didukung');
            }else{
				$akses_cbt = 1;
				if($this->agent->is_mobile()){
					$query = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'mobile_lock_xambro', 1);
					if($query->row()->konfigurasi_isi=="ya"){
						$agent = $this->agent->agent_string();
						if(strpos($agent, 'CODECHAMP')==false){
							$akses_cbt = 0;
						}
					}
				}
				if($akses_cbt==1){
					if(!$this->access_tes->is_login()){
						$data['link_login_operator'] = "tidak";
						$query_konfigurasi = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'link_login_operator', 1);
						if($query_konfigurasi->num_rows()>0){
							$data['link_login_operator'] = $query_konfigurasi->row()->konfigurasi_isi;
						}
						
						$data['keterangan'] = "Kursus Online Berbahasa Indonesia";
						$query_konfigurasi = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'keterangan', 1);
						if($query_konfigurasi->num_rows()>0){
							$data['keterangan'] = $query_konfigurasi->row()->konfigurasi_isi;
						}
						
						$this->template->display_user($this->kelompok.'/login_view', 'Sign In', $data);
					}else{
						redirect('tes_dashboard');
					}
				}else{
					$this->template->display_user('lockmobile_view', 'Exam Browser');
				}
            }
        }else{
            $this->template->display_user('blokbrowser_view', 'Browser yang didukung');
        }
	}

	function login(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email','required|strip_tags');
        $this->form_validation->set_rules('password', 'Password','required|strip_tags');
        if($this->form_validation->run() == TRUE){
            $this->form_validation->set_rules('token','token','callback_check_login');
			if($this->form_validation->run() == FALSE){
				//Jika login gagal
                $status['status'] = 0;
                $status['error'] = validation_errors();
			}else{
				//Jika sukses
                $status['status'] = 1;
			}
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        echo json_encode($status);
    }
    
    function logout(){
		$this->access_tes->logout();
		redirect('auth');
	}
	
	function check_login(){
		$email = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		
		$login = $this->access_tes->login($email, $password, $this->input->ip_address());
		if($login==1){
			return TRUE;
		}else if($login==2){
			$this->form_validation->set_message('check_login','Password tidak ditemukan');
			return FALSE;
		}else{
			$this->form_validation->set_message('check_login','Email tersebut tidak terdaftar');
			return FALSE;
		}
	}

	public function register() {

        $this->form_validation->set_rules('tambah-email','Email','required|trim|valid_email|is_unique[cc_user.email_user]', [
            'valid_email' => 'Email yang anda masukkan tidak benar.',
            'required' => 'Kolom email tidak boleh kosong!',
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('tambah-password','Password','required|matches[confirm_password]', [
            'required' => 'Kolom password tidak boleh kosong!',
			'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[3]|matches[tambah-password]', [
			'required' => 'Kolom ulangi password tidak boleh kosong!',
			'matches' => 'Password tidak sama!'
        ]);
		$this->form_validation->set_rules('tambah-nama','Password','required', [
			'required' => 'Kolom Nama tidak boleh kosong!'
		]);

        if($this->form_validation->run() == false){
            //Views
			$this->template->display_user($this->kelompok.'/register_view', 'Sign Up');
        } else {
            //Create Data Array
			$data['email_user'] = $this->input->post('tambah-email', true);
			$data['password_user'] = md5($this->input->post('tambah-password', true));
			// $data['password_user'] = md5($this->input->post('confirm_password', true));
			$data['nama_user'] = $this->input->post('tambah-nama', true);
			$data['foto_user'] = "default-avatar.png";
			$data['user_grup_id'] = 1;
			$data['user_level'] = 1;
	
			// $this->user_model->save($data);
			$this->db->insert('cc_user', $data);
			?>
			<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
			<head>
				<style>
					body {
						font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
					}
				</style>
			</head>
			<body></body>
			<?php
			?>
            <script>
                Swal({
                    title: 'Registrasi Akun',
                    type: 'success',
                    text: 'Berhasil mendaftarkan akun! Silahkan SignIn jika ingin.'
                }).then((result => {
                    window.location ='<?= site_url('auth') ?>';
                }))
            </script>;
            <?php
			// redirect(site_url('auth'));
        };
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */