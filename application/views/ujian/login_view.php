<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
            <small>Halaman Login User</small>
        </h1>
	</section>

	<!-- Main content -->
    <section class="content">
    	<div class="row">
    	<?php echo form_open('auth/login','id="form-login" class="form-horizontal"')?>
    	</div>
    	<div class="row">
    		<div class="login-box">
    			<div class="login-logo">
        			<b>Login User</b>
      			</div><!-- /.login-logo -->
      			<div class="login-box-body">
        			<p class="login-box-msg">Masukkan Email dan Password yang sudah terdaftar</p>
                <div id="form-pesan"></div>
          			<div class="form-group has-feedback">
            			<input type="email" id="email" autocomplete="off" name="email" class="form-control" placeholder="Masukkan Email"/>
          			</div>
          		<div class="form-group has-feedback">
            		<input type="password" id="password" autocomplete="off" name="password" class="form-control" placeholder="Masukkan Password"/>
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
		              	<center><button type="submit" class="btn btn-primary btn-block">Login</button></center>
		            </div><!-- /.col -->
	          	</div>
    		</div><!-- /.login-box -->
			<center><span>Belum memiliki akun ?</span> <a href="<?php echo site_url(); ?>/auth/register">Daftarkan akun</a><br/><a href="<?= site_url('beranda'); ?>">Kembali ke halaman beranda</a></center>
    	</div>
    </section><!-- /.content -->
</div><!-- /.container -->

<script type="text/javascript">
    function showpassword(){
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    $(function () {
        $('#email').focus(); 

        $('#show-password').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });  

        $('#show-password').on('ifChanged', function(event){
          showpassword();
        });
        
        $('#form-login').submit(function(){
          $("#modal-proses").modal('show');
            $.ajax({
              url:"<?= site_url(); ?>/auth/login",
     			    type:"POST",
     			    data:$('#form-login').serialize(),
     			    cache: false,
      		        success:function(respon){
         		    	var obj = $.parseJSON(respon);
      		            if(obj.status==1){
      		                window.open("<?php echo site_url(); ?>/tes_dashboard","_self");
          		        }else{
                            $('#form-pesan').html(pesan_err(obj.error));
                            $("#modal-proses").modal('hide');
                            $('#email').focus();
          		        }
         			}
      		});
            
      		return false;
        });
    });
</script>