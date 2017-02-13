<?php
	if (isset ($_GET ['id_questionnaire']) && isset ($_GET ['id_utilisateur']))
	{
		$id_questionnaire = $_GET ['id_questionnaire'];
		$id_utilisateur = $_GET ['id_utilisateur'];
	}

	$count_faux = 0;
	$count_vrai = 0;

	$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
	$requete = "SELECT `id_question` FROM `question` where `id_questionnaire` = '" . $id_questionnaire . "'";
	// echo $requete . "<br />";
	$query = $mysqli->query($requete);
	
	$numero_question = 1;
	
	while ($row = $query->fetch_assoc())
	{
		$requete = "SELECT `reponse` FROM `reponse_eleve` where `id_questionnaire` = '" . $id_questionnaire . "' AND " . "`numero_question` = '" . $numero_question . "' AND `id_utilisateur` = '" . $id_utilisateur . "' ORDER BY `date` DESC";
		// echo $requete . "<br />";
		$query_bis = $mysqli->query($requete);
		$reponse_eleve = $query_bis->fetch_assoc();
		
		$requete = "SELECT `bonne_reponse` FROM `question` where `id_questionnaire` = '" . $id_questionnaire . "' AND " . "`numero_question` = '" . $numero_question . "'";
		// echo $requete . "<br />";
		$query_ter = $mysqli->query($requete);
		$bonne_reponse = $query_ter->fetch_assoc();

		if ($bonne_reponse ['bonne_reponse'] == $reponse_eleve ['reponse'])
		{
			$count_vrai ++;
		}
		else
		{
			$count_faux ++;
		}
		$numero_question ++;
	}
?>

<html>
	<head>
		<meta charset = "utf-8" />
		<title>Evaluation</title>
		<script src="neige2.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart()
			{
				var data = google.visualization.arrayToDataTable
				([
					['Réponses', 'Nombre de bonnes réponses'],
					['Vrai', <?php echo $count_vrai; ?>],
					['Faux', <?php echo $count_faux; ?>]
				]);

				var options = {
				  title: 'Nombre de bonnes réponses'
				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));

				chart.draw(data, options);
			}
		</script>
	</head>
	<body>
		<div id="piechart" style="width: 900px; height: 500px;"></div>
		
		<?php echo '<a href = "questionnaire.php?id_questionnaire=' . $id_questionnaire . '">' ?>
			<input type = "button" value = "Revenir à l'accueil de ce questionnaire" />
		</a>
	</body>
</html>