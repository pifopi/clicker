<html>
    <head>
        <title>Registration</title>

    </head>

    <body>
   
        <?php 
            $identifiant = $_POST['name1']; 
            $mot_de_passe = $_POST['name2'];
            $nom = $_POST['name4'];
            $prenom = $_POST['name5'];
            $status = $_POST['name3'];
            $mail = $_POST['name6'];

            // ici on test si la personne est déjà inscrite //
            $mysqli = new mysqli("localhost", "root", "pixel1234", "test");
            $query = $mysqli->query("SELECT id_utilisateur FROM `utilisateur` WHERE `id_utilisateur` ='$identifiant' ");
            $compteur = 0;
            while($row = $query->fetch_assoc()) {
                if($row['id_utilisateur'] == $identifiant) {
                     $compteur = 1;
                     break;
                }
            }


            // ajout dans la base de donnée 
            
   			if($compteur == 0) {
                $query =$mysqli->query("INSERT INTO utilisateur (id_utilisateur,nom, prenom, mail, mot_de_pass, statut) VALUES('$identifiant','$nom','$prenom', '$mail' ,'$mot_de_passe', '$status')");
                //echo "INSERT INTO utilisateur (id_utilisateur,nom, prenom, mail, mot_de_pass, statut) VALUES('$identifiant','$nom','$mail', '$prenom','$mot_de_passe', '$status')";
                echo "<script language='javascript'> alert('vous êtes bien inscrit'); </script>";
                header("Refresh: 1; index.php");
            }
            if($compteur == 1 ) {
                echo "<script language='javascript'> alert('Utilisateur déjà existant'); </script>";
                header("Refresh: 1; inscription.php");

            }
        
        ?>
   

    </body>
</html>
