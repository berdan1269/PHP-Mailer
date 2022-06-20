<!DOCTYPE html>
<html>
<head>
	<title>Mail Gönderme </title>
</head>
<body>

<form action="form.php" method="post" enctype="multipart/form-data">
	
	<input type="text" name="email" required placeholder="E posta adresinizi giriniz "><br>

	<input type="text" name="subject" required placeholder="Emailinizin konusu:"><br>
	<textarea name="content" cols="30" rows="10" placeholder="Epostanın içeriği:"></textarea><br>
	<input type="file" name="attachment">
	<button type="submit"> Gönder</button>






</form>

</body>
</html>