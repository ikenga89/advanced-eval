<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Avandced Eval - Xavier Guien</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include('modele/container.php');?>
	
	<header>
		<h1>
			Advanced Eval - Xavier Guien
		</h1>
	</header>
	<select name="country">
		<option value="">-----------------</option>
		<?php
			foreach ($container as $key => $value):
				echo '<option value="'.$key.'">'.$value['TypeContenu'].'</option>'; //close your tags!!
			endforeach;
		?>
	</select>
	<table style="width:650px">
		<tr>
			<th>ID</th>
			<th>Poids Réel</th>
			<th>Poids Max</th>
			<th>Type Contenu</th>
			<th>Taux Remplissage</th>
		</tr>
		<?php
			foreach( $container as $key => $value ) { 
				if (calculTauxRemplissage($value['PoidReel'], $value['PoidMax']) > 100) {
					echo '<tr style="background:red">';
				} else {
					echo '<tr>';
				}
					echo '<td>'.$key.'</td>';
					echo '<td>' . $value['ID'] . '</td>';
					echo '<td>' . $value['PoidReel'] . ' Tonnes</td>';
					echo '<td>' . $value['PoidMax'] . ' Tonnes</td>';
					echo '<td>' . $value['TypeContenu'] . '</td>';
					echo '<td>' . calculTauxRemplissage($value['PoidReel'], $value['PoidMax']) . '</td>';
				echo '</tr>';
			} 
		?> 
	</table>
	<?php 
		function calculTauxRemplissage($poidReel, $poidMax) {
			$tauxRemplissage = ($poidReel * 100)/$poidMax;
			$tauxRemplissage = ceil($tauxRemplissage).'%';
			return $tauxRemplissage;
		}
	?>
</body>
</html>