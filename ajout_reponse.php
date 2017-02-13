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
		<section id="banner">
				<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
				<p>Développé par Polytech UPMC - Etudiants EISE</p>
			</section>

<?php
		$id_utilisateur = $_COOKIE["identifiant"];
		$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
		if (isset ($_GET ['id_questionnaire']) && isset ($_GET ['numero_question']) && isset ($_POST ['reponse']))
		{
			$id_questionnaire = $_GET ['id_questionnaire'];
			$numero_question = $_GET ['numero_question'];
			$reponse = $_POST ['reponse'];
		}
		else
		{
			echo "Veuillez passer un id de questionnaire, un numero de question et une réponse en argument.";
		}

		$requete = "INSERT INTO `reponse_eleve`(`id_utilisateur`, `id_questionnaire`, `numero_question`, `reponse`) VALUES ('" . $id_utilisateur . "', " . $id_questionnaire . ", " . $numero_question . ", '" . $reponse . "')";
		// echo $requete . "<br />";
		$mysqli->query($requete);

		$numero_question ++;
		header("Location: reponse_questionnaire.php?id_questionnaire=" . $id_questionnaire . "&numero_question=" . $numero_question);
?>
	</body>
</html>
