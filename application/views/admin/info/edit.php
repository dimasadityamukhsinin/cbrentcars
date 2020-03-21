<!-- Main content -->
<section class="content">
    <p>
        <a href="<?php echo base_url('admin/info') ?>" class="btn btn-success btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </p>
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <?php
        //Error Upload
        if(isset($error)){
            echo'<p class="alert alert-warning">';
            echo $error;
            echo '</p>';
        }

        // Notifikasi error
        echo validation_errors('<div class="alert alert-warning">','</div>');

        // Form Open
        echo form_open_multipart(base_url('admin/info/edit/'.$info->info_id), 'class="form-horizontal"');
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" readonly>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $info->judul ?>">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $info->deskripsi ?>">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea class="form-control" name="isi"><?php echo $info->isi ?></textarea>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Tanggal Kadaluarasa</label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $info->tanggal ?>">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.card -->
</section>