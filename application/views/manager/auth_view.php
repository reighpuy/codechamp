<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
            <small>Halaman Login Tutor</small>
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
        			<b>Login Tutor</b>
      			</div><!-- /.login-logo -->
      			<div class="login-box-body">
        			<p class="login-box-msg">Masukkan Email dan Password yang sudah terdaftar</p>
                <div id="form-pesan"></div>
          			<div class="form-group has-feedback">
            			<input type="text" id="username" autocomplete="off" name="username" class="form-control" placeholder="Masukkan Username"/>
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
    	</div>
    </section><!-- /.content -->
</div><!-- /.container -->

    <div class="modal" id="modal-proses" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
                    Mohon tunggu sebentar...
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<script type="text/javascript">
    $(function () {
        $('#username').focus();   
        
        $('#btn-login').click(function(){
            $('#form-login').submit();
        });
        
        $('#form-login').submit(function(){
            $("#modal-proses").modal('show');
                $.ajax({
                    url:"<?php echo site_url(); ?>/manager/auth/login",
     			    type:"POST",
     			    data:$('#form-login').serialize(),
     			    cache: false,
      		        success:function(respon){
         		    	var obj = $.parseJSON(respon);
      		            if(obj.status==1){
      		                window.open("<?php echo site_url(); ?>/manager/dashboard","_self");
          		        }else{
                            $('#form-pesan').html(pesan_err(obj.error));
                            $("#modal-proses").modal('hide');
          		        }
         			}
      		});
            
      		return false;
        });    
    });
</script>