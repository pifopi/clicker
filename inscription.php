<!DOCTYPE HTML>
<!--
	Typify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Inscription</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!-- nos variables globales -->

	
	</head>
	<body>
	
		<!-- Banner -->
			<section id="banner">
				<h2><strong>Clicker !</strong> Réinventons l'enseignement </h2>
				<p>Développé par Polytech UPMC - Etudiants EISE</p>
			</section>

			<script>
				var compteuridentifiant;
				var compteurmotdepasse;
				var compteurnom;
				var compteurprenom;
				var compteurmail;
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

				function verifnom(champ) {
					if(champ.value.length == 0 ) {
						surligne(champ, true);
						compteurnom = 1;
						return false;
						
					}
					else {
						surligne(champ, false);
						compteurnom = 0;
						
						return true;
					}
				}

				function verifprenom(champ) {
					if(champ.value.length == 0 ) {
						surligne(champ, true);
						compteurprenom = 1;
						return false;
						
					}
					else {
						surligne(champ, false);
						compteurprenom = 0;
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

					if(compteuridentifiant == 1 || compteurnom == 1 || compteurmotdepasse == 1 || compteurprenom == 1 || compteurmail == 1 ||  document.formulaire.name1.value == "" ||  document.formulaire.name2.value == "" ||  document.formulaire.name3.value == "" ||  document.formulaire.name4.value == "" || document.formulaire.name5.value == "" ||  document.formulaire.name6.value == "") {
						return false;
					}
					else {
						return true;
					}
				}

			</script>
		

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="inner narrow">
					<header>
						<h2>Creer un compte</h2>
					</header>
					
					<form class="grid-form" name="formulaire" method="post" action="registration.php" onsubmit="return verif(this)">
						<div class="form-control narrow">
							<label for="name">Identifiant</label>
							<input name="name1" id="name1" type="text" onblur ="verifidentifiant(this)" />
						</div>
						<div class="form-control narrow">
							<label for="name">Mot de passe</label>
							<input name="name2" id="name2"  type="password" onblur ="verifmotdepasse(this)" />
						</div>

						<div class="form-control narrow">
							<label for="name">Nom</label>
							<input name="name4" id="name4"  type="text" onblur ="verifnom(this)" />
						</div>

						<div class="form-control narrow">
							<label for="name">Prénom</label>
							<input name="name5" id="name5"  type="text" onblur ="verifprenom(this)"/>
						</div>

						<div class="form-control narrow">
							<label for="name">E-mail</label>
							<input name="name6" id="name6"  type="email" onblur ="verifmail(this)"/>
						</div>
						<div class="form-control narrow">
							<label for="status">Statut</label>
							 <select name="name3" id="name3">
          						<option value="1">Enseignant</option>
           						<option value="2">Etudiant</option>
           					</select>
						</div>
						<div class="form-control">
						<p><input value="S'enregistrer" type='submit' name ='register'></p>
					
						</div>
					</form>
				</div>
			</section>
		<!-- Footer -->
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
