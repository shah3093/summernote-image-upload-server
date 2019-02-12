<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="summernote/dist/summernote.css" rel="stylesheet">
</head>
<body>

<form action="home.php" method="post">
	
	
	<div class="container" style="margin-top: 100px">
	
	 <textarea name="editor1" id="summernote" rows="500" cols="80">
                This is my textarea to be replaced with CKEditor.
	 </textarea>
	</div>
	
	<button type="submit">Submit</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="summernote/dist/summernote.js" defer></script>

<script>
	$(document).ready(function () {
		$('#summernote').summernote({
			height: "500px",
			popatmouse: false,
			callbacks: {
				onImageUpload: function (image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function (target) {
					deleteFile(target[0].src);
				}
			}
		});
		
		function deleteFile(imgSrc) {
			$.post('home.php',{'imgSrc':imgSrc},function (re) {
				console.log(re);
			});
		}
		
		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			// console.log(data);
			$.ajax({
				url: 'home.php',
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "post",
				success: function (url) {
					var image = $('<img>').attr('src', url);
					$('#summernote').summernote("insertNode", image[0]);
				},
				error: function (data) {
					console.log(data);
				}
			});
		}
		
		
	});


</script>
</body>
</html>