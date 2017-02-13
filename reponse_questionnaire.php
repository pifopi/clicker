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
<?php
		$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
		if (isset ($_GET ['id_questionnaire']))
		{
			$id_questionnaire = $_GET ['id_questionnaire'];
		}
		else
		{
			echo "Veuillez passer un id de questionnaire et un numero de question en argument.";
		}

		if (isset ($_GET ['numero_question']))
		{
			$numero_question = $_GET ['numero_question'];
		}
		else
		{
			$numero_question = 1;
		}

		$requete = "SELECT id_question, question, activation_question FROM `question` WHERE `id_questionnaire` = " . $id_questionnaire . " AND `numero_question` = " . $numero_question;
		// echo $requete . "<br />";
		$result = $mysqli->query($requete);
		$question = $result->fetch_array(MYSQLI_ASSOC);

		if (!isset ($question ['question']))
		{
			echo "Vous avez fini ce questionnaire, bravo !";
		}
		else
		{
			if ($question ['activation_question'] == 1)
			{
				echo "<b>" . $question ['question'] . "</b>" . "<br />" . "<br />";

				$requete = "SELECT reponse FROM `reponse_prof` WHERE `id_question` = " . $question ['id_question'] . " AND `numero_reponse` = 'a'";
				// echo $requete . "<br />";
				$result = $mysqli->query($requete);
				$reponseA = $result->fetch_array(MYSQLI_ASSOC);


				$requete = "SELECT reponse FROM `reponse_prof` WHERE `id_question` = " . $question ['id_question'] . " AND `numero_reponse` = 'b'";
				// echo $requete . "<br />";
				$result = $mysqli->query($requete);
				$reponseB = $result->fetch_array(MYSQLI_ASSOC);

				$requete = "SELECT reponse FROM `reponse_prof` WHERE `id_question` = " . $question ['id_question'] . " AND `numero_reponse` = 'c'";
				// echo $requete . "<br />";
				$result = $mysqli->query($requete);
				$reponseC = $result->fetch_array(MYSQLI_ASSOC);

				$requete = "SELECT reponse FROM `reponse_prof` WHERE `id_question` = " . $question ['id_question'] . " AND `numero_reponse` = 'd'";
				// echo $requete . "<br />";
				$result = $mysqli->query($requete);
				$reponseD = $result->fetch_array(MYSQLI_ASSOC);
?>
				<form action = "ajout_reponse.php?id_questionnaire=<?php echo $id_questionnaire; ?>&numero_question=<?php echo $numero_question; ?>" method = "post">
					<input type = "radio" name = "reponse"  id= "1" value = "a" checked>
					<label for="1"> <b>Réponse A :</b> <?php echo $reponseA ['reponse']; ?> </label> </br>

					<input type = "radio" name = "reponse"  id= "2" value = "b" >
					<label for="2"> <b>Réponse B :</b> <?php echo $reponseB ['reponse']; ?> </label> </br>

					<input type = "radio" name = "reponse"  id= "3" value = "c" >
					<label for="3"> <b>Réponse C :</b> <?php echo $reponseC ['reponse']; ?> </label> </br>

					<input type = "radio" name = "reponse"  id= "4" value = "d" >
					<label for="4"> <b>Réponse D :</b> <?php echo $reponseD ['reponse']; ?> </label> </br>
				
					<input type = "submit" value = "Valider ma réponse">
				</form>
<?php
			}
			else
			{
				echo "La question n'est pas encore accessible. Veuillez attendre que l'encadrant l'ai activée.";
			}
		}
?>
	</body>
</html>

