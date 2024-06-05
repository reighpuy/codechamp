<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Daftar Transaksi
		<small>Daftar transaksi yang belum selesai akan ditampilkan disini</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Daftar Transaksi</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">Daftar Transaksi</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="table-group" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="3%">No.</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Tanggal Berlangganan</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Status Transaksi</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($data_transaksi as $trans) : ?>
                                <?php if ($trans->status_transaksi != 3) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $trans->nama_user; ?></td>
                                    <td><?= $trans->harga; ?></td>
                                    <td><?= $trans->tgl_berlangganan; ?></td>
                                    <td><?= $trans->tgl_berakhir; ?></td>
                                    <?php if ($trans->status_transaksi == 1) { ?>
                                        <td>Belum Dibayar</td>
                                    <?php } else if ($trans->status_transaksi == 2) { ?>
                                        <td><a href="<?= site_url('manager/berlangganan/konfirmasi_transaksi/') . $trans->id_transaksi; ?>" class="btn btn-primary btn-xs">Konfirmasi Transaksi</a></td>
                                    <?php } else { ?>
                                        <td>Transaksi Selesai</td>
                                    <?php } ?>
                                    <?php if (empty($trans->bukti_pembayaran)) { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><a href="<?= base_url('assets/img/bukti_pembayaran/') . $trans->bukti_pembayaran; ?>" target="_blank"><img src="<?= base_url('assets/img/bukti_pembayaran/') . $trans->bukti_pembayaran; ?>" alt="Bukti Pembayaran" width="100" height="100"></a></td>
                                    <?php } ?>
                                    <td><a href="<?= site_url('manager/berlangganan/hapus_transaksi/' . $trans->id_transaksi); ?>" class="btn btn-danger btn-xs">Hapus</a></td>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</section><!-- /.content -->