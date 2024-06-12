<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Berlangganan extends Member_Controller
{
    private $kode_menu = 'daftar-transaksi';
    private $kelompok = 'transaksi';
    private $url = 'manager/berlangganan';

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_grup_model');
        $this->load->model('user_model');

        // parent::cek_akses($this->kode_menu);
    }

    function update_userdata()
    {
        $id = $this->access_tes->get_user_id();
        $update_tipe = $this->db->query("SELECT * FROM cc_user WHERE user_id='$id'")->result();
        $update_tipe = json_decode(json_encode($update_tipe), true);
        print_r($update_tipe);
        $this->session->set_userdata('user_grup_id', $update_tipe[0]['user_grup_id']);
        $this->session->set_userdata('tes_group', $update_tipe[0]['tes_group']);
    }

    function index()
    {
        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();

        $data['data_transaksi'] = $this->user_model->get_transaksi_all();

        $this->template->display_admin($this->kelompok . '/v_daftar_transaksi', 'Daftar Transaksi', $data);
    }

    function daftar_transaksi()
    {
        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();

        $data['data_transaksi'] = $this->user_model->get_transaksi_all();

        $this->template->display_admin($this->kelompok . '/v_daftar_transaksi', 'Daftar Transaksi', $data);
    }

    function riwayat_transaksi()
    {

        $data['nama'] = $this->access_tes->get_nama();
        $data['email'] = $this->access_tes->get_email();

        $data['data_transaksi'] = $this->user_model->get_transaksi_all();

        $this->template->display_admin($this->kelompok . '/v_riwayat_transaksi_admin', 'Daftar Transaksi', $data);
    }

    public function konfirmasi_transaksi($id)
    {
?>

        <head>
            <script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
            <style>
                body {
                    font-family: "Nunito", Helvetica, Arial, sans-serif;
                }
            </style>
        </head>

        <body></body>
        <?php

        $data['id_transaksi'] = $id;
        $data['data_transaksi'] = $this->user_model->get_transaksi_by_id($id);

        $data = array(
            'status_transaksi' => 3
        );

        $where = array(
            'id_transaksi' => $id
        );

        $emails = $this->db->query("SELECT email_user FROM cc_user JOIN transaksi ON transaksi.user_id = cc_user.user_id WHERE id_transaksi=$id")->result_array();
        // print_r($emails[0]);
        $email = implode($emails[0]);

        ?>
        <script>
            Swal({
                title: "Konfirmasi Transaksi",
                text: "Yakin ingin mengkonfirmasi transaksi ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Konfirmasi Transaksi",
                cancelButtonText: "Batal",
                allowEscapeKey: false,
                allowOutsideClick: false
            }).then((result) => {
                console.log(result);
                if (result.value) {
                    <?php
                    $this->db->query("UPDATE cc_user SET user_grup_id=2 WHERE email_user='$email'");
                    $this->user_model->edit_data_transaksi('transaksi', $data, $where);
                    // redirect('manager/berlangganan');
                    ?>
                    window.location = "<?= site_url('manager/berlangganan'); ?>";
                } else if (result.dismiss) {
                    window.location = "<?= site_url('manager/berlangganan/riwayat_transaksi'); ?>";
                }
            });
        </script>
    <?php
        // redirect('manager/berlangganan');

    }

    public function hapus_transaksi($id)
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

        ?>
        <script>
            Swal({
                title: "Hapus Transaksi",
                text: "Yakin ingin menghapus transaksi ini?",
                type: "warning",
                showDenyButton: true,
                confirmButtonColor: "#3085d6",
                denyButtonColor: "#d33",
                confirmButtonText: "Konfirmasi Transaksi",
                denyButtonText: "Batal",
            }).then((result) => {
                if (result.value) {
                    <?php
                    $where = array('id_transaksi' => $id);
                    $this->user_model->hapus_data_transaksi($where, 'transaksi');
                    redirect('manager/berlangganan/riwayat_transaksi');
                    ?>
                } else if (result.dismiss) {
                    redirect('manager/berlangganan/riwayat_transaksi');
                }
            });
        </script>;
<?php

        // redirect('manager/berlangganan');
    }
}
