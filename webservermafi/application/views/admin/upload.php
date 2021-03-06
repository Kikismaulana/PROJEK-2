<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Image</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Style CSS provided by jQuery Upload Preview -->
    <style>
        #image-preview {
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
        }
        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }
        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>
  </head>

  <body>

    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <?php echo $this->session->userdata('message'); ?>
        <?php echo form_open_multipart('uploadimage/store'); ?>
          <div class="form-group">
            <?php echo form_error('filefoto'); ?>
            <div class="form-group">
              <label>NIS</label>
              <input class="form-control" type="text" name="nis">
            </div>
            <div class="form-group">
              <label>Alasan</label>
              <input class="form-control" type="text" name="alasan">
            </div>
            <div class="form-group">
              <label>Taggal Mulai</label>
              <input type="date" name="mulai" class="form-control">
            </div>
            <div class="form-group">
              <label>Taggal Selesai</label>
              <input type="date" name="selesai" class="form-control">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <select class="form-control" name="ket">
                  <option>Sakit</option>
                  <option>Izin</option>
              </select>
            </div>
            <div id="image-preview">
                <label for="image-upload" id="image-label">Choose File</label>
                <input type="file" name="filefoto" id="image-upload" required/>
            </div>
          </div>
          <?php echo anchor(site_url('uploadimage'), 'Kembali', 'class="btn btn-default"'); ?>
          <?php echo form_submit('submit', 'Tambah', 'class="btn btn-primary"'); ?>
        <?php echo form_close(); ?>
      </div>
    </div>

    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" charset="utf-8"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" charset="utf-8"></script>
    <script src="<?php echo base_url('assets/js/jquery.uploadPreview.min.js'); ?>" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $.uploadPreview({
              input_field: "#image-upload",
              preview_box: "#image-preview",
              label_field: "#image-label"
          });
      });
    </script>

  </body>
</html>
