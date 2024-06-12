<!-- jumbotron -->
<div class="jumbotron2 jumbotron-fluid index-jumbotron2 rellax" data-rellax-speed="-2">
    <div class="container">
        <h2 class="display-3 header-jumbotron2" data-aos="fade-right" data-aos-duration="1700">Ubah profil pengguna
        </h2>
        <p class="lead text-jumbotron" data-aos="fade-right" data-aos-duration="1700">Halaman ubah profil pengguna pada Codechamp</p>
    </div>
</div>
<!-- end jumbotron -->

<br>

<section class="wrapper">
    <div class="contact-page-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card" style="width: 800px; height: 450px; margin: auto; padding: 20px;">
                        <?php foreach ($user as $us) : ?>

                            <form action="<?= site_url('user/edited_profile') ?>" enctype="multipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="hidden" name="user_id" value="<?= $us->user_id ?>">
                                            <input type="text" name="nama_user" class="form-control" value="<?= $us->nama_user ?>">
                                            <?= form_error('nama_user', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email_user" name="email_user" class="form-control" value="<?= $us->email_user ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ubah">
                                            <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Kosongkan jika tidak ingin ubah">
                                            <?= form_error('confirm_password', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto Pengguna</label>
                                        <br>
                                        <a href="<?= base_url() . 'assets/img/img_user/' . $us->foto_user ?>" target="_blank">
                                            <img src="<?= base_url() . 'assets/img/img_user/' . $us->foto_user ?>" width="150" height="150">
                                        </a>
                                        <input type="file" name="foto_user" class="form-control mt-3">
                                    </div>

                                    <div class="col-md-6">
                                        <a href="<?= site_url('user'); ?>" class="btn btn-warning mt-3">Kembali</a>
                                        <button type="reset" class="btn btn-danger mt-3"><i class="fas fa-undo"></i> Reset</button>
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>

                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>

<script>
    var rellax = new Rellax('.rellax');
</script>