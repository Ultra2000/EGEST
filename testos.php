<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=*, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		<input type="checkbox" name="colour[]" value="red" id="">Rouge <br>
		<input type="checkbox" name="colour[]" value="blue" id="">bleu <br>
		<input type="checkbox" name="colour[]" value="green" id="">vert <br>
		<input type="checkbox" name="colour[]" value="yelow" id="">jaune <br>
		<input type="submit" value="Submit">
	</form>

	<?php
		if(isset($_POST['submit'])){
			if(!empty($_POST['colour'])){
				foreach($_POST['colour'] as $value){
					echo "couleur est: " .$value. '<br/>';
				}
			}
		}
	?>
</body>
</html>