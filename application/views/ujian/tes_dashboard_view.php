<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
            <span style="font-size: 24px; color: #bbb">Halo, </span>
    		<?php if(!empty($nama)){ echo $nama; } ?>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#">Home</a></li>
            <li class="active">Ruang Materi</li>
        </ol>
	</section>

	<!-- Main content -->
    <section class="content">
		<?php
			if(!empty($informasi)){
				?>
				<div class="callout callout-info">
                    <h4>Informasi</h4>
                    <?php 
					echo $informasi
					?>
                </div>
				<?php
			}else{
				?>
				<div class="callout callout-info">
					<h4>Informasi pengerjaan</h4>
					<p>Silahkan pilih Materi yang ingin dikerjakan.<br/>Materi yang sudah anda kerjakan, akan bisa dilihat kembali hasil pengerjaan nya.</p>
				</div>
				<?php
			}
		?>
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Materi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="table-tes" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="all">Tes</th>
                            <th>Status</th>
                            <th class="all">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>   
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.container -->

<script type="text/javascript">
    $(function () {
        $('#table-tes').DataTable({
                  "paging": true,
                  "iDisplayLength":25,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": false,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"250px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"250px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"100px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,
                  "responsive": true
         });   
    });
</script>