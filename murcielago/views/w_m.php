<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter - Multiple Image upload using dropzone.js</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
	<link href="<?php echo base_url('assets/admin/plugins/dropzone/min/dropzone.min.css') ?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/admin/plugins/dropzone/min/dropzone.min.js') ?>"></script>
</head>
<body>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Codeigniter - Multiple Image upload using dropzone.js</h2>
			<form action="<?php echo base_url('w/imageUploadPost') ?>" enctype="multipart/form-data" class="dropzone" id="image-upload" method="POST">
				<div>
					<h3>Upload Multiple Image By Click On Box</h3>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
var tokenname = '<?php echo md5(date('Ymd')) ?>-';
// Dropzone.autoDiscover = false;
	Dropzone.options.imageUpload = {
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
				 addRemoveLinks: true,
				 resizeQuality: 1.0,
				 url: "<?php echo base_url('w/imageUploadPost') ?>",
				 init: function() {
            this.on("sending", function(file, xhr, formData){
                formData.append("fpos", 777);
            }),
            this.on("success", function(file, xhr){
                alert(file.xhr.response);
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
				     url: '<?php echo base_url('w/delete') ?>',
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


</body>
</html>
