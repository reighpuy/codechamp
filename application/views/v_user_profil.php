<?php 

    function test_print($key, $item2)
    {
        echo $item2+1;
    }

    $foundField = array_filter($leaderboard, function($field) {
        return $field->email_user == $this->access_tes->get_id();
        // return $field->nama_user == $this->access_tes->get_nama();
    });
    $encoded = json_decode(json_encode($foundField), true);

?>

<!-- jumbotron -->
<div class="jumbotron2 jumbotron-fluid index-jumbotron2 rellax" data-rellax-speed="-2">
  <div class="container">
    <h1 class="display-3 header-jumbotron2" data-aos="fade-right" data-aos-duration="1700">Profil Pengguna
    </h1>
    <p class="lead text-jumbotron" data-aos="fade-right" data-aos-duration="1700">Informasi pengguna CodeChamp</p>
  </div>
</div>
<!-- end jumbotron -->

<br>

<section class="wrapper">
<div class="contact-page-wrap section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card" style="width: 800px; height: 600px; margin: auto;">
                <?php foreach ($user as $usr) : ?>
                    <center><img src="<?= base_url('assets/img/img_user/' . $usr->foto_user); ?>" alt="" width="270" height="270" style="border-radius: 50%; margin-top: 10px; margin-bottom: 30px; border: 2px solid #5548ed"><p><b><?= $usr->nama_user; ?></b><br/>(<?= $usr->email_user; ?>)<br/><br/>
                    <?php if ($usr->exp_user > 30 && $usr->exp_user < 60 || $usr->exp_user == 30) { ?>
                        <i class="icon fa fa-star"></i> <b>Level 1</b> | <b>Exp</b> : <?= $usr->exp_user; ?>
                    <?php } else if ($usr->exp_user == 60 || $usr->exp_user > 60 && $usr->exp_user < 90) { ?>
                        <i class="icon fa fa-star"></i> <b>Level 2</b> | <b>Exp</b> : <?= $usr->exp_user; ?>
                    <?php } else if ($usr->exp_user == 90 || $usr->exp_user > 90 && $usr->exp_user < 130) { ?>
                        <i class="icon fa fa-star"></i> <b>Level 3</b> | <b>Exp</b> : <?= $usr->exp_user; ?>
                    <?php } else if ($usr->exp_user == 130 || $usr->exp_user > 130 && $usr->exp_user < 200) { ?>
                        <i class="icon fa fa-star"></i> <b>Level 4</b> | <b>Exp</b> : <?= $usr->exp_user; ?>
                    <?php } else if ($usr->exp_user == 200 || $usr->exp_user > 200) { ?>
                        <i class="icon fa fa-star"></i> <b>Level 5</b> (Maksimum) | <b>Exp</b> : <?= $usr->exp_user; ?>
                    <?php } else {?>
                        <i class="icon fa fa-star"></i> 0 | <?= $usr->exp_user; ?>
                    <?php } ?>
                <?php endforeach; ?>

                    <br/><i class="icon fa fa-list-ol"></i> <b>Peringkat</b> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= substr(array_walk($encoded, 'test_print'), 1, 1); ?>
                    <!-- <br/><i class="icon fa fa-medal"></i> Achievement</p></center> -->
                    <div class="col-md-6">
                        <a href="<?= site_url('user/edit_profile/' . $userid); ?>" class="btn btn-dark mt-3"><i class="fas fa-edit"></i> Ubah profil</a>
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