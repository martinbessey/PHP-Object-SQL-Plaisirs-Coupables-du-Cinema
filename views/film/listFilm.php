<?php
ob_start();

?>
<div class="flex">
<h2><?= $film->rowCount();?>films enregistrés</h2>
<div>
<table>
   <thread>
   <tr>
      <th>Titre</th>
      <th>Film </th>
      <th>Réalisateur</th>
   
   </tr>
   
   </thread>
    <tbody> 
         <?php
         while($film =$films->fetch()){
             echo "<tr><td><a href='index.php?action=detailFilm&id=".$film['idreal'].">".$film ['titre']."</a></td>";
             echo "<td>".$film ['duree']."</td>";
             echo "<td>".$film ['annee']."</td></tr>";
             echo "<td><a href='index.php?action=detailRealisateur&id=".$film['idreal'].">".$film['nom']."</a></td></tr>";
         }
        ?>
    </tbody>
</table>

<?php

$titre = "La liste des films";
$contenu = ob_end_clean();
require "views/template.php";
