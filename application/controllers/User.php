<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Tes_Controller
{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('user_model');
	}

    public function index() {

        $email = $this->access_tes->get_email();
        $query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
		if($query_user->num_rows()>0){
			$id = $query_user->row()->user_id;
		}

        $data['userid'] = $this->access_tes->get_user_id();
        $data['user'] = $this->user_model->get_usr($id);
        $data['leaderboard'] = $this->user_model->get_leaderboard();

        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();
        $data['exp'] = $this->access_tes->get_user_exp();

        $this->load->view('templates_beranda/nav_berlangganan');
        $this->load->view('v_user_profil', $data);
        $this->load->view('templates_beranda/footer_berlangganan');

    }

    public function leaderboard() {

        $email = $this->access_tes->get_email();
        $query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
		if($query_user->num_rows()>0){
			$id = $query_user->row()->user_id;
		}

        $data['user'] = $this->user_model->get_leaderboard();

        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();
        $data['exp'] = $this->access_tes->get_user_exp();

        $this->load->view('templates_beranda/nav_berlangganan');
        $this->load->view('v_user_leaderboard', $data);
        $this->load->view('templates_beranda/footer_berlangganan');

    }

    public function edit_profile($id)
    {
        $data['user'] = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();

        $ci = &get_instance();
        if ($id !== $ci->session->userdata('user_id')) {
            redirect('tes_dashboard');
        }

        $this->load->view('templates_beranda/nav_berlangganan');
        $this->load->view('v_user_edit', $data);
        $this->load->view('templates_beranda/footer_berlangganan');
    }

    public function edited_profile()
    {
        $id = $this->access_tes->get_user_id();
        $data['user'] = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();
        // $updatedUser = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();
        $updatedUser = json_decode(json_encode($data['user']), true);

        $nama_user = $this->input->post('nama_user');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $foto_user = $_FILES['foto_user']['name'];

        $this->form_validation->set_rules('nama_user', 'Nama Baru', 'required|trim|min_length[3]');

        if (!empty($password)){
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[3]|matches[password]');
        };

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();
            $this->load->view('templates_beranda/nav_berlangganan');
            $this->load->view('v_user_edit', $data);
            $this->load->view('templates_beranda/footer_berlangganan');

        } else {

            $id = $this->session->userdata('user_id');

            $data_baru = array(
                'nama_user' => $nama_user,
            );
            $where = array(
                'user_id' => $id
            );

            if (!empty($password)){
                $data_baru['password_user'] = md5($password);
            };

            if ($foto_user) {
                $config['upload_path'] = './assets/img/img_user';
                $config['allowed_types'] = 'jpg|jpeg|png';
        
                $this->load->library('upload', $config);
        
                if ($this->upload->do_upload('foto_user')) {
                    $gambar_lama = $updatedUser[0]['foto_user'];
                    if($gambar_lama != 'default-avatar.png' && file_exists(FCPATH . 'assets/img/img_user/' . $gambar_lama)) {
                        unlink(FCPATH . 'assets/img/img_user/' . $gambar_lama); }
                    $data_baru['foto_user'] = $this->upload->data('file_name');
                }
            }

            $this->user_model->edit_data('cc_user', $data_baru, $where);
            $updatedUser = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();
            $updatedUser = json_decode(json_encode($updatedUser), true);

            $this->session->set_userdata($updatedUser[0]);
            $this->session->set_userdata('tes_nama', $updatedUser[0]['nama_user']);
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
                    title: 'Ubah Data Profil',
                    type: 'success',
                    text: 'Berhasil mengubah data profil.'
                }).then((result => {
                    window.location ='<?= site_url('user') ?>';
                }))
            </script>;
            <?php
            // redirect('user');
        }
    }
}