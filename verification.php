<?php
session_start();
if(isset($_POST['prenom']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'CarteDeVisite';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');


    $prenom= mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom']));
    $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom']));
    $password = htmlspecialchars($_POST['password']);
    $password= hash ( 'md5',$password, false );


    if($prenom !== "" && $password !== ""&& $nom !== "")
    {
        $requete = "SELECT ID, count(*) FROM users where
              nom = '".$nom."' and password = '".$password."' and prenom = '".$prenom."' GROUP BY ID ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);



        $count = $reponse['count(*)'];



        if($count!=0)
        {
           $id=$reponse['ID'];

           $_SESSION['ID'] = $id;

           $_SESSION['nom'] = $nom;
           $_SESSION['prenom'] = $prenom;

           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1');
        }
    }
    else
    {
       header('Location: login.php?erreur=2');
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); 
?>



<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">

            <?php
                session_start();
                if($_SESSION['prenom'] !== ""){
                    $user = $_SESSION['prenom'];

                    echo "Bonjour $prenom, vous êtes connecté";
                }
            ?>

        </div>
    </body>
</html>



<html>
    <head>
        <meta charset="utf-8">


    </head>
    <body style='background:#fff;'>
        <div id="content">

            <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>


            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                {
                   if($_GET['deconnexion']==true)
                   {
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if($_SESSION['nom'] !== ""){
                    $user = $_SESSION['nom'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>

        </div>
    </body>
</html>
