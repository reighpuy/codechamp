<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Template
{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
		$this->_ci->load->library('access');
		$this->_ci->load->library('access_tes');
		$this->_ci->load->model('user_model');
		$this->_ci->load->model('users_model');
		$this->_ci->load->model('konfigurasi_model');
	}

	function display_admin($template, $title, $data = null)
	{
		if (empty($data['kode_menu'])) {
			$data['kode_menu'] = 'KOSONG';
		}
		//$data['site_names']=$this->_ci->config->item('site_names');
		$query = $this->_ci->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'nama', 1);
		if ($query->num_rows() > 0) {
			$data['site_names'] = $query->row()->konfigurasi_isi;
		} else {
			$data['site_names'] = $this->_ci->config->item('site_names');
		}
		$data['site_version'] = $this->_ci->config->item('site_version');
		$data['nama'] = $this->_ci->access->get_nama();
		$data['user_grup_id'] = $this->_ci->access_tes->get_user_grup_id();
		$data['sidemenu'] = $this->_ci->users_model->get_menu($data['kode_menu'], $this->_ci->access->get_level());;
		$data['content'] = $this->_ci->load->view($template, $data, true);
		$data['title'] = $title;
		$this->_ci->load->view('template/template_admin.php', $data);
	}

	function display_user($template, $title, $data = null)
	{
		//$data['site_names']=$this->_ci->config->item('site_names');
		$query = $this->_ci->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'nama', 1);
		if ($query->num_rows() > 0) {
			$data['site_names'] = $query->row()->konfigurasi_isi;
		} else {
			$data['site_names'] = $this->_ci->config->item('site_names');
		}
		$data['site_version'] = $this->_ci->config->item('site_version');
		$data['user_grup_id'] = $this->_ci->access_tes->get_user_grup_id();
		$data['content'] = $this->_ci->load->view($template, $data, true);
		$data['title'] = $title;
		$this->_ci->load->view('template/template_user.php', $data);
	}

	function display_tes($template, $title, $data = null)
	{
		//$data['site_names']=$this->_ci->config->item('site_names');
		$query = $this->_ci->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'nama', 1);
		if ($query->num_rows() > 0) {
			$data['site_names'] = $query->row()->konfigurasi_isi;
		} else {
			$data['site_names'] = $this->_ci->config->item('site_names');
		}
		$data['site_version'] = $this->_ci->config->item('site_version');
		$data['content'] = $this->_ci->load->view($template, $data, true);
		$data['group'] = $this->_ci->access_tes->get_group();
		$data['userid'] = $this->_ci->access_tes->get_user_id();
		$email = $this->_ci->access_tes->get_email();
		$query_user = $this->_ci->user_model->get_by_kolom_limit('email_user', $email, 1);
		if ($query_user->num_rows() > 0) {
			$id = $query_user->row()->user_id;
		}

		$data['user_grup_id'] = $this->_ci->access_tes->get_user_grup_id();
		$data['groups'] = $this->_ci->user_model->get_usr($id);
		$data['userinfo'] = $this->_ci->user_model->get_usr($id);
		$data['title'] = $title;
		$this->_ci->load->view('template/template_tes.php', $data);
	}

	function display_clean($template, $data = null)
	{
		$data['_content'] = $this->_ci->load->view($template, $data, true);
		$this->_ci->load->view('template/template_clean.php', $data);
	}
}
