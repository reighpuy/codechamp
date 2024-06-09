<!-- Main content -->
<section class="content">
    <center><img src="<?= base_url('assets/img') ?>/codechamplogo.png" alt="logo" width="50" />
    <h1>
        <span style="font-size: 24px;">Bukti berlangganan</span><span style="font-size: 24px;"> pada aplikasi Codechamp</span>
    </h1></center>
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Bukti Berlangganan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="3%">No.</th>
                        <th width="15%">Nama</th>
                        <th width="10%">Harga</th>
                        <th width="20%">Mulai Berlangganan</th>
                        <th width="20%">Tanggal Berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // $addoneday = 
                    foreach ($data_transaksi as $trans) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= format_rupiah($trans->harga); ?></td>
                            <td><?= $trans->tgl_berlangganan; ?></td>
                            <td><?= $trans->tgl_berakhir; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <span style="font-size: 20px;">Terimakasih sudah mempercayakan layanan kami, silahkan berlangganan kembali bulan selanjutnya!</span>
</section><!-- /.content -->

<script type="text/javascript">
    window.print();
</script>