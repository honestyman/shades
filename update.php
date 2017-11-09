<?php
    include('config.php');

    $user = $_SESSION['current_user'];

    if(isset($_GET['bestScore'])){
	
        //get data from ajax call
        $bestlevel = $_GET['bestLevel'];
        $bestscore = $_GET['bestScore'];
        
        //update player's data
        $result  = mysqli_query($dbcon , "UPDATE tbl_players SET best_level = '$bestlevel', best_score = '$bestscore', date_last_played = now() WHERE nickname='$user'");
        if($result){
            setcookie('current-snotice', 'Thank you for playing. Your recent best score has been updated!', time()+5);
        }
    }
?>

<?php 

    $table  = mysqli_query($dbcon ,'SELECT * FROM tbl_players ORDER BY best_score DESC LIMIT 10');
    $id = 0;
    while($row  = mysqli_fetch_array($table)){ 

    $date_played = strtotime($row['date_last_played']);

    echo "<tr>
        <td>" . ++$id . "</td>
        <td>" . $row['nickname'] . "</td>
        <td>" . date("M d, Y", $date_played) . "</td>
        <td>" . $row['best_level'] . "</td>
        <td>" . $row['best_score'] . "</td>
    </tr>";
    } 

?>