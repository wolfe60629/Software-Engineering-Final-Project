<?php
####################DEFINE#############################################################
session_start();

$devPlatform = parse_ini_file('devPlatform.ini')['platform'];
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

$Dealer_ID = $_POST['Dealership_ID'];

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
	$query = "exec GetLoanRecordsProc @Dealer_ID = '" . $Dealer_ID . "'";
  $sql = sqlsrv_query($conn , $query);

#Print To Table
	   echo "<tr role=\"row\" class=\"odd\">";
    while ($data = sqlsrv_fetch_array($sql)) {
        echo '<tr class = "text-center">';
        echo"<td>" . $data['Loan_ID'] . "</td>";
        echo"<td>" . $data['Year'] . "</td>";
				echo"<td>" . $data['Make'] . "</td>";
				echo"<td>" . $data['Model'] . "</td>";
				echo"<td>" . $data['VIN'] . "</td>";
				echo"<td>" . $data['Loan_Amount'] . "</td>";
				echo"<td>" . $data['APR'] . "</td>";
                echo '</tr>';
        echo "</tr>";

      }
		sqlsrv_close($conn);
?>
