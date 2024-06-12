<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tes_dashboard extends Tes_Controller
{
	private $kelompok = 'ujian';
	private $url = 'tes_dashboard';

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('user_grup_model');
		$this->load->model('tes_model');
		$this->load->model('tes_token_model');
		$this->load->model('tes_topik_set_model');
		$this->load->model('tes_user_model');
		$this->load->model('tesgrup_model');
		$this->load->model('soal_model');
		$this->load->model('master_model');
		$this->load->model('jawaban_model');
		$this->load->model('tes_soal_model');
		$this->load->model('tes_soal_jawaban_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$data['nama'] = $this->access_tes->get_nama();
		$data['id'] = $this->access_tes->get_id();
		$data['group'] = $this->access_tes->get_group();
		$data['url'] = $this->url;

		$id = $this->access_tes->get_user_id();
		$update_tipe = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();
		$update_tipe = json_decode(json_encode($update_tipe), true);
		$this->session->set_userdata('user_grup_id', $update_tipe[0]['user_grup_id']);
		$this->session->set_userdata('tes_group', $update_tipe[0]['user_grup_id']);

		$email = $this->access_tes->get_email();
		$query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
		if ($query_user->num_rows() > 0) {
			$user_id = $query_user->row()->user_id;
			$data['user_id'] = $query_user->row()->user_id;
			$data['transaksi'] = $this->user_model->get_transaksi($user_id);
			$data['usr'] = $this->user_model->get_usr($user_id);
			$query_tes = $this->tes_user_model->get_by_user_status($user_id);
			if ($query_tes->num_rows() > 0) {
				$query_tes = $query_tes->result();
			}
		}

		$query_info = $this->konfigurasi_model->get_by_kolom_limit('konfigurasi_kode', 'informasi', 1);
		if ($query_info->num_rows() > 0) {
			$query_info = $query_info->row();
			$data['informasi'] = $query_info->konfigurasi_isi;
		}
?>

		<head>
			<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
			<style>
				body {
					font-family: "Nunito", Helvetica, Arial, sans-serif;
				}
			</style>
			<link rel="icon" href="<?= base_url('assets/'); ?>img/codechamplogo2.png">
		</head>

		<body></body>
		<?php

		// var_dump($data['transaksi']);
		$result_trans = $this->user_model->get_transaksi_by_email($email);
		if ($data['transaksi']) {
			if ($result_trans->user_grup_id == "2") {
				$tglbrkhir = date('Y-m-d', strtotime("+1 day", strtotime($result_trans->tgl_berakhir)));
				$hariini = date('Y-m-d');
				if ($hariini > $result_trans->tgl_berakhir) {
					?>
					<script>
						Swal({
							title: 'Informasi Berlangganan',
							type: 'warning',
							text: 'Waktu berlangganan anda telah habis!'
						}).then((result => {
							window.location = '<?= site_url('tes_dashboard') ?>';
						}))
					</script>;
					<?php
					$datatrans = array(
						'user_grup_id' => 1
					);

					$this->user_model->update('user_id', $user_id, $datatrans);
					$update_tipe = $this->db->query("SELECT * FROM cc_user WHERE user_id='$user_id'")->result();
					$update_tipe = json_decode(json_encode($update_tipe), true);
					$this->session->set_userdata('user_grup_id', $update_tipe[0]['user_grup_id']);
					$this->session->set_userdata('tes_group', $update_tipe[0]['user_grup_id']);
					// $where_trans_id = array('id_transaksi' => $data['transaksi'][0]->id_transaksi);
					// $this->user_model->hapus_data_transaksi($where_trans_id, 'transaksi');
				} else {
					// var_dump($data['transaksi'][0]->id_transaksi);
					$this->template->display_tes($this->kelompok . '/tes_dashboard_view', 'Dashboard', $data);
				}
			} else {
				$this->template->display_tes($this->kelompok . '/tes_dashboard_view', 'Dashboard', $data);
			}
		} else {
			// var_dump($data['transaksi']);
			$this->template->display_tes($this->kelompok . '/tes_dashboard_view', 'Dashboard', $data);
		}

		// $this->template->display_tes($this->kelompok.'/tes_dashboard_view', 'Dashboard', $data);
	}

	/**
	 * Konfirmasi tes yang akan dilakukan
	 *
	 * @param      <type>  $tes_id  The tes identifier
	 */
	function konfirmasi_test($tes_id = null)
	{
		if (!empty($tes_id)) {
			$query_tes = $this->tes_model->get_by_kolom_limit('tes_id', $tes_id, 1);
			if ($query_tes->num_rows() > 0) {
				$query_tes = $query_tes->row();

				// Cek terlebih dahulu, apakah sudah pernah memulai tes
				$email = $this->access_tes->get_email();
				$user_id = $this->user_model->get_by_kolom_limit('email_user', $email, 1)->row()->user_id;

				if ($this->tes_user_model->count_by_user_tes($user_id, $query_tes->tes_id)->row()->hasil == 0) {
					// Menampilkan konfirmasi Tes
					$data['tes_id'] = $query_tes->tes_id;
					$data['nama'] = $this->access_tes->get_nama();
					$data['group'] = $this->access_tes->get_group();
					$data['url'] = $this->url;
					$data['tes_nama'] = $query_tes->tes_nama;
					$data['tes_poin'] = $query_tes->tes_score_right;
					$data['tes_max_score'] = $query_tes->tes_max_score;
					if ($query_tes->tes_token == 1) {
						$data['tes_token'] = '
							<tr style="height: 45px;">
								<td></td>
								<td style="vertical-align: middle;text-align: right;">Token : </td>
								<td style="vertical-align: middle;"><input type="text" name="token" id="token" autocomplete="off"></td>
								<td></td>
							</tr>
						';
					} else {
						$data['tes_token'] = '<input type="hidden" name="token" id="token">';
					}

					if ($data['tes_max_score'] > 0) {
						$this->template->display_tes($this->kelompok . '/tes_start_view', 'Mulai Tes', $data);
					} else {
						redirect('tes_dashboard');
					}
				} else {
					redirect('tes_dashboard');
				}
			} else {
				redirect('tes_dashboard');
			}
		} else {
			redirect('tes_dashboard');
		}
	}

	/**
	 * Memulai tes
	 * nilai status
	 * 		0 = gagal
	 * 		1 = sukses
	 * 		2 = gagal, halaman dikembalikan ke dashboard
	 */
	function mulai_tes()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tes-id', 'Tes', 'required|strip_tags');

		if ($this->form_validation->run() == TRUE) {
			$tes_id = $this->input->post('tes-id', TRUE);
			$token = $this->input->post('token', TRUE);

			$email = $this->access_tes->get_email();
			$user_id = $this->user_model->get_by_kolom_limit('email_user', $email, 1)->row()->user_id;

			$query_tes = $this->tes_model->get_by_kolom_limit('tes_id', $tes_id, 1);
			if ($query_tes->num_rows() > 0) {
				$query_tes = $query_tes->row();
				// Cek apakah tes sudah pernah dilakukan
				if ($this->tes_user_model->count_by_user_tes($user_id, $tes_id)->row()->hasil == 0) {
					// Mengecek apakah token di isi sesuai ketentuan tes
					$is_ok = 1;
					if ($query_tes->tes_token == 1) {
						if (empty($token)) {
							$is_ok = 0;
						} else {
							// pengecekan token apakah sesuai dengan yang dibuat operator
							$query_token = $this->tes_token_model->get_by_token_now_limit($token, 1);
							if ($query_token->num_rows() > 0) {
								$query_token = $query_token->row();

								// Mengecek token apakah dapat digunakan oleh semua TES
								if ($query_token->token_tes_id == 0) {
									// Jika token dapat digunakan oleh semua TES
									// token_aktif==1 maka berarti token aktif 1 hari
									if ($query_token->token_aktif == 1) {
										$data_tes['tesuser_token'] = $token;
									} else {
										if ($this->tes_token_model->count_by_token_lifetime($token, $query_token->token_aktif)->row()->hasil > 0) {
											$data_tes['tesuser_token'] = $token;
										} else {
											$is_ok = 0;
										}
									}
								} else {
									// Jika token hanya spesifik untuk salah satu Tes
									// token_aktif==1 maka berarti token aktif 1 hari
									if ($query_token->token_tes_id == $tes_id) {
										if ($query_token->token_aktif == 1) {
											$data_tes['tesuser_token'] = $token;
										} else {
											if ($this->tes_token_model->count_by_token_lifetime($token, $query_token->token_aktif)->row()->hasil > 0) {
												$data_tes['tesuser_token'] = $token;
											} else {
												$is_ok = 0;
											}
										}
									} else {
										$is_ok = 0;
									}
								}
							} else {
								$is_ok = 0;
							}
						}
					}
					if ($is_ok == 1) {
						// Mengecek apakah test mempunyai data soal
						if ($this->tes_topik_set_model->count_by_kolom('tset_tes_id', $query_tes->tes_id)->row()->hasil > 0) {
							// Memulai transaction mysql
							$this->db->trans_start();

							// 1. Memasukkan data ke test_user
							$data_tes['tesuser_tes_id'] = $tes_id;
							$data_tes['tesuser_user_id'] = $user_id;
							$data_tes['tesuser_status'] = 1;
							$data_tes['tesuser_creation_time'] = date('Y-m-d H:i:s');

							$tests_users_id = $this->tes_user_model->save($data_tes);

							// Mengambil data topik yang ada pada tes
							$query_subject_set = $this->tes_topik_set_model->get_by_kolom('tset_tes_id', $tes_id)->result();
							$i_soal = 0;
							// Mengambil data topik berdasarkan tes
							foreach ($query_subject_set as $subject_set) {
								// Mengambil data soal sesuai jumlah berdasarkan topik, tipe, dan kesulitan
								// Mengecek apakah soal diacak atau tidak
								// Soal yang tidak diacak, diurutkan berdasarkan soal_id
								if ($subject_set->tset_acak_soal == 1) {
									$query_soal = $this->soal_model->get_by_topik_tipe_kesulitan_select_limit($subject_set->tset_topik_id, $subject_set->tset_tipe, $subject_set->tset_difficulty, 'soal_id,soal_topik_id,soal_tipe', $subject_set->tset_jumlah);
								} else {
									$query_soal = $this->soal_model->get_by_topik_tipe_kesulitan_select_limit_tanpa_acak($subject_set->tset_topik_id, $subject_set->tset_tipe, $subject_set->tset_difficulty, 'soal_id,soal_topik_id,soal_tipe', $subject_set->tset_jumlah);
								}
								if ($query_soal->num_rows() > 0) {
									$query_soal = $query_soal->result();
									$insert_soal = array();
									foreach ($query_soal as $soal) {
										// Memasukkan data soal ke table tests_logs
										$data_soal['tessoal_tesuser_id'] = $tests_users_id;
										$data_soal['tessoal_soal_id'] = $soal->soal_id;
										//$data_soal['tessoal_nilai'] = 0;
										$data_soal['tessoal_nilai'] = $query_tes->tes_score_unanswered;
										$data_soal['tessoal_creation_time'] = date('Y-m-d H:i:s');
										$data_soal['tessoal_order'] = ++$i_soal;

										$insert_soal[] = $data_soal;
									}
									// menggunakan batch query langsung untuk mengehemat waktu dan memory
									$this->tes_soal_model->save_batch($insert_soal);

									// Mengambil data soal pada test_log 
									$query_test_log = $this->tes_soal_model->get_by_testuser_select($tests_users_id, $subject_set->tset_topik_id, 'tessoal_id, soal_id, soal_tipe')->result();
									foreach ($query_test_log as $test_log) {
										// Jika tipe soal pilihan ganda
										if ($test_log->soal_tipe == 1) {
											// Jika jawaban diacak 
											if ($subject_set->tset_acak_jawaban == 1) {
												// mendapatkan jawaban dari soal yang ada dengan diacak terlebih dahulu
												$query_jawaban = $this->jawaban_model->get_by_soal_limit($test_log->soal_id, $subject_set->tset_jawaban);
												// Jika jumlah jawaban lebih dari 0
												if ($query_jawaban->num_rows() > 0) {
													$query_jawaban = $query_jawaban->result();
													$i_jawaban = 0;
													$insert_jawaban = array();
													foreach ($query_jawaban as $jawaban) {
														// Menyimpan data soal
														$data_jawaban['soaljawaban_jawaban_id'] = $jawaban->jawaban_id;
														$data_jawaban['soaljawaban_order'] = ++$i_jawaban;
														$data_jawaban['soaljawaban_selected'] = 0;
														$data_jawaban['soaljawaban_tessoal_id'] = $test_log->tessoal_id;

														$insert_jawaban[] = $data_jawaban;
													}
													//insert batch
													$this->tes_soal_jawaban_model->save_batch($insert_jawaban);
												}
											} else {
												// Mendapatkan jawaban yang tidak diacak
												$query_jawaban = $this->jawaban_model->get_by_soal_tanpa_acak($test_log->soal_id);
												// Jika jumlah jawaban lebih dari 0
												if ($query_jawaban->num_rows() > 0) {
													$query_jawaban = $query_jawaban->result();
													$i_jawaban = 0;
													$insert_jawaban = array();
													foreach ($query_jawaban as $jawaban) {
														// Menyimpan data soal
														$data_jawaban['soaljawaban_jawaban_id'] = $jawaban->jawaban_id;
														$data_jawaban['soaljawaban_order'] = ++$i_jawaban;
														$data_jawaban['soaljawaban_selected'] = 0;
														$data_jawaban['soaljawaban_tessoal_id'] = $test_log->tessoal_id;

														$insert_jawaban[] = $data_jawaban;
													}
													//insert batch
													$this->tes_soal_jawaban_model->save_batch($insert_jawaban);
												}
											}
										}
									}
								}
							}
							// Menutup transaction mysql
							$this->db->trans_complete();

							$status['status'] = 1;
							$status['tes_id'] = $tes_id;
							$status['pesan'] = 'Pembuatan tes untuk user berhasil';
						} else {
							$status['status'] = 2;
							$status['pesan'] = '';
						}
					} else {
						$status['status'] = 0;
						$status['pesan'] = 'Silahkan cek Token yang dimasukkan !';
					}
				} else {
					$status['status'] = 2;
					$status['pesan'] = '';
				}
			} else {
				$status['status'] = 2;
				$status['pesan'] = '';
			}
		} else {
			$status['status'] = 0;
			$status['pesan'] = validation_errors();
		}

		echo json_encode($status);
	}

	/**
	 * Merubah password user tes
	 */
	function password()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password-old', 'Password Lama', 'required|strip_tags');
		$this->form_validation->set_rules('password-new', 'Password Baru', 'required|strip_tags');
		$this->form_validation->set_rules('password-confirm', 'Confirm Password', 'required|strip_tags');

		if ($this->form_validation->run() == TRUE) {
			$old = $this->input->post('password-old', TRUE);
			$new = $this->input->post('password-new', TRUE);
			$confirm = $this->input->post('password-confirm', TRUE);

			$email = $this->access_tes->get_email();

			if ($this->user_model->count_by_email_password($email, $old) > 0) {
				if ($new == $confirm) {
					$data['password_user'] = $new;

					$this->user_model->update('email_user', $email, $data);
					$status['status'] = 1;
					$status['error'] = '';
				} else {
					$status['status'] = 0;
					$status['error'] = 'Kedua password baru tidak sama';
				}
			} else {
				$status['status'] = 0;
				$status['error'] = 'Password Lama tidak Sesuai';
			}
		} else {
			$status['status'] = 0;
			$status['error'] = validation_errors();
		}

		echo json_encode($status);
	}

	/**
	 * Mendapatkan daftar tes yang dapat diikuti
	 */
	function get_datatable()
	{
		// variable initialization
		$search = "";
		$start = 0;
		$rows = 10;

		$ci = &get_instance();
		$group = $ci->session->userdata('user_grup_id');
		// $group = $this->access_tes->get_group();
		$query_grup = $this->user_grup_model->get_by_kolom_limit('grup_nama', $group, 1);
		$grup_id = 0;
		if ($query_grup->num_rows() > 0) {
			$grup_id = $query_grup->row()->grup_id;
		}

		$email = $this->access_tes->get_email();
		$query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
		$user_id = 0;
		if ($query_user->num_rows() > 0) {
			$user_id = $query_user->row()->user_id;
		}

		// get search value (if any)
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
			$search = $_GET['sSearch'];
		}

		// limit
		$start = $this->get_start();
		$rows = $this->get_rows();

		// run query to get user listing
		$query = $this->tesgrup_model->get_datatable($start, $rows, $group);
		$iFilteredTotal = $query->num_rows();

		$iTotal = $this->tesgrup_model->get_datatable_count($group)->row()->hasil;

		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
		);

		// get result after running query and put it in array
		$i = $start;
		$query = $query->result();
		foreach ($query as $temp) {
			$record = array();

			// Cek apakah tes yang terdaftar pada group memiliki soal sesuai topik yang ada
			if ($this->tes_topik_set_model->count_by_kolom('tset_tes_id', $temp->tes_id)->row()->hasil > 0) {
				$record[] = ++$i;
				$record[] = $temp->tes_nama;

				// Cek apakah sudah mengikuti tes tetapi belum selesai
				if ($this->tes_user_model->count_by_user_tes($user_id, $temp->tes_id)->row()->hasil > 0) {
					// Cek apakah sudah selesai atau belum, jika blum selesai maka tes bisa dilanjutkan
					$query_test_user = $this->tes_user_model->get_by_user_tes($user_id, $temp->tes_id)->row();

					// nilai kosong karena masih dalam pengerjaan
					// $record[] = '';

					// menampilkan nilai
					// Cek apakah tes yang selesai ditampilkan nilainya
					if ($temp->tes_results_to_users == 1) {
						$record[] = $this->tes_soal_model->get_nilai($query_test_user->tesuser_id)->row()->hasil;
					} else {
						$record[] = '';
					}

					// mengecek apakah detail tes ditampilkan
					if ($temp->tes_detail_to_users == 1) {
						$record[] = '<a href="' . site_url() . '/tes_hasil_detail/index/' . $query_test_user->tesuser_id . '" style="cursor: pointer;" class="btn btn-default btn-xs">Lihat Detail</a>';
					} else {
						$record[] = '';
					}
				} else {
					$record[] = '';
					$record[] = '<a href="' . site_url() . '/' . $this->url . '/konfirmasi_test/' . $temp->tes_id . '" style="cursor: pointer;" class="btn btn-primary btn-xs">Mulai Kerjakan Kuis</a>';
				}

				$output['aaData'][] = $record;
			}
		}
		// format it to JSON, this output will be displayed in datatable

		echo json_encode($output);
	}

	/**
	 * funsi tambahan 
	 * 
	 * 
	 */

	function get_start()
	{
		$start = 0;
		if (isset($_GET['iDisplayStart'])) {
			$start = intval($_GET['iDisplayStart']);

			if ($start < 0)
				$start = 0;
		}

		return $start;
	}

	function get_rows()
	{
		$rows = 10;
		if (isset($_GET['iDisplayLength'])) {
			$rows = intval($_GET['iDisplayLength']);
			if ($rows < 5 || $rows > 500) {
				$rows = 10;
			}
		}

		return $rows;
	}

	function get_sort_dir()
	{
		$sort_dir = "ASC";
		$sdir = strip_tags($_GET['sSortDir_0']);
		if (isset($sdir)) {
			if ($sdir != "asc") {
				$sort_dir = "DESC";
			}
		}

		return $sort_dir;
	}
}
