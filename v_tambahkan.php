<div class="col-lg-13">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Tambahkan Data
            </div>
            <div class="panel-body">
<?php

        echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

        if (isset($error_upload)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
           
        }

        echo form_open_multipart('sejarah/tambahkan') 
        ?>
            <div class="form-group">
                <label>Nama sejarah</label>
                <input class="form-control" type="text" name="nama_sejarah" placeholder="Nama sejarah" required>
            </div>

            <div class="form-group">
                <label>Isi sejarah</label>
                <textarea name="isi_sejarah" id="editor" required></textarea>
            </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="result" class="btn btn-success">Riset</button>
            </div>


<?php echo form_close(); ?>
        </div>
 </div>