<div class="col-md-15">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('penduduk/tambahkan'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambahkan</a>
            </div>
            <div class="panel-body">
<?php
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }
                
                ?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Penduduk</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Alamat Asal</th>
                            <th>Status</th>
                            <th>No. KK</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($penduduk as $key => $value) { ?>
                     <tr> 
                        <td><?= $no++; ?></td>
                        <td><?= $value->nik ?></td>
                        <td><?= $value->nama_penduduk ?></td>
                        <td><?= $value->tempat_lahir ?></td>
                        <td><?= $value->tgl_lahir ?></td>
                        <td><?= $value->jenis_kelamin ?></td>
                        <td><?= $value->agama ?></td>
                        <td><?= $value->alamat ?></td>
                        <td><?= $value->alamat_asal ?></td>
                        <td><?= $value->status ?></td>
                        <td><?= $value->no_kk ?></td>
                        <td>
                            <a href="<?= base_url('penduduk/edit/'.$value->id_penduduk) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url('penduduk/delete/'.$value->id_penduduk) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..??')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>

        </div>
        </div>
 </div>