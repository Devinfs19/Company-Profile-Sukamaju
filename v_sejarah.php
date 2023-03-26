<div class="col-lg-13">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('sejarah/tambahkan'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambahkan</a>
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
                            <th>Nama Sejarah</th>
                            <th>Isi Sejarah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($sejarah as $key => $value) { ?>
                     <tr> 
                        <td><?= $no++; ?></td>
                        <td><?= $value->nama_sejarah ?></td>
                        <td><?= $value->isi_sejarah ?></td>
                    
                        <td>
                            <a href="<?= base_url('sejarah/edit/'.$value->id_sejarah) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url('sejarah/delete/'.$value->id_sejarah) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..??')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>

        </div>
        </div>
 </div>