<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= $title ?></title>	
	
		<script src="https://code.jquery.com/jquery-3.6.4.js" 
		integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<div class="page-wrap">
			<?php include 'include/header.php' ?>
			<?php include 'include/maincontent.php'; ?>
		</div>
			<?php include 'include/footer.php' ?>
			<?php include 'include/modal.php' ?>
		<script src="js/scripts.js"></script>
		
	</body>	
</html>
