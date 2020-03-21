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
<p>
    <a href="<?php echo base_url('admin/mobil/tambah') ?>" class="btn btn-success btn-md">
        <i class="fa fa-plus"></i> Tambah
    </a>
</p>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>WARNA</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($mobil as $mobil) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mobil->nama ?></td>
                    <td><?php echo $mobil->warna ?></td>
                    <td>Rp.<?php echo number_format($mobil->harga,'0',',','.') ?></td>
                    <td>
                        <?php if($mobil->status == "aktif") { ?>
                            <small class="badge badge-success">AKTIF</small>
                        <?php }else{ ?>
                            <span class="badge badge-danger">TIDAK AKTIF</span>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url('admin/mobil/edit/'.$mobil->mobil_id) ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('admin/mobil/detail/'.$mobil->mobil_id) ?>" class="btn btn-info btn-xs">
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