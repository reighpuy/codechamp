<!-- jumbotron -->
<div class="jumbotron2 jumbotron-fluid index-jumbotron2 rellax" data-rellax-speed="-2">
  <div class="container">
    <h1 class="display-3 header-jumbotron2" data-aos="fade-right" data-aos-duration="1700">Leaderboard
    </h1>
    <p class="lead text-jumbotron" data-aos="fade-right" data-aos-duration="1700">Peringkat Pengguna pada Codechamp</p>
  </div>
</div>
<!-- end jumbotron -->

<br>

<section class="wrapper">
<div class="contact-page-wrap section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card" style="width: auto; height: auto; margin: auto;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="3%">No.</th>
                            <th width="25%">Nama</th>
                            <th width="10%">Level</th>
                            <th width="10%">Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($user as $usrs) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $usrs->nama_user; ?></td>
                            <?php if ($usrs->exp_user == 30 || $usrs->exp_user > 30 && $usrs->exp_user < 60) { ?>
                                <td>Level 1</td>
                            <?php } else if ($usrs->exp_user == 60 || $usrs->exp_user > 60 && $usrs->exp_user < 90) { ?>
                                <td>Level 2</td>
                            <?php } else if ($usrs->exp_user == 90 || $usrs->exp_user > 90 && $usrs->exp_user < 130) { ?>
                                <td>Level 3</td>
                            <?php } else if ($usrs->exp_user == 130 || $usrs->exp_user > 130 && $usrs->exp_user < 200) { ?>
                                <td>Level 4</td>
                            <?php } else if ($usrs->exp_user == 200 || $usrs->exp_user > 200) { ?>
                                <td>Level 5 (Maksimum)</td>
                            <?php } else {?>
                                <td>-</td>
                            <?php } ?>
                            <td><?= $usrs->exp_user; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
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