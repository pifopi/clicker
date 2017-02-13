<!DOCTYPE HTML>
<!--
	Typify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Partie professeur</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!-- nos variables globales -->
	</head>
	<body>
		<!-- Banner -->
		<section id="banner">
			<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
			<p>Développé par Polytech UPMC - Etudiants EISE</p>
			<!-- <ul class="actions">
				<li><a href="#" class="button special">Get started</a></li>
			</ul>  -->
		</section>

<?php
			$identifiant = $_COOKIE["identifiant"];
			$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
			$query =$mysqli->query("SELECT  `id_questionnaire` FROM `questionnaire` where `id_utilisateur` = '$identifiant' ");

			echo '<form action = "questionnaire.php">';
			echo '<select name = "id_questionnaire" id = "id_questionnaire">';
			while ($row = $query->fetch_assoc())
			{
				echo "<option value=".$row['id_questionnaire'].">". $row['id_questionnaire'] . '</option>';
			}
			echo '</select>';
			echo '<input type = "submit" value = "Accéder à ce questionnaire">';
			
			echo '</form>';
?>
		<div class="actions">
			<a href="creation_formulaire.html">
				<input type="button" value="Ajouter un formulaire" />
			</a>
		</div>
    </body>
</html>


        
