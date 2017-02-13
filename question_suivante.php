<?php
	if (isset ($_GET ['id_questionnaire']) && isset ($_GET ['numero_question']))
	{
		$id_questionnaire = $_GET ['id_questionnaire'];
		$numero_question = $_GET ['numero_question'];
	}

	$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
	$requete = "UPDATE `question` SET `activation_question`= 0 WHERE `id_questionnaire` = '" . $id_questionnaire . "'";
	// echo $requete . "<br />";
	$query = $mysqli->query($requete);

	$requete = "UPDATE `question` SET `activation_question`= 1 WHERE `id_questionnaire` = '" . $id_questionnaire . "' AND `numero_question` = '" . $numero_question . "'";
	// echo $requete . "<br />";
	$query = $mysqli->query($requete);
?>
<!DOCTYPE HTML>
<!--
	Typify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<?php
	$id_questionnaire = $_GET ['id_questionnaire'];
?>
<html>
	<head>
		<title>Clicker by Polytech</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<!-- Banner -->
		<section id="banner">
			<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
			<p>Développé par Polytech UPMC - Etudiants EISE</p>
		</section>

		<?php echo '<a href = "question_suivante.php?id_questionnaire=' . $id_questionnaire . '&numero_question=' . ($numero_question + 1) . '">' ?>
		<input type = "button" value = "Activer la question suivante !" />
		</a>
		
		
		<?php echo '<a href = "statistiques.php?id_questionnaire=' . $id_questionnaire . '&numero_question=' . $numero_question . '">' ?>
			<input type = "button" value = "Afficher les statistiques de la question" />
		</a>
		
		<a href = "prof.php">
			<input type = "button" value = "Revenir à l'accueil" />
		</a>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>