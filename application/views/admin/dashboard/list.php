<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-user"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Total Pengguna</span>
        <span class="info-box-number">
            <?php echo $pengguna ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-edit"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Mobil</span>
            <span class="info-box-number">
                <?php echo $mobil ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-edit"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Booking</span>
            <span class="info-box-number">
                <?php echo $booking ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Sedang Dipakai</span>
            <span class="info-box-number">
                <?php echo $sedang_dipakai ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-edit"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Selesai</span>
            <span class="info-box-number">
                <?php echo $selesai ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2>LOG</h2>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>WAKTU</th>
                    <th>EMAIL</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($log as $log) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $log->waktu ?></td>
                    <td><?php echo $log->email ?></td>
                    <td><?php echo $log->keterangan ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</section>