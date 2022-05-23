<?php include("database.php"); ?>
<?php



$i=1;
$number =1;



if(isset($_POST['number'])){
    $number = $_POST['number'];
    
    // Delete une question
    // Make post near buttons to execute this and refresh if pressed on delete buttoon
    // Delete query

    $sql = "DELETE FROM questions WHERE question_number = ?;";
    // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $number);
    $stmt ->execute() or die($mysqli->error.__LINE__);


    $sql = "DELETE FROM choices WHERE question_number = ?;";
    // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $number);
    $stmt ->execute() or die($mysqli->error.__LINE__);





}










// Get Total Questions
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total_quest = $results->num_rows;
//fin index.php



// Get questions
$query = "SELECT * FROM questions
            ";
// Make array of choices id
$retval = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question_nb_arr = array();
$question_text_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $question_nb_arr[]=$row[0];
    $question_text_arr[]=$row[1];
}



// Get Choices
$query = "SELECT * FROM choices
          ";
// Make array of choices id
$retval = $mysqli->query($query) or die($mysqli->error.__LINE__);
$choices_id_arr = array();
$choices_text_arr = array();
$iscorrect_arr = array();

while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
    $choices_id_arr[]=$row[0];
    $choices_text_arr[]=$row[3];
    $iscorrect_arr[]=$row[2];
}

$correct_choice="";

/*
if($iscorrect_arr[6*($i-1)]==1){
    $correct_choice ="1";
} else if($iscorrect_arr[6*($i-1)+1]==1){
    $correct_choice ="2";
} else if($iscorrect_arr[6*($i-1)+2]==1){
    $correct_choice ="3";
}  else if($iscorrect_arr[6*($i-1)+3]==1){
    $correct_choice ="4";
}  else if($iscorrect_arr[6*($i-1)+4]==1){
    $correct_choice ="5";
}  else if($iscorrect_arr[6*($i-1)+5]==1){
    $correct_choice ="6";
}
*/

/*
if(isset($_POST['number'])){
    $number = $_POST['number'];
    
    // Delete une question
    // Make post near buttons to execute this and refresh if pressed on delete buttoon
    // Delete query

    $sql = "DELETE FROM questions WHERE question_number = ?;";
    // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $number);
    $stmt ->execute() or die($mysqli->error.__LINE__);


    $sql = "DELETE FROM choices WHERE question_number = ?;";
    // pour finalv3 :Check if : SELECT * FROM score_user where (jour = ? AND id_user_etr = ?)
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $number);
    $stmt ->execute() or die($mysqli->error.__LINE__);

echo "question nb".$number."has been deleted";



} else { 
    echo "question hasnt been deleted";}









*/


?>




<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Score</title>
    <link rel="stylesheet" href="CSS/GestionTickets.css"/>
    </head>

    <body>
        <header>
        </header>

   
<h1> Gestion des questions</h1>
        <div>
            <br>
        <table class="tickets_support">
            <thead>
            <tr>
                <th class="row1">Question</th> <!-- identifiant du ticket -->
                <th class="row2">Choix 1</th> <!-- titre du ticket -->
                <th class="row3">Choix 2</th> <!-- priorité du ticket -->
                <th class="row6">Choix 3</th> <!-- état du ticket -->
                <th class ="row7">Choix 4</th>
                <th class ="row7">Choix 5</th>
                <th class ="row7">Choix 6</th>
                <th class ="row7">Bonne Réponse</th>
                <th class="row5">Actions possibles</th>
            </tr>
            </thead>
            <tbody>
            <?php // foreach ($liste as $element) { ?>
               <?php  while($i<=$total_quest){
                    if($iscorrect_arr[6*($i-1)]==1){
                        $correct_choice ="1";
                    } else if($iscorrect_arr[6*($i-1)+1]==1){
                        $correct_choice ="2";
                    } else if($iscorrect_arr[6*($i-1)+2]==1){
                        $correct_choice ="3";
                    }  else if($iscorrect_arr[6*($i-1)+3]==1){
                        $correct_choice ="4";
                    }  else if($iscorrect_arr[6*($i-1)+4]==1){
                        $correct_choice ="5";
                    }  else if($iscorrect_arr[6*($i-1)+5]==1){
                        $correct_choice ="6";
                    }
                ?>
            <tr>
                <td>
                <?php echo $question_text_arr[$i-1]; ?>
                </td>
                <td>
                <?php echo  $choices_text_arr[6*($i-1)]; ?><?php //echo $element['sujet']; ?>
                </td>
                <td>
                <?php echo  $choices_text_arr[6*($i-1)+1]; ?><?php //echo $element['sujet']; ?>
                </td>
                <td>
                <?php echo  $choices_text_arr[6*($i-1)+2]; ?>
                </td>
                <td>
                <p> <?php echo  $choices_text_arr[6*($i-1)+3]; ?><p>
                </td>
                <td>
                <p> <?php echo  $choices_text_arr[6*($i-1)+4]; ?><p>
                </td>
                <td>
                <p> <?php echo  $choices_text_arr[6*($i-1)+5]; ?><p>
                </td>
                <td>
                   <?php echo $correct_choice; ?>
                </td>
                <td>
                <!--
                    <form action ='' method ='GET' onsubmit="return confirmer_supprimer();"> 
                        <input type="hidden" name = "action" value ='supprimer'/>
                        <input type ="hidden" name="id_question" value ='<?php // echo $element['id_ticket'];?>'/>
                        <button type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>    -->
                    <form method="post" action ="CodeTheo.php">
                        <label>Supprimer la question </label>
                        <input type="hidden" name="number" value="<?php  echo $question_nb_arr[$i-1]; ; ?>" />   
                        <input type="submit" name="submit" value="submit" />   
                    </form>
                   
                </td>
            </tr> 
            <?php  $i++;}  ?>
            <?php // } ?>
            <tbody>
        </table>
    </div>  


    
<script>
    function confirmer_supprimer(){
    if (confirm ("Voulez vous vraiment supprimer cette question ? ")){ 
        return true;
    }else {
        return false; 
    }   
}  

</script>

</body>

</html>