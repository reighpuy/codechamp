<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid index-jumbotron rellax" data-rellax-speed="-2">
    <div class="container">
        <h1 class="display-3 header-jumbotron" data-aos="fade-right" data-aos-duration="1700">CodeChamp
        </h1>
        <p class="lead text-jumbotron" data-aos="fade-right" data-aos-duration="1700">Layanan Kursus Online Berbahasa Indonesia</p>
    </div>
</div>
<!-- end jumbotron -->

<!-- title -->
<div class="row" id="daftarfitur">
    <div class="col-md-10 container mt-5">
        <h2 class="title text-center" data-aos="fade-down" data-aos-duration="1500">Konfirmasi Pembayaran Anda</h2>
    </div>
</div>
<br>

<center>
    <section class="wrapper">
        <div class="contact-page-wrap section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="card bg-light" style="width: 600px; height: 350px; margin: auto;">
                            <div class="card-body">
                                <form action="<?= site_url('berlangganan/konfirmasi_pembayaran_simpan') ?>" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                        <h5 class="mb-3">Unggah Bukti Pembayaran</h5>
                                        <table>
                                            <tr>
                                                <td class="pr-3">Nama</td>
                                                <td class="pr-3">: <?= $nama; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pr-3">Email</td>
                                                <td class="pr-3">: <?= $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pr-3">Harga</td>
                                                <td class="pr-3">: <?= format_rupiah($data_transaksi->harga); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pr-3">Tanggal Berlangganan</td>
                                                <td class="pr-3">: <?= $data_transaksi->tgl_berlangganan; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pr-3">Tanggal Berakhir</td>
                                                <td class="pr-3">: <?= $data_transaksi->tgl_berakhir; ?></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <input type="file" name="bukti_pembayaran" style="border: 1px solid #ccc; padding: 5px; border-radius: 5px;" required>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary mt-3 float-right">
                                        <i class="fa fa-upload"></i> Unggah
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</center>


<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>

<script>
    var rellax = new Rellax('.rellax');
</script>