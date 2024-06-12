<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?php if (!empty($site_names)) {
            echo $site_names;
          } ?> | <?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content='width=device-width, initial-scale=0.9, minimum-scale=0.1, maximum-scale=10, user-scalable=yes' name='viewport'>
  <meta name="description" content="Codechamp">
  <meta name="keywords" content="Codechamp">
  <meta name="author" content="Reighpuy">
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="<?php echo base_url(); ?>public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <!-- Theme style -->
  <link href="<?php echo base_url(); ?>public/plugins/adminlte/css/AdminLTE.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link href="<?php echo base_url(); ?>public/plugins/adminlte/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

  <link href="<?php echo base_url(); ?>public/plugins/pnotify/pnotify.custom.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>public/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url(); ?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>public/plugins/adminlte/js/app.min.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>public/app.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.reload.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>public/plugins/pnotify/pnotify.custom.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/app.js" type="text/javascript"></script>

  <!-- membuat gambar responsive pada soal -->
  <style type="text/css">
    #isi-tes-soal img {
      display: block;
      max-width: 100%;
      height: auto;
    }
  </style>

  <script type="text/javascript">
    function notify_success(pesan) {
      new PNotify({
        title: 'Berhasil',
        text: pesan,
        type: 'success',
        history: false,
        delay: 2000
      });
    }

    function notify_info(pesan) {
      new PNotify({
        title: 'Informasi',
        text: pesan,
        type: 'info',
        history: false,
        delay: 2000
      });
    }

    function notify_error(pesan) {
      new PNotify({
        title: 'Error',
        text: pesan,
        type: 'error',
        history: false,
        delay: 2000
      });
    }
  </script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="skin-green layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url(); ?>" class="navbar-brand"> <b><?php if (!empty($site_names)) {
                                                                            echo $site_names;
                                                                          } ?></b></a>
          </div>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- <ul class="nav navbar-nav">
                    <li><a href="#"><span id="timestamp"></span></a></li>
                  </ul> -->
              <!-- <?php foreach ($groups as $grp) : ?> -->

              <?php $ci = &get_instance();
                      if ($ci->session->userdata('user_grup_id') == 1) { ?>
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="<?= site_url('berlangganan/index'); ?>" class="dropdown-toggle">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">Berlangganan sekarang</span>
                  </a>
                </li>
              <?php } ?>
              <!-- <?php endforeach; ?> -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="<?= site_url('user/leaderboard'); ?>" class="dropdown-toggle">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Lihat Peringkat</span>
                </a>
              </li>
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="<?= site_url('berlangganan/riwayat_transaksi'); ?>" class="dropdown-toggle">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Riwayat Transaksi</span>
                </a>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <?php foreach ($userinfo as $user) : ?>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url('assets/img/img_user/' . $user->foto_user); ?>" class="user-image" alt="User Image" />
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?php if (!empty($nama)) {
                                              echo $nama;
                                            } else {
                                              echo 'User';
                                            } ?></span>
                  </a>
                <?php endforeach; ?>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header" style="max-height: 90px;">
                    <p>
                      <?php if (!empty($nama)) {
                        echo $nama;
                      } else {
                        echo 'User';
                      } ?>
                      <?php if (!empty($group)) {
                        $ci = &get_instance();
                        if ($ci->session->userdata('user_grup_id') == "1") {
                          echo '<br/><span style="color: lightgreen;">Tipe</span> : Gratis';
                        } elseif ($ci->session->userdata('user_grup_id') == "2") {
                          echo '<br/><span style="color: lightgreen;">Tipe</span> : Berlangganan';
                        } else {
                          echo '<br/><span style="color: lightgreen;">Tipe</span> : ?';
                        }
                      } ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                          <a href="<?= site_url(); ?>/user" class="btn btn-default btn-flat">Profil</a>
                          <a data-toggle="modal" href="#modal-password" class="btn btn-default btn-flat">Ganti Password</a>
                        </div> -->
                    <div class="pull-left">
                      <a href="<?= site_url('user'); ?>" class="btn btn-default btn-flat">Lihat Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= site_url('/auth/logout'); ?>" class="btn btn-default btn-flat">Sign Out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <?php
      if (!empty($content)) {
        echo $content;
      }
      ?>
    </div><!-- /.content-wrapper -->
    <footer class="main-footer no-print">
      <!-- <div class="pull-right hidden-xs">
          <?php if (!empty($nama)) {
            echo $nama;
          } ?> | <strong> <a href="<?php echo site_url(); ?>/auth/logout" >Log out</a></strong>
        </div> -->
      <div class="container">
        <strong>&copy; 2024 Codechamp</strong>
      </div><!-- /.container -->
    </footer>
  </div><!-- ./wrapper -->

  <div class="modal" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <?php echo form_open('tes_dashboard/password', 'id="form-password"') ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Password</h4>
        </div>
        <div class="modal-body">
          <span id="form-pesan-password"></span>
          <div class="box-body">
            <div class="form-group">
              <label>Old Password</label>
              <input type="password" class="form-control" id="password-old" name="password-old" placeholder="Old Password">
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control" id="password-new" name="password-new" placeholder="New Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Confirm Password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="password-submit">Ubah Password</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <?php echo form_close(); ?>
  </div><!-- /.modal -->

  <div class="modal" id="modal-proses" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div style="text-align: center;">
            <img width="50" src="<?php echo base_url(); ?>public/images/loading.gif" /> <br />Data Sedang diproses...
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <script type="text/javascript">
    $(function() {
      var serverTime = <?php if (!empty($timestamp)) {
                          echo $timestamp;
                        } ?>;
      var counterTime = 0;
      var date;

      setInterval(function() {
        date = new Date();

        serverTime = serverTime + 1;

        date.setTime(serverTime * 1000);
        time = date.toLocaleTimeString();
        $("#timestamp").html(time);
      }, 1000);

      $('#modal-password').on('shown.bs.modal', function(e) {
        $('#form-pesan-password').html('');
        $('#password-old').val('');
        $('#password-new').val('');
        $('#password-confirm').val('');
        $('#password-old').focus();
      });

      $('#form-password').submit(function() {
        $.ajax({
          url: "<?php echo site_url(); ?>/tes_dashboard/password",
          type: "POST",
          data: $('#form-password').serialize(),
          cache: false,
          success: function(respon) {
            var obj = $.parseJSON(respon);
            if (obj.status == 1) {
              $('#form-pesan-password').html('');
              $('#modal-password').modal('hide');
              notify_success('Password berhasil diubah');
            } else {
              $('#form-pesan-password').html(pesan_err(obj.error));
            }
          }
        });
        return false;
      });
    });
  </script>


</body>

</html>