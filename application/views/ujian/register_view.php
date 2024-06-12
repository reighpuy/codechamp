<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Halaman Registrasi User</small>
        </h1>
    </section>

    <!-- Main content -->
    <form action="<?= site_url('auth/register') ?>" method="post">
        <section class="content">
            <div class="row">
                <!-- <?php echo form_open('auth/register', 'id="form-tambah"'); ?> -->
            </div>

            <div class="row">
                <div class="login-box" style="margin-bottom: 5px;">
                    <div class="login-logo">
                        <b>Register</b>
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">
                        <p class="login-box-msg">Masukkan Email dan Password untuk didaftarkan</p>
                        <div id="form-pesan"></div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="tambah-email" name="tambah-email" placeholder="Masukkan email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="tambah-password" name="tambah-password" placeholder="Masukkan Password">
                            <?= form_error('tambah-password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Masukkan Ulang Password">
                            <?= form_error('confirm_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="tambah-nama" name="tambah-nama" placeholder="Masukkan nama lengkap">
                            <?= form_error('tambah-nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="row">
                            <!-- <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                <input type="checkbox" id="show-password"> Perlihatkan Password
                                </label>
                            </div>
                        </div> -->
                            <div class="col-xs-12">
                                <center><button type="submit" id="tambah-simpan" class="btn btn-primary btn-block">Daftar</button></center>
                            </div><!-- /.col -->
                        </div>
                    </div><!-- /.login-box -->
                    <center><span>Sudah memiliki akun ?</span> <a href="<?php echo site_url(); ?>/auth">Masuk</a><br /><a href="<?= base_url('beranda'); ?>">Kembali ke halaman beranda</a></center>
                </div>
        </section><!-- /.content -->
    </form>
</div><!-- /.container -->

<script type="text/javascript">
    function showpassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(function() {
        $('#tambah-email').focus();

        $('#show-password').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $('#show-password').on('ifChanged', function(event) {
            showpassword();
        });

    });
</script>