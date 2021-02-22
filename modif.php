<?php include('header.php');

if (isset($_POST['submit3'])) {
    $id=$_POST['ID1'];



   $req3="DELETE FROM Info_Carte WHERE ID=$id";


    $conn->query($req3);
   header('location:list.php');

}  else {?>

<?php if (isset($_POST['submit1'])) {


    $id=$_POST['ID'];
    $GLOBALS['ID']=$_POST['ID'];
    $req1 = "SELECT * FROM Info_Carte WHERE ID='$id'";

    if(!is_null ($conn->query($req1))) {

        foreach  ($conn->query($req1) as $donnees) {?>

            <tr>



                <td><?php echo $donnees['ID'];?></td>
                <td><?php echo $donnees['Prenom'];?></td>
                <td><?php echo $donnees['Nom'];?></td>
                <td><?php echo $donnees['Email'];?></td>
                <td><?php echo $donnees['Numero'];?></td>
                <td><?php echo $donnees['Entreprise'];?></td>
                <td><?php echo $donnees['role_entreprise'];?></td>
<form  action='modif.php' method="post"><td>
<input type="hidden" value= <?php echo $donnees['ID'] ?> name="ID1"/>
<input type="submit" name ='submit3'value="supprimer" /></td></form>




            </tr>

    <?PHP

    } }
    ?>









<?php } else{ ?>
    <form action="modif.php" method="post">
    <p>selectionner l`ID de la carte que vous voulez supprimer en utilisant le referencement de la liste  </p>
    <input type="number" name="ID" />

    <input type="submit" name ='submit1'value="Valider" />
<?php }}
    ?>
