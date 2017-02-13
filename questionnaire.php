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

			<?php echo '<a href = "question_suivante.php?id_questionnaire=' . $id_questionnaire . '&numero_question=1">' ?>
				<input type = "button" value = "Activer la première question" />
			</a>

<?php
			$identifiant = $_COOKIE["identifiant"];
			$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
			$requete = "SELECT DISTINCT `id_utilisateur` FROM `reponse_eleve` where `id_questionnaire` = " . $id_questionnaire;
			// echo $requete . "<br />";
			$query = $mysqli->query($requete);

			echo '<form action = "evaluation.php?id_questionnaire=' . $id_questionnaire . '&">';
			echo '<input type="hidden" name="id_questionnaire" value="' . $id_questionnaire . '">';
			echo '<select name = "id_utilisateur" id = "id_utilisateur">';
			while ($row = $query->fetch_assoc())
			{
				echo "<option value=".$row['id_utilisateur'].">". $row['id_utilisateur'] . '</option>';
			}
			echo '</select>';
			echo '<input type = "submit" value = "Accéder à l\'évaluation de cet élève">';
			
			echo '</form>';
?>
			
			<footer id="footer">
				<div class="copyright">
					&copy; Untitled. Design: <a href="http://templated.co/">TEMPLATED</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>
