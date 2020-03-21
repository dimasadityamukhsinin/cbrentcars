<!-- Main content -->
<section class="content">
<?php
//Notifikasi 
if($this->session->set_flashdata('sukses')){
    echo '<p class="alert alert-success">';
    echo $this->session->set_flashdata('sukses');
    echo '</div>';
}
?>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>EMAIL</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>NO TELPON</th>
                    <th>JENIS KELAMIN</th>
                    <th>AKTIVASI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($pengguna as $pengguna) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pengguna->email ?></td>
                    <td><?php echo $pengguna->nama ?></td>
                    <td><?php echo $pengguna->alamat ?></td>
                    <td><?php echo $pengguna->no_telpon ?></td>
                    <td><?php echo $pengguna->jenis_kelamin ?></td>
                    <td>
                        <?php if($pengguna->aktivasi == "true") { ?>
                            <small class="badge badge-success">AKTIF</small>
                        <?php }else{ ?>
                            <span class="badge badge-danger">TIDAK AKTIF</span>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url('admin/pengguna/detail/'.$pengguna->user_id) ?>" class="btn btn-info btn-xs">
                        <i class="fa fa-eye"></i> Detail</a>
                        <?php include('delete.php') ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</section>