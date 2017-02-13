<!DOCTYPE HTML>
<!--
	Typify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
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
        <script type= "text/javascript">
		function verif_formulaire() {
			if(document.formulaire.name1.value == "")
			{
				alert("veuillez entrer votre identifiant !");
				document.formulaire.name1.focus();
				return false;
			}
		}
        </script>
		
		<!-- Banner -->
		<section id="banner">
			<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
			<p>Développé par Polytech UPMC - Etudiants EISE</p>
		</section>

		<section id="two" class="wrapper style2 special">
			<div class="inner narrow">
				<form name = "formulaire" class="grid-form" method="post" action="etudiant.php">
					<div class="actions">
						<label for="name1">Identifiant du professeur</label>
						<input name="name1" id="name1" type="text">
					</div>

					<div class="actions">
							<p><input value="Rechercher un questionnaire" type="submit" onSubmit= "return verif_formulaire()"><p>
					</div>
				</form>
			</div>
		</section>
    </body>
</html>