<?php
	if (isset ($_GET ['id_questionnaire']) && isset ($_GET ['numero_question']))
	{
		$id_questionnaire = $_GET ['id_questionnaire'];
		$numero_question = $_GET ['numero_question'];
	}

	$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
	$requete = "SELECT DISTINCT `id_utilisateur` FROM `reponse_eleve` where `id_questionnaire` = '" . $id_questionnaire . "' AND " . "`numero_question` = '" . $numero_question . "'";
	// echo $requete . "<br />";
	$query = $mysqli->query($requete);

	$count_a = 0;
	$count_b = 0;
	$count_c = 0;
	$count_d = 0;

	while ($row = $query->fetch_assoc())
	{
		$requete = "SELECT `reponse` FROM `reponse_eleve` where `id_questionnaire` = '" . $id_questionnaire . "' AND " . "`numero_question` = '" . $numero_question . "' AND `id_utilisateur` = '" . $row ['id_utilisateur'] . "' ORDER BY `date` DESC";
		// echo $requete . "<br />";
		$query_bis = $mysqli->query($requete);
		
		$reponse = $query_bis->fetch_assoc();
		// echo $reponse ['reponse'] . "<br />";
		if ($reponse ['reponse'] == 'a')
		{
			$count_a ++;
		}
		else if ($reponse ['reponse'] == 'b')
		{
			$count_b ++;
		}
		else if ($reponse ['reponse'] == 'c')
		{
			$count_c ++;
		}
		else if ($reponse ['reponse'] == 'd')
		{
			$count_d ++;
		}
	}
?>

<html>
	<head>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart()
			{
				var data = google.visualization.arrayToDataTable
				([
					['Réponses', 'Nombre de réponses'],
					['A', <?php echo $count_a; ?>],
					['B', <?php echo $count_b; ?>],
					['C', <?php echo $count_c; ?>],
					['D', <?php echo $count_d; ?>]
				]);

				var options = {
				  title: 'Nombre de réponses'
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
