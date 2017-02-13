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
		<script>
				var compteuridentifiant = 0;
				var compteurmotdepasse = 0;

				function surligne(champ, erreur)
				{
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

				function verifmotdepasse(champ) {
					if(champ.value.length == 0 ) {
						surligne(champ, true);
						compteurmotdepasse = 1;
						return false;
						
					}
					else {
						surligne(champ, false);
						compteurmotdepasse = 0;
						return true;
					}
				}


			function verif_formulaire() {

				if(compteuridentifiant == 1 || compteurmotdepasse == 1 || document.formulaire.name1.value == "" || document.formulaire.name2.value == "" ) {
							return false;
				}
				else {
							return true;
				}
			}


		</script>
		<!-- Banner -->
			<section id="banner">
				<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
				<p>Développé par Polytech UPMC - Etudiants EISE</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper special">
				<div class="inner">
					<header class="major">
						<h2>Rubriques</h2>
					</header>
					<div class="features">
						<div class="feature">
							<i class="fa fa-diamond"></i>
							<h3><a href="tutorielencadrant.pdf">Encadrant </a></h3>
							<p>Tutoriel d'utilisation du Clicker pour l'encadrant</p>
						</div>
						<div class="feature">
							<i class="fa fa-copy"></i>
							<h3><a href = "tutorielapprenant.pdf">Apprenant </a></h3>
							<p>Tutoriel d'utilisation du Clicker pour l'apprenant</p>
						</div>
						<div class="feature">
							<i class="fa fa-paper-plane-o"></i>
							<h3><a href="pedagogie.pdf">Pédagogie inversée</a></h3>
							<p>Le guide de la pédagogie inversée</p>
						</div>
						<div class="feature">
							<i class="fa fa-save"></i>
							<h3>Sources</h3>
							<p>Tous les codes du Clicker</p>
						</div>
						<div class="feature">
							<i class="fa fa-envelope-o"></i>
							<h3><a href = "contact.html">Contact</a></h3>
							<p> Si vous avez des questions, des bugs ou des idées, c'est par ici</p>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="inner narrow">
					<header>
						<h2>Se connecter</h2>
					</header>
					<form name = "formulaire" class="grid-form" method="post" action="preverification.php" onSubmit= "return verif_formulaire()">
						<div class="form-control narrow">
							<label for="name1">Identifiant</label>
							<input name="name1" id="name1" type="text" onblur = "verifidentifiant(this)"/>
						</div>
						<div class="form-control narrow">
							
							<label for="name2">Mot de passe</label>
							<input name="name2" id="name2" type="password" onblur = "verifmotdepasse(this)"/>
							<legend><a href="motdepasse.php"> Mot de passe oublié ? </a></front> </legend>
						</div>
						
						<div class="actions">
							<p><input value="se connecter" type="submit"><p>
						</div>

						<div class="actions">
							<a href="inscription.php">
  							 <input type="button" value="Creer un compte" />
							</a>
						</div>
					</form>
				</div>
			</section>
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
