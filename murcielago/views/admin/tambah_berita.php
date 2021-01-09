<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="<?php echo base_url('assets/admin/plugins/dropzone/min/dropzone.min.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/plugins/dropzone/min/dropzone.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/image_compress/image-compressor.min.js') ?>"></script>
<div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Berita</h3>
          </div>
          <div class="box-body">
            <?php echo $this->session->flashdata('alert') ?>
            <div class="form-group">
              <form method="post" action="<?php echo base_url('ntfs/add_berita') ?>" id="upload_form" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Judul Berita</label>
                  <input type="text" name="judul_berita" class="form-control" id="judulx">
                </div>
                <div class="form-group">
                  <label for="">Kategori Berita</label>
                  <select class="form-control select2" name="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Kategori1">kategori1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label text-left" for="pas-foto">Gambar Thumbnail</label>
                  <div class="input-group">
                          <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                <i class="fa fa-camera"></i> <input type="file" name="file" id="imgInp"> Pilih Gambar
                            </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                        </div>
                        <hr style="margin-top: 10px;margin-bottom: 0px;">
                        <img style="width: 31%; margin: 10px 0px;" id='img-upload'/>
                        <script type="text/javascript">
                        $(document).ready( function() {
                          $(document).on('change', '.btn-file :file', function() {
                            var input = $(this),
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                            input.trigger('fileselect', [label]);
                          });
                          $('.btn-file :file').on('fileselect', function(event, label) {
                            var input = $(this).parents('.input-group').find(':text'),
                            log = label;
                            if( input.length ) {
                              input.val(log);
                            } else {
                              if( log ) alert(log);
                            }
                          });
                          function readURL(input) {
                            if (input.files && input.files[0]) {
                              var reader = new FileReader();
                              reader.onload = function (e) {
                                $('#img-upload').attr('src', e.target.result);
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $("#imgInp").change(function(){
                            readURL(this);
                          });
                        });
                        </script>
                </div>
                <div class="form-group">
                    <label class="control-label text-left" for="pas-foto">Gambar Kegiatan</label>
                    <div class="dropzone" id="image-upload" >

                    </div>
                    </div>
                <div class="form-group">
                  <label for="">Isi Berita</label>
                  <textarea name="isi_berita"></textarea>
                </div>
                <button class="btn bg-green btn-flat btn-lg" name="button" id="oks" type="submit"><b>TAMBAH BERITA</b></button>
              </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <script type="text/javascript">
  var tokenname = '<?php echo md5(date('Ymd')) ?>-';

  // Dropzone.autoDiscover = false;
  	Dropzone.options.imageUpload = {
          maxFilesize:10,
          acceptedFiles: ".jpeg,.jpg,.png,.gif",
  				 addRemoveLinks: true,
  				 resizeQuality: 1.0,
  				 url: "<?php echo base_url('ntfs/upimages') ?>",
           transformFile: function(file, done) {
               const imageCompressor = new ImageCompressor();

               imageCompressor.compress(file, {
               // I assume the output image won't have the meta data anymore
               checkOrientation: true,
               // Limit output image width & height
               // For controllable file size & avoid blank output image
               // https://github.com/xkeshi/image-compressor#maxwidth
               maxWidth: 8192,
               minHeight: 250,
               // 0.8 is the default and already good enough
               // https://github.com/xkeshi/image-compressor#quality
               quality: 0,
               // Convert ALL PNG images to JPEG
               convertSize: 0,
               })
               .then((result) => {
                 // Handle the compressed image file.
                 done(result)
               })
               .catch((err) => {
                 // Handle the error
                 throw err
               })
            },
  				 init: function() {
              this.on("sending", function(file, xhr, formData){
                var tokenx = $('#judulx').val();

                  formData.append("token", tokenx);
              }),
              this.on("success", function(file, xhr){
                  // alert(file.xhr.response);
                  // console.log();
                  // alert(tokenx);
              })
          },
  					success: function (file, response) {
  							file.previewElement.id = response;
  					},
  					removedfile: function(file) {
  				   var name = file.previewElement.id;
  // alert(name);
  				   $.ajax({
  				     type: 'POST',
  				     url: '<?php echo base_url('ntfs/delete_gambar_berita') ?>',
  				     data: "id="+name,
  						 dataType: 'html',
  				     sucess: function(data){
  				        console.log('success: ' + data);
  				     },
  				   });
  				   var _ref;
  				    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
  				 }
      };
  </script>
