<!-- Main content -->
<section class="content">
<p>
    <a href="<?php echo base_url('admin/pengguna') ?>" class="btn btn-success btn-md">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
        <div class="row">
            <div class="form-group">
                <?php if($pengguna->foto == null) { ?>
                    <img class="img-fluid pad" src="<?php echo base_url() ?>assets/image/cbrentcars2.png">
                <?php }else{ ?>
                    <img class="img-fluid pad" src="<?php echo base_url('assets/image/'.$pengguna->foto) ?>">
                <?php } ?>
            </div>
            <!-- /.form-group -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $pengguna->nama ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $pengguna->email ?>">
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>No Telpon</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $pengguna->no_telpon ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $pengguna->jenis_kelamin ?>">
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" disabled="disabled"><?php echo $pengguna->alamat ?></textarea>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.row -->
        </div>
    </div>
    <!-- /.card -->
</section>