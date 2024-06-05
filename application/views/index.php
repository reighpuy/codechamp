<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid index-jumbotron rellax" data-rellax-speed="-2">
  <div class="container">
    <h1 class="display-3 header-jumbotron" data-aos="fade-right" data-aos-duration="1700">CodeChamp
    </h1>
    <p class="lead text-jumbotron" data-aos="fade-right" data-aos-duration="1700">Layanan Kursus Online Berbahasa Indonesia</p>
    <div class="center-container">
      <a href="https://github.com/xionnx/codechamp" target="_blank" title="Kunjungi GitHub CodeChamp"><i class="lni lni-github-original lni-custom-style" data-aos="fade-right" data-aos-duration="1700"></i></a>
      <a href="<?= base_url('#materikursus'); ?>" title="Lihat Materi Kursus"><i class="fa fa-book fa-custom-style" style="margin-left: 10px;" data-aos="fade-right" data-aos-duration="1700"></i></a>
    </div>
  </div>
</div>
<!-- end jumbotron -->
<br><br><br>

<!-- title -->
<div class="row" id="materikursus">
  <div class="col-md-10 container mt-5"><br><br>
    <h2 class="title text-center" data-aos="fade-down" data-aos-duration="1500" style="margin-bottom: 100px; margin-top: 100px;">Materi Kursus Tersedia</h2>
  </div>
</div>
<br>

<div class="row">
  <div class="owl-carousel mt-3 container owl-theme">
    <div class="b-game-card item" data-aos="fade-up" data-aos-duration="1200">
      <div class="b-game-card__cover" title="HTML" style="background-image: url(assets/img/courses/html_img.png);"></div>
    </div>
    <div class="b-game-card item" data-aos="fade-up" data-aos-duration="1200">
      <div class="b-game-card__cover" title="CSS" style="background-image: url(assets/img/courses/css_img.png);"></div>
    </div>
    <div class="b-game-card item" data-aos="fade-up" data-aos-duration="1200">
      <div class="b-game-card__cover" title="Javascript" style="background-image: url(assets/img/courses/js_img.png);"></div>
    </div>
    <div class="b-game-card item" data-aos="fade-up" data-aos-duration="1200">
      <div class="b-game-card__cover" title="Git" style="background-image: url(assets/img/courses/git_img.png);"></div>
    </div>
    <div class="b-game-card item" data-aos="fade-up" data-aos-duration="1200">
      <div class="b-game-card__cover" title="PHP" style="background-image: url(assets/img/courses/php_img.png);"></div>
    </div>
    <div class="b-game-card item" data-aos="fade-up" data-aos-duration="1200">
      <div class="b-game-card__cover" title="Bootstrap" style="background-image: url(assets/img/courses/bootstrap_img.png);"></div>
    </div>
  </div>
</div>

<!-- title -->
<div class="row" id="tentang">
  <div class="col-md-10 container mt-5">
    <h2 class="title text-center" data-aos="fade-down" data-aos-duration="1500" style="margin-top: 150px;">Mengenai CodeChamp</h2>
  </div>
</div>
<br>

<section class="wrapper">
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-6" data-aos-duration="1500" data-aos="fade-right">
        <img src="<?= base_url('assets/') ?>img/coding.png" style="border: 2px solid #5548ed; border-radius: 20px;" class="img-fluid" alt="" srcset="">
      </div>
      <div class="col-md-6 my-auto" data-aos-duration="1500" data-aos="fade-left">
        <h1 class="title mt-3">Apa itu CodeChamp ?</h1>
        <p class="text-section"><span style="font-size: 18px; color: #5548ed;">CodeChamp adalah Layanan Kursus Online Berbahasa Indonesia.</span><br>Materi kursus yang kami sediakan berfokuskan pada Web Development, jika anda berminat untuk mempelajari mengenai Web Development. Daftar sekarang juga secara gratis!</p>
        <a href="<?= base_url('auth/register') ?>"><button class="btn btn-daftar">Daftarkan akun sekarang juga!</button></a>
      </div>
    </div>
  </div>
</section>

<!-- title -->
<div class="row" id="daftarfitur" style="margin-top: 200px;">
  <div class="col-md-10 container mt-5">
    <h2 class="title text-center" data-aos="fade-down" data-aos-duration="1500">Apa saja yang bisa dilakukan di CodeChamp</h2>
  </div>
</div>
<br>

<section class="wrapper">
  <div class="container">
    <div class="row mt-3">
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-light card-has-bg click-col" data-aos="fade-up" data-aos-duration="1500">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <i class="fa fa-book fa-custom-style"></i>
              <h4 class="card-title mt-0">Terdapat Informasi Materi</h4>
              <small class="text-light">Pengguna disediakan informasi mengenai banyak materi Web Development, seperti misalnya bahasa pemrograman seperti Javascript, PHP. Hypertext Language seperti HTML, hingga framework seperti Bootstrap, Codeigniter, dan sebagainya.</small>
            </div>
            <div class="card-footer">
              <div class="media">
                <img class="mr-3" src="<?= base_url('assets/') ?>img/codechamplogo.png" width="40" alt="Codechamp Logo">
                <div class="media-body">
                  <h6 class="my-0 text-light d-block">CodeChamp</h6>
                  <small class="text-light">Layanan Kursus Online</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-light card-has-bg click-col" data-aos="fade-up" data-aos-duration="1500">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <i class="fa fa-pen-square fa-custom-style"></i>
              <h4 class="card-title mt-0">Terdapat Fitur Mengerjakan Materi</h4>
              <small class="text-light">Pengguna dapat mengerjakan materi kursus yang diinginkan, dan pengguna dapat melihat hasil pengerjaannya kapanpun.</small>
            </div>
            <div class="card-footer">
              <div class="media">
                <img class="mr-3" src="<?= base_url('assets/') ?>img/codechamplogo.png" width="40" alt="Codechamp Logo">
                <div class="media-body">
                  <h6 class="my-0 text-light d-block">CodeChamp</h6>
                  <small class="text-light">Layanan Kursus Online</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card text-light card-has-bg click-col" data-aos="fade-up" data-aos-duration="1500">
          <div class="card-img-overlay d-flex flex-column">
            <div class="card-body">
              <i class="fa fa-newspaper fa-custom-style"></i>
              <h4 class="card-title mt-0">Terdapat Fitur Berita</h4>
              <small class="text-light">Pengguna akan diperlihatkan berita - berita yang tentunya mengenai Web Development!</small>
            </div>
            <div class="card-footer">
              <div class="media">
                <img class="mr-3" src="<?= base_url('assets/') ?>img/codechamplogo.png" width="40" alt="Codechamp Logo">
                <div class="media-body">
                  <h6 class="my-0 text-light d-block">CodeChamp</h6>
                  <small class="text-light">Layanan Kursus Online</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>

<script>
  var rellax = new Rellax('.rellax');
</script>