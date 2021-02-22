


<?php

            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "CarteDeVisite";

            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$dbname);

            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            ;
        ?>

<?php if (isset($_POST['submit'])) {




    $name = htmlspecialchars($_POST['Nom']);
    $password = htmlspecialchars($_POST['password']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = $_POST['Email'];
    $numero = htmlspecialchars($_POST['numero']);
    $entreprise = htmlspecialchars($_POST['Entreprise']);
    $password= hash ( 'md5',$password, false );
if(is_null($numero)){

    $sql = "INSERT INTO users (email, password, prenom,nom,company,telephone) VALUES ( '$email','$password','$prenom','$name', '$entreprise','$numero')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('l'enregistement a bien été effectué');</script>";
      header('location:connexion.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
else{
  $sql = "INSERT INTO users (email, password, prenom,nom,company) VALUES ( '$email','$password','$prenom','$name', '$entreprise')";

  if ($conn->query($sql) === TRUE) {
      echo "<script type='text/javascript'>alert('l'enregistement a bien été effectué');</script>";
    header('location:connexion.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


}

    ?>






<?php } else {?>
<form action="index.php" method="post">
<p> remplissez les inormations pour creer votre compte:

    <p>prenom: </p>
    <input type="text" name="prenom" required/>
    <p>Nom: </p>
    <input type="text" name="Nom" required/>
    <p>Mot de passe: </p>
    <input type="password" name="password" required/>
    <p>Email: </p>
    <input type="email" name="Email" />
    <p>Numero: </p>
    <input type="tel" name="numero" />
    <p>Entreprise: </p>
    <input type="text" name="Entreprise" />


    <input type="submit" name ='submit'value="Valider" />
</p>
</form>
<p> Vous Avez déjà un compte  <a href='connexion.php'><span>Connectez-vous</span></a> </p>


<?PHP }?>
