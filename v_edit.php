<div class="col-lg-13">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Sejarah
            </div>
            <div class="panel-body">
<?php

        echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

        if (isset($error_upload)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
           
        }


        echo form_open_multipart('sejarah/edit/'.$sejarah->id_sejarah); 
        ?>
            <div class="form-group">
                <label>Nama Sejarah</label>
                <input class="form-control" value="<?= $sejarah->nama_sejarah?>" type="text" name="nama_sejarah" placeholder="Nama sejarah" required>
            </div>

            <div class="form-group">
                <label>Isi sejarah</label>
                <textarea name="isi_sejarah" id="editor" required><?= $sejarah->isi_sejarah?></textarea>
            </div>  

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="result" class="btn btn-success">Riset</button>
            </div>


<?php echo form_close(); ?>
        </div>
 </div>