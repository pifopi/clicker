<!DOCTYPE HTML>
<!--
	Typify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Partie étudiant</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<section id="banner">
			<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
			<p>Développé par Polytech UPMC - Etudiants EISE</p>
		</section>

		<section id="two" class="wrapper style2 special">
			<div class="inner narrow">
				<header>
					<h2>Les formulaires disponibles</h2>
				</header>

<?php
			$identifiant = $_POST ['name1'];
			$mysqli = new mysqli("localhost", "root", "pixel1234", "test");

			$requete = "SELECT `id_questionnaire` FROM `questionnaire` where `id_utilisateur` = '" . $identifiant . "'";
			// echo $requete . "<br />";
			$result = $mysqli->query($requete);
			if ($result->num_rows != 0)
			{
?>
				<form action = "reponse_questionnaire.php">
					<select name = "id_questionnaire" id = "id_questionnaire">
<?php
						while ($row = $result->fetch_assoc())
						{
							echo "<option value = " . $row['id_questionnaire'] . ">" . $row['id_questionnaire'] . "</option>";
						}
?>
					</select>
					<input type = "submit" value = "Commencer ce questionnaire">
				</form>
<?php
			}
			else
			{
				echo "Il n'y a aucun questionnaire associé à cet ID de professeur. Veuillez vérifier l'ID et recommencer.";
			}
?>
			</div>
		</section>
	</body>
</html>