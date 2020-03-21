<!-- Main content -->
<section class="content">
    <p>
        <a href="<?php echo base_url('admin/mobil') ?>" class="btn btn-success btn-md">
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
        echo form_open_multipart(base_url('admin/mobil/tambah'), 'class="form-horizontal"');
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo set_value('nama') ?>">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" class="form-control" name="warna" placeholder="Warna" value="<?php echo set_value('warna') ?>">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" value="<?php echo set_value('harga') ?>">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="aktif" >Aktif</option>
                            <option value="nonaktif" >Tidak Aktif</option>
                        </select>
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