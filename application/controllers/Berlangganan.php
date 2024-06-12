<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berlangganan extends Tes_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {

        $email = $this->access_tes->get_email();
        $query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
        if ($query_user->num_rows() > 0) {
            $id = $query_user->row()->user_id;
        }

        $data['group'] = $this->user_model->get_usr($id);

        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();

        $data['tdydate'] = date('Y-m-d');
        $data['next_due_date'] = date('Y-m-d', strtotime($data['tdydate'] . ' +30 days'));

        $this->load->view('templates_beranda/nav_berlangganan');
        $this->load->view('v_berlangganan', $data);
        $this->load->view('templates_beranda/footer_berlangganan');
    }

    function riwayat_transaksi()
    {

        $email = $this->access_tes->get_email();
        $query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
        if ($query_user->num_rows() > 0) {
            $id = $query_user->row()->user_id;
        }
        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();

        $data['data_transaksi'] = $this->user_model->get_transaksi_user($id);

        $this->template->display_user('transaksi' . '/v_riwayat_transaksi', 'Riwayat Transaksi', $data);
    }

    function mulai_berlangganan()
    {

        $email = $this->access_tes->get_email();
        $query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
        if ($query_user->num_rows() > 0) {
            $data['user_id'] = $query_user->row()->user_id;
        }

?>
        <script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>

        <head>
            <style>
                body {
                    font-family: "Nunito", Helvetica, Arial, sans-serif;
                }
            </style>
        </head>

        <body></body>
        <?php

        $tdydate = date('Y-m-d');
        $next_due_date = date('Y-m-d', strtotime($tdydate . ' +30 days'));
        $data['harga'] = 35000;
        $data['tgl_berlangganan'] = $tdydate;
        $data['tgl_berakhir'] = $next_due_date;
        $data['status_transaksi'] = 1;

        $this->db->insert('transaksi', $data);
        ?>
        <script>
            Swal({
                title: 'Berlangganan',
                type: 'success',
                text: 'Anda berhasil memulai transaksi!\nSilahkan konfirmasi pembayaran anda.'
            }).then((result => {
                window.location = '<?= site_url('berlangganan/riwayat_transaksi') ?>';
            }))
        </script>;
    <?php

    }

    function pembayaran_print()
    {
        $email = $this->access_tes->get_email();
        $query_user = $this->user_model->get_by_kolom_limit('email_user', $email, 1);
        if ($query_user->num_rows() > 0) {
            $id = $query_user->row()->user_id;
        }

        $isi['nama'] = $this->access_tes->get_nama();
        $isi['email'] = $this->access_tes->get_email();

        $isi['data_transaksi'] = $this->user_model->get_transaksi_user($id);

        $isi['judul'] = 'Bukti Berlangganan';
        $this->template->display_user('transaksi' . '/v_berlangganan_print', 'Bukti Berlangganan', $isi);
        // $this->load->view('transaksi/v_berlangganan_print', $isi);
    }

    public function konfirmasi_pembayaran($id)
    {

        $data['id_transaksi'] = $id;
        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();

        $data['data_transaksi'] = $this->user_model->get_transaksi_by_id($id);

        $this->load->view('templates_beranda/nav_berlangganan', $data);
        $this->load->view('v_konfirmasi_pembayaran', $data);
        $this->load->view('templates_beranda/footer');
    }

    public function konfirmasi_pembayaran_simpan()
    {
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

        $id = $this->input->post('id_transaksi');

        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

        $config['upload_path'] = './assets/img/bukti_pembayaran';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
        ?>
            <script>
                Swal({
                    title: 'Gagal',
                    type: 'error',
                    text: 'Bukti Pembayaran gagal di-Upload!'
                }).then((result => {
                    window.location = '<?= site_url('berlangganan/konfirmasi_pembayaran/' . $id) ?>';
                }))
            </script>;
        <?php
            return;
        } else {
            $bukti_pembayaran = $this->upload->data('file_name');
        }

        $data = array(
            'bukti_pembayaran' => $bukti_pembayaran,
            'status_transaksi' => 2
        );

        $where = array(
            'id_transaksi' => $id
        );

        $this->user_model->edit_data_transaksi('transaksi', $data, $where);

        ?>
        <script>
            Swal({
                title: 'Bukti Pembayaran',
                type: 'success',
                text: 'Berhasil mengunggah bukti pembayaran!'
            }).then((result => {
                window.location = '<?= site_url('berlangganan/riwayat_transaksi') ?>';
            }))
        </script>;
<?php

        // echo "<script>window.location='" . site_url('tes_dashboard') . "';</script>";
    }
}
