<div class="modal-wrap leaderboard hidden">
    <span class="modal-close"></span>
    <div class="modal-container modal-leaderboard">
        <div class="modal-head">
            <h1>Leaderboard</h1>
        </div>
        <div class="modal-body">
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Player</th>
                        <th>Last Game</th>
                        <th>Best Level</th>
                        <th>Best Score</th>
                    </tr>
                </thead>
                
                <tbody>
                   <?php $table  = mysqli_query($dbcon ,'SELECT * FROM tbl_players WHERE status = "active" ORDER BY best_score DESC LIMIT 10');
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
} ?>
                    
                </tbody>
                
            </table>
            
            <?php if($_SERVER['SCRIPT_NAME'] == '/shades/guest/index.php')
            echo '<a class="modal-btn" href=' .  $SITE_URL . ' style="margin-top: 10px;">Register to become one of the top players</a>'?>
        </div>
    </div>
</div>