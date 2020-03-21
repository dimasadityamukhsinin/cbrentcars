<!-- Main content -->
<section class="content">
<p>
    <a href="<?php echo base_url('admin/info') ?>" class="btn btn-success btn-md">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
        <div class="row">
            <div class="form-group">
                <?php if($info->foto == null) { ?>
                    <img class="img-fluid pad" src="<?php echo base_url() ?>assets/image/cbrentcars2.png">
                <?php }else{ ?>
                    <img class="img-fluid pad" src="<?php echo base_url('assets/upload/image/'.$info->foto) ?>">
                <?php } ?>
            </div>
            <!-- /.form-group -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $info->judul ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $info->deskripsi ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Isi</label>
                    <textarea class="form-control" disabled="disabled"><?php echo $info->isi ?></textarea>
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