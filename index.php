<?php
	require 'config.php';
	require 'modele/Autoloader.php';
	Model\Autoloader::register();

	$database = new Model\Database($db_host, $db_bdd, $db_user, $db_pass);
	$inscription = new Model\Inscription($database);
	$recipe = $inscription->selectAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>
<body>
	<?php
	foreach ($recipe as $key => $value) {
		echo "<table>
				<thead>
					<tr>
						<th colspan='3'>{$value['titre']}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
						coût : ";
						for ($i=0; $i < $value['cout']; $i++) { 
							echo "€";
						}
				  		echo "</td>
						<td>
							<img src='https://cdn.icon-icons.com/icons2/510/PNG/512/person_icon-icons.com_50075.png' height='20'> X {$value['personne']}
						</td>
						<td>
							difficuté : ";
							for ($i=0; $i < $value['difficulte']; $i++) { 
								echo "<img src='https://st2.depositphotos.com/3921439/7734/v/950/depositphotos_77349936-stock-illustration-the-knife-icon-chopper-knife.jpg' height='20'>";
							}
						echo "</td>
					</tr>
				</tbody>
			</table>";
	}
	?>
</body>
</html>
	
	