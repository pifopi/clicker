<html>
    <head>
        <title>Verification mail et identifiant</title>
    </head>

    <body>

    <?php 
        $identifiant = $_POST['name1']; 
        $mail = $_POST['name2'];
       
         // ici on teste si le compte existe bien pour lui envoyer le mail avec les identifiants //
            $mysqli = new mysqli("localhost", "root", "pixel1234", "test");
            $queryidentifiant = $mysqli->query("SELECT id_utilisateur FROM `utilisateur` WHERE `id_utilisateur` ='$identifiant' ");
            $querymail = $mysqli->query("SELECT mail FROM `utilisateur` WHERE `mail` ='$mail' ");
            $compteuridentifiant = 0;
            $compteurmail = 0;
            // ici ça marche
            while($row = $queryidentifiant->fetch_assoc()) {
                if($row['id_utilisateur'] == $identifiant) {
                     $compteuridentifiant = 1;       
                     break;
                }
            }
            
            while($row = $querymail->fetch_assoc()) {
                if($row['mail'] == $mail) {
                     $compteurmail = 1;
                     
                     break;
                }
            }

            if($compteurmail == 1 && $compteuridentifiant == 1) {
                echo "<script language='javascript'> alert('Un mail vous a été envoyé avec vos identifiants'); </script>";
               header("Refresh: 1; motdepasse.php");
            }
            else {
                echo "<script language='javascript'> alert('Identifiant ou mail incorrect'); </script>";
                header("Refresh: 1; motdepasse.php");
            }
    ?>
   

    </body>
</html>
