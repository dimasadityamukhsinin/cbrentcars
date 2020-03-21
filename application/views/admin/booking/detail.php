<!-- Main content -->
<section class="content">
<p>
    <a href="<?php echo base_url('admin/mobil') ?>" class="btn btn-success btn-md">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
        <div class="row">
            <div class="form-group">
                <?php if($mobil->foto == null) { ?>
                    <img class="img-fluid pad" src="<?php echo base_url() ?>assets/image/cbrentcars2.png">
                <?php }else{ ?>
                    <img class="img-fluid pad" src="<?php echo base_url('assets/upload/image/'.$mobil->foto) ?>">
                <?php } ?>
            </div>
            <!-- /.form-group -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $mobil->nama ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Warna</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $mobil->warna ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" disabled="disabled" value="Rp.<?php echo number_format($mobil->harga,'0',',','.') ?>">
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
    </div>
    <!-- /.card -->
</section>