<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?php if(!empty($site_names)){ echo $site_names; } ?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/manager"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">Konfigurasi System</div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <b><u>Waktu Server</u></b>
                    <br />
                    <b><?php if(!empty($waktu_server)){ echo $waktu_server; } ?></b>
                    <br />
                    Pastikan waktu server sesuai dengan waktu saat ini. Jika ada perbedaan, cek timezone server dan timezone di konfigurasi PHP.
                </div>
                <div class="col-md-4">
                    <b><u>Informasi Konfigurasi Upload PHP</u></b>
                    <br />
                    POST_MAX_SIZE = <?php if(!empty($post_max_size)){ echo $post_max_size; } ?>
                    <br />
                    UPLOAD_MAX_FILESIZE = <?php if(!empty($upload_max_filesize)){ echo $upload_max_filesize; } ?>
                </div>
                <div class="col-md-4">
                    <b><u>Folder Upload</u></b>
                    <br />
                    Folder "uploads" = <?php if(!empty($dir_public_uploads)){ echo $dir_public_uploads; } ?>
                    <br />
                    Folder "public/uploads" = <?php if(!empty($dir_uploads)){ echo $dir_uploads; } ?>
                    <br />
                    Pastikan kedua folder diatas memiliki nilai Writeable.
                </div>
            </div>
            <p>
            </p>
        </div>
    </div>
    <div class="box box-success box-solid">
		<div class="box-header with-border">
        	<h3 class="box-title">Petunjuk Penggunaan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        	<dl>
        		<dt>Data Materi</dt>
                <dd>
                	Kelompok Data Materi digunakan untuk menambah kategori materi dan soal materi.
                	<ol>
                		<li>Kategori Materi</li>
                		<li>Soal Materi</li>
                		<li>Import Soal Word</li>
						<li>Import Soal Spreadsheet</li>
                		<li>Daftar Soal Materi</li>
                		<li>File Manager</li>
                	</ol>
                </dd>
                <dt>Data Pengguna</dt>
                <dd>
                	Kelompok Data Pengguna digunakan untuk mengatur Pengguna, dan Tipe-nya.
                	<ol>
                		<li>Daftar Group</li>
                		<li>Daftar Peserta</li>
                		<li>Import Data Peserta</li>
						<li>Cetak Kartu</li>
                	</ol>
                <dt>Tool</dt>
                <dd>
                    Kelompok Tool digunakan untuk membackup database, file pedukung soal, dan Export Import Data Soal
                    <ol>
                        <li>Backup Data</li>
                        <li>Export Import Soal</li>
                    </ol>
                </dd>
            </dl>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->