<?php include('header.php'); ?>




<?php if (isset($_POST['submit'])) {

session_start();


    $name = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = $_POST['Email'];
    $numero = htmlspecialchars($_POST['numero']);
    $entreprise = htmlspecialchars($_POST['Entreprise']);
    $job = htmlspecialchars($_POST['role']);
    $id_user=$_SESSION['ID'];
  if(!is_null($numero)){
    $numero=0;}


    $sql = "INSERT INTO Info_Carte (Prenom, Nom, Email, Numero, Entreprise, role_entreprise,ID_User) VALUES ('$prenom', '$name', '$email', '$numero','$entreprise','$job','$id_user')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('l'enregistement a bien été effectué');</script>";
      header('location:list.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }





    ?>






<?php } else {?>
<form action="registration.php" method="post">
<p>

    <p>prenom: </p>
    <input type="text" name="prenom" />
    <p>Nom: </p>
    <input type="text" name="Nom" />
    <p>Email: </p>
    <input type="email" name="Email" requiered/>
    <p>Numero: </p>
    <input type="tel" name="numero" />
    <p>Entreprise: </p>
    <input type="text" name="Entreprise" />
    <p>role dans l`entreprise: </p>
    <input type="text" name="role" />

    <input type="submit" name ='submit'value="Valider" />
</p>
</form>



<?PHP }?>
