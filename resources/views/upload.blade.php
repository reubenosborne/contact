<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body>

	<form action="/upload/add" method="post" enctype="multipart/form-data">
		
		<input type="file" name="file">
		<input type="hidden" name="contact_id" value="2">

		<input type="submit">

	</form>

	
</body>
</html>