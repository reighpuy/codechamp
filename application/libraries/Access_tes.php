<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

#[AllowDynamicProperties]
class Access_tes
{
	function __construct()
	{
		$this->CI = &get_instance();

		$this->CI->load->helper('cookie');
		$this->CI->load->model('user_model');

		$this->users_model = &$this->CI->user_model;
	}


	/**
	 * proses login
	 * 0 = email tak ada
	 * 1 = sukses
	 * 2 = password salah
	 * @param unknown_type $email
	 * @param unknown_type $password
	 * @return boolean
	 */
	function login($email, $password)
	{
		$result = $this->users_model->get_by_email($email);
		if ($result) {
			if (md5($password) === $result->password_user) {
				$this->CI->session->set_userdata('tes_user_id', $result->email_user);
				$this->CI->session->set_userdata('user_id', $result->user_id);
				$this->CI->session->set_userdata('user_exp', $result->exp_user);
				$this->CI->session->set_userdata('user_grup_id', $result->user_grup_id);
				// $this->CI->session->set_userdata('tes_user_email',$result->email_user);
				$this->CI->session->set_userdata('tes_nama', stripslashes($result->nama_user));
				$this->CI->session->set_userdata('tes_group', $result->grup_nama);
				$this->CI->session->set_userdata('tes_group_id', $result->grup_id);
				return 1;
			} else {
				return 2;
			}
		}
		return 0;
	}

	/**
	 * cek apakah sudah login
	 * @return boolean
	 */
	function is_login()
	{
		return (($this->CI->session->userdata('tes_user_id')) ? TRUE : FALSE);
	}

	function get_email()
	{
		return $this->CI->session->userdata('tes_user_id');
	}

	function get_user_exp()
	{
		return $this->CI->session->userdata('user_exp');
	}

	function get_user_id()
	{
		return $this->CI->session->userdata('user_id');
	}

	function get_nama()
	{
		return $this->CI->session->userdata('tes_nama');
	}
	function get_id()
	{
		return $this->CI->session->userdata('tes_user_id');
	}

	function get_group()
	{
		return $this->CI->session->userdata('tes_group');
	}

	function get_group_id()
	{
		return $this->CI->session->userdata('tes_group_id');
	}

	function get_user_grup_id()
	{
		return $this->CI->session->userdata('user_grup_id');
	}

	/**
	 * logout
	 */
	function logout()
	{
		$this->CI->session->unset_userdata('tes_user_id');
		$this->CI->session->unset_userdata('tes_nama');
		$this->CI->session->unset_userdata('tes_group_id');
		$this->CI->session->unset_userdata('tes_group');
	}
}
