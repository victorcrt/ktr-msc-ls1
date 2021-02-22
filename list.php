<?php include('header.php'); ?>



<?php
session_start();
$ID=$_SESSION['ID'];

$req = "SELECT * FROM Info_Carte where ID_User=$ID";

if (isset($_POST['submit'])) {


}



if(!is_null ($conn->query($req))) {
     ?>
<a>Find a Card </a>
<input type="text" name="search" id="search" class="form-control" />
    <table id="CarteDeVisite">
            <tr>
                <th>id</th>
                <th>prenom</th>
                <th>nom</th>
                <th>email</th>
                <th>numero</th>
                <th>Entreprise</th>
                <th>role dans l`entreprise</th>

            </tr>
        <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
        foreach  ($conn->query($req) as $donnees) {
        ?>
            <tr>
                <td><?php echo $donnees['ID'];?></td>
                <td><?php echo $donnees['Prenom'];?></td>
                <td><?php echo $donnees['Nom'];?></td>
                <td><?php echo $donnees['Email'];?></td>
                <td><?php echo $donnees['Numero'];?></td>
                <td><?php echo $donnees['Entreprise'];?></td>
                <td><?php echo $donnees['role_entreprise'];?></td>




            </tr>
        <?php
        }
        ?>
    <table>



   <?php
} else {
  echo "Error: " . $req . "<br>" . $conn->error;
}
        ?>


<script>
      $(document).ready(function(){
           $('#search').keyup(function(){
                search_table($(this).val());
           });
           function search_table(value){
                $('#CarteDeVisite tr').each(function(){
                     var found = 'false';
                     $(this).each(function(){
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                          {
                               found = 'true';
                          }
                     });
                     if(found == 'true')
                     {
                          $(this).show();
                     }
                     else
                     {
                          $(this).hide();
                     }
                });
           }
      });
 </script>
