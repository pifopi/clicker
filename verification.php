<html>
    <head>
        <title>Verification</title>

    </head>

    <body>
   
        <?php 
            $identifiant = $_COOKIE["identifiant"];
            $mot_de_passe = $_COOKIE["motdepasse"];
            $mysqli = new mysqli("localhost", "root", "pixel1234", "test");
            /////////////////////////////// recherche du nom d'utilisateur ////////////////////////////////////
            $query = $mysqli->query("SELECT id_utilisateur FROM `utilisateur` WHERE `id_utilisateur` ='$identifiant' "); 
            $query_mot_de_passe = $mysqli->query("SELECT mot_de_pass FROM `utilisateur` WHERE `id_utilisateur` ='$identifiant' "); 
            $compteur = 0;
            while ($row = $query->fetch_assoc()) { // si on trouve le nom d'utilisateur
                    while($row2 = $query_mot_de_passe->fetch_assoc()) {
                    if($row2['mot_de_pass'] == $mot_de_passe) { // si le mot de passe est bon
                       $query_status = $mysqli->query("SELECT statut FROM `utilisateur` WHERE `id_utilisateur` ='$identifiant' ");
                       while($row3 = $query_status->fetch_assoc()) {
                            if($row3['statut'] == "1") { 
                               
                                header("Refresh: 1; prof.php?identifiant=" . $identifiant);
                            }
                            else {
                                header("Refresh: 1; etudiant1.php?identifiant=" . $identifiant);
                            }
                       }
                    } 
                    else {
                        echo "<script language='javascript'> alert('Mot de passe incorrect'); </script>";
                      //   header("Refresh: 1; index.php");
                    }
                    $compteur++;
                }
            }
           if($compteur == 0) {
               echo "<script language='javascript'> alert('Vous n\'êtes pas encore inscrit !'); </script>";
               header("Refresh: 1; inscription.php");
            }

           // echo $query;
            //echo "<script language='javascript'> alert('vous êtes bien inscrit'); </script>";
        
        ?>
   
        

    </body>
</html>
