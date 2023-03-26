<div class="col-lg-13">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('aparatur/tambahkan'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambahkan</a>
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
                            <th>Nama Aparatur</th>
                            <th>Jabatan</th>
                            <th>Tugas</th>
                            <th>Fungsi</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($aparatur as $key => $value) { ?>
                     <tr> 
                        <td><?= $no++; ?></td>
                        <td><?= $value->nik; ?></td>
                        <td><?= $value->nama_aparatur; ?></td>
                        <td><?= $value->jabatan; ?></td>
                        <td><?= $value->tugas; ?></td>
                        <td><?= $value->fungsi; ?></td>
                        <td><img src="<?= base_url('img/foto_aparatur/'.$value->foto_aparatur) ?>" width="100px" ></td>
                        <td>
                            <a href="<?= base_url('aparatur/edit/'.$value->id_aparatur) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url('aparatur/delete/'.$value->id_aparatur) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..??')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
             </table>
        </div>
    </div>
 </div>