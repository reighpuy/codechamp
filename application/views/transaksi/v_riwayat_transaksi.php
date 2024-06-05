<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
            <span style="font-size: 24px; color: #bbb">Halo, </span>
    		<?php if(!empty($nama)){ echo $nama; } ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url('tes_dashboard'); ?>">Ruang materi</a></li>
            <li class="active">Riwayat Transaksi</li>
        </ol>
	</section>

	<!-- Main content -->
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
            <h3 class="box-title">Riwayat Transaksi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="3%">No.</th>
                            <th width="25%">Harga</th>
                            <th width="20%">Mulai Berlangganan</th>
                            <th width="20%">Tanggal Berakhir</th>
                            <th width="20%">Status Transaksi</th>
                            <th width="20%">Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // $addoneday = 
                        foreach ($data_transaksi as $trans) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $trans->harga; ?></td>
                                <td><?= $trans->tgl_berlangganan; ?></td>
                                <td><?= $trans->tgl_berakhir; ?></td>
                                <?php if ($trans->status_transaksi == 1) { ?>
                                    <td>Belum Dibayar</td>
                                    <td><a href="<?= site_url('berlangganan/konfirmasi_pembayaran/') . $trans->id_transaksi; ?>" class="btn btn-primary btn-xs">Kirim Bukti Pembayaran</a></td>
                                <?php } else if ($trans->status_transaksi == 2) { ?>
                                    <td>Menunggu Konfirmasi</td>
                                    <td><a href="<?= base_url('assets/img/bukti_pembayaran/') . $trans->bukti_pembayaran; ?>" target="_blank"><img src="<?= base_url('assets/img/bukti_pembayaran/') . $trans->bukti_pembayaran; ?>" alt="Bukti Pembayaran" width="100" height="100"></a></td>
                                <?php } else { ?>
                                    <td>Transaksi Selesai</td>
                                    <td><a href="<?= base_url('assets/img/bukti_pembayaran/') . $trans->bukti_pembayaran; ?>" target="_blank"><img src="<?= base_url('assets/img/bukti_pembayaran/') . $trans->bukti_pembayaran; ?>" alt="Bukti Pembayaran" width="100" height="100"></a></td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <a href="<?= site_url('tes_dashboard'); ?>" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
    </section><!-- /.content -->
</div><!-- /.container -->