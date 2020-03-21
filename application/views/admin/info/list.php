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
    <a href="<?php echo base_url('admin/info/tambah') ?>" class="btn btn-success btn-md">
        <i class="fa fa-plus"></i> Tambah
    </a>
</p>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>DESKRIPSI</th>
                    <th>TANGGAL KADALUARSA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($info as $info) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $info->judul ?></td>
                    <td><?php echo $info->deskripsi ?></td>
                    <td>
                        <?php if($info->tanggal >= date("Y-m-d")) { ?>
                            <small class="badge badge-success"><?php echo $info->tanggal ?></small>
                        <?php }else{ ?>
                            <span class="badge badge-danger"><?php echo $info->tanggal ?></span>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url('admin/info/edit/'.$info->info_id) ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('admin/info/detail/'.$info->info_id) ?>" class="btn btn-info btn-xs">
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