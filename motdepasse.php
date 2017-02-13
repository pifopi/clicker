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
    <!-- Banner -->
			<section id="banner">
				<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
				<p>Développé par Polytech UPMC - Etudiants EISE</p>
				<!-- <ul class="actions">
					<li><a href="#" class="button special">Get started</a></li>
				</ul>  -->
			</section>
<script>

	var compteuridentifiant;
	var compteurmail;
	function surligne(champ, erreur) {
					if(erreur)
						champ.style.backgroundColor = "#fba";
					else
						champ.style.backgroundColor = "";
	}

	function verifidentifiant(champ) {
					if(champ.value.length == 0 ) {
						surligne(champ, true);
						compteuridentifiant = 1;
						
						return false;
						
					}
					else {
						surligne(champ, false);
						compteuridentifiant = 0;		
						return true;
					}
	}


	function verifmail(champ) {
					if(champ.value.length == 0 ) {
						surligne(champ, true);
						compteurmail = 1;
						return false;
						
					}
					else {
						surligne(champ, false);
						compteurmail = 0;
						return true;
					}
	}
	function verif() {

		if(compteuridentifiant == 1 || compteurmail == 1 ||  document.formulaire.name1.value == "" ||  document.formulaire.name2.value == "") {
			return false;
		}
		else {
			return true;
		}
	}


</script>

		<!-- One -->

    <section id="two" class="wrapper style2 special">
			<div class="inner narrow">
					<header>
						<h2>RECUPEREZ VOTRE MOT DE PASSE</h2>
					</header>
					<form name = "formulaire" class="grid-form" method="post" action="verificationidentifiantmail.php" onSubmit= "return verif(this)">
						<div class="form-control narrow">
							<label for="name1">Identifiant</label>
							<input name="name1" id="name1" type="text" onblur = "verifidentifiant(this)"/>
						</div>
						<div class="form-control narrow">
							
							<label for="name2">E-mail</label>
							<input name="name2" id="name2" type="email" onblur = "verifmail(this)"/>
							<legend><font size = "1"> Saisissez votre adresse mail d'inscription </font> </legend>
						</div>
				
						<div class="actions">
							<p><input value="Envoyer" type="submit"><p>
						</div>

						
			</form>
		</div>
	</section>