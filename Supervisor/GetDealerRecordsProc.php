<?php
####################DEFINE#############################################################
session_start();
$User_ID = $_SESSION['User_ID'];
$devPlatform = parse_ini_file('../devPlatform.ini')['platform'];
#Added for linux development
if ($devPlatform === 'linux') {
  $config = parse_ini_file('/home/jeremy/Documents/SoftwareEngineeringFinalProject/Temporary/db.ini');
} elseif ($devPlatform === 'windows') {
  $config = parse_ini_file('C:\ServerFolders\PHP\Project\db.ini');
}
$dbHost = $config['host'];
$dbUser = $config['username'];
$dbPass = $config['password'];
$dbToConnect = $config['db'];
$serverName = $config['host'];
$connectionInfo = array(
    "Database" => $dbToConnect,
    "UID" => $dbUser,
    "PWD" => $dbPass
);



#VERBOSE
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

#Connect To Database
	$conn = sqlsrv_connect($serverName, $connectionInfo);

#Check Connection
    if (!$conn)
    {
        echo "Connection could not be established.<br />";
        die(print_r(sqlsrv_errors() , true));
	}

#Query Database
	$query = "exec GetAssignedDealers @user_id = " . $User_ID;
    $sql = sqlsrv_query($conn , $query);

#Print To Table
	   echo "<tr role=\"row\" class=\"odd\">";
            while ($data = sqlsrv_fetch_array($sql)) {

        echo '<tr class = "text-center">';
        echo"<td>" . $data['Dealer_Name'] . "</td>";
				echo"<td>" . $data['Count'] . "</td>";
				echo"<td>" . $data['Address1'] . "</td>";
				echo"<td>" . $data['Address2'] . "</td>";
				echo"<td>" . $data['City'] . "</td>";
				echo"<td>" . $data['State'] . "</td>";
				echo"<td>" . $data['Zip'] . "</td>";
				echo"<td>" . $data['Dealer_Score'] . "</td>";
				echo "<td><button type=\"button\" class=\"btn btn-success loanbutton\">View Loans</button> <button type=\"button\" class=\"btn btn-success\">Create New Loan</button> </td>";
                echo '</tr>';
            }

        echo "</tr>";


		sqlsrv_close($conn);
?>
