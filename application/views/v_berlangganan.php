<!-- jumbotron -->
<div class="jumbotron2 jumbotron-fluid index-jumbotron2 rellax" data-rellax-speed="-2">
    <div class="container">
        <h1 class="display-3 header-jumbotron2" data-aos="fade-right" data-aos-duration="1700">CodeChamp
        </h1>
        <p class="lead text-jumbotron" data-aos="fade-right" data-aos-duration="1700">Layanan Kursus Online Berbahasa Indonesia</p>
    </div>
</div>
<!-- end jumbotron -->

<!-- title -->
<div class="row" id="daftarfitur">
    <div class="col-md-10 container mt-5">
        <h2 class="title text-center" data-aos="fade-down" data-aos-duration="1500">Berlangganan sekarang juga!</h2>
    </div>
</div>
<br>

<section class="wrapper">
    <div class="contact-page-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card bg-light" style="width: 600px; height: 300px; margin: auto;">
                        <div class="card-body">
                            <form action="<?= site_url('berlangganan/mulai_berlangganan') ?>" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id_transaksi" value="">
                                    <table>
                                        <?php foreach ($group as $grp) : ?>
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
                                                <td class="pr-3">: IDR 35.000</td>
                                            </tr>
                                            <tr>
                                                <td class="pr-3">Mulai Berlangganan</td>
                                                <td class="pr-3">: <?= $tdydate; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pr-3">Tanggal Berakhir</td>
                                                <td class="pr-3">: <?= $next_due_date; ?></td>
                                            </tr>

                                    </table>
                                    <br>
                                </div>
                                <?php if ($grp->user_grup_id == 1) { ?>
                                    <center><button type="submit" class="btn btn-sm btn-primary mt-3 float-center">
                                            Mulai Berlangganan
                                        </button></center>
                                <?php } else { ?>
                                    <center><button type="submit" class="btn btn-sm btn-primary mt-3 float-center" disabled>
                                            Sedang Berlangganan
                                        </button></center>
                                <?php } ?>
                            <?php endforeach; ?>
                            </form>
                        </div>

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