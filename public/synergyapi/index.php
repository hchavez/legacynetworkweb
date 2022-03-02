
<?php

/****************************************************************************************************************/

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$mysqli = new mysqli("localhost", "ln_dbuser", "2lvZa32)ixCG", "ln_stagingdb");
$mysqli = new mysqli("localhost", "root", "", "dev_legacynetwork");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
//$sql = "SELECT * FROM users";

$sql = "SELECT * FROM users WHERE synergy_id = '1242422'";

if($result = $mysqli->query($sql)){	
    if($result->num_rows > 0){
        echo "<table>";	
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>synergy_id</th>";
                echo "<th>leftLegCv</th>";
                echo "<th>rightLegCv</th>";
                echo "<th>actualValue</th>";
            echo "</tr>";
	
	        while($row = $result->fetch_array()){

	        	 $thismonth = date('Ym');
	        	 $url = "https://api.synergyworldwide.com/distributorservice/api/DistributorManagement/AccountData?customerId=".$row['synergy_id']."&periodID=".$thismonth;

 				 $response = json_decode(file_get_contents($url), true);
 				  var_dump($response);

 				   echo '<br><br><br>';

 				 if ($response){
		            echo "<tr>";
		            echo "<td>" . $row['id'] . "</td>";
		            echo "<td>" . $row['first_name'] . "</td>";
		            echo "<td>" . $row['last_name'] . "</td>";
		            echo "<td>" . $row['synergy_id'] . "</td>";
		            echo "<td>" . $row['synergy_left_leg_cv'] . "</td>";
		            echo "<td>" . $row['synergy_right_leg_cv'] . "</td>";
		            echo "<td>" . $row['synergy_actual_value'] . "</td>";	
		            echo "</tr>";

		            //var_dump($response);
		            $synergy_account_number = $response['accountNumber'];
                    $synergy_tracking_center_1 = $response['trackingCenter1'];
                    $synergy_tracking_center_2 = $response['trackingCenter2'];
                    $synergy_tracking_center_3 = $response['trackingCenter3'];
                    $synergy_left_leg_cv = $response['leftLegCv'];
                    $synergy_right_leg_cv = $response['rightLegCv'];
                    $synergy_personally_sponsored_count = $response['personallySponsoredCount'];
                    $synergy_team_member_count = $response['teamMemberCount'];
                    $synergy_preferred_customer_count = $response['preferredCustomerCount'];
                    $synergy_highest_title_id = $response['highestTitleID'];
                    $synergy_highest_title_desc = $response['highestTitleDesc'];
                    $synergy_current_title_id = $response['currentTitleID'];
                    $synergy_current_title_desc = $response['currentTitleDesc'];
                    $synergy_next_title_id = $response['nextTitleID'];
                    $synergy_next_title_desc = $response['nextTitleDesc'];
                    $synergy_next_highest_title_id = $response['nextHighestTitleID'];
                    $synergy_next_highest_title_desc = $response['nextHighestTitleDesc'];
                    $synergy_actual_value = $response['actualValue'];

		            // Attempt update query execution
					
					$sqlupdate = "UPDATE users SET synergy_account_number = '$synergy_account_number', synergy_tracking_center_1 = '$synergy_tracking_center_1',synergy_tracking_center_2 = '$synergy_tracking_center_2',synergy_tracking_center_3 = '$synergy_tracking_center_3',synergy_left_leg_cv = '$synergy_left_leg_cv',synergy_right_leg_cv = '$synergy_right_leg_cv', synergy_personally_sponsored_count = '$synergy_personally_sponsored_count',synergy_team_member_count = '$synergy_team_member_count', synergy_preferred_customer_count = '$synergy_preferred_customer_count',synergy_highest_title_id = '$synergy_highest_title_id',synergy_highest_title_desc = '$synergy_highest_title_desc',synergy_current_title_id = '$synergy_current_title_id',synergy_current_title_desc = '$synergy_current_title_desc',synergy_next_title_id = '$synergy_next_title_id',synergy_next_title_desc = '$synergy_next_title_desc', synergy_next_highest_title_id = '$synergy_next_highest_title_id', synergy_next_highest_title_desc = '$synergy_next_highest_title_desc', synergy_actual_value = '$synergy_actual_value', updated_at = now(), mail_achievement = '1' WHERE synergy_id='$synergy_account_number'";

					echo $sqlupdate."<br>"; 

					echo "---------------------------|||||||| ".$synergy_left_leg_cv."||||||||||||----------------------<br>";

					if($mysqli->query($sqlupdate) === true){
						    echo "Records were updated successfully. <br>";
						} else{
						    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
					}


					$prevmonth = date('Ym', strtotime("last month"));

					$urllastmonth = "https://api.synergyworldwide.com/distributorservice/api/DistributorManagement/AccountData?customerId=".$row['synergy_id']."&periodID=".$prevmonth;

 				    $responselastmonth = json_decode(file_get_contents($urllastmonth), true);
		             
 				    //var_dump($responselastmonth);


 				     if ($responselastmonth) {
                         $synergy_prev_value = $responselastmonth['actualValue'];
                         $synergy_prev_left_leg_cv = $responselastmonth['leftLegCv'];
                         $synergy_prev_right_leg_cv = $responselastmonth['rightLegCv'];

	                    $sqlupdatelastmonth = "UPDATE users SET synergy_prev_left_leg_cv = '$synergy_prev_left_leg_cv',synergy_prev_right_leg_cv = '$synergy_prev_right_leg_cv',  synergy_prev_value = '$synergy_prev_value', updated_at = now() WHERE synergy_id='$synergy_account_number'";

						if($mysqli->query($sqlupdatelastmonth) === true){
							    echo "Last month Records were updated successfully.<br>";
							} else{
							    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
						}

					}	
	

			     }else{
			        	echo "<tr>";
		                echo "<td> NO Data Found </td>";
		                echo "<td></td>";
		                echo "<td></td>";
		                echo "<td></td>";
		            	echo "</tr>";
			    }

	        }

        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();

/****************************************************************************************************************/

?>