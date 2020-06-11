<?php
#DEFINE
session_start();
if(!isset($_SESSION['userlogin'])) {
  header("Location: ./Login.php");
}

#Added for linux development
$devPlatform = parse_ini_file('devPlatform.ini')['platform'];

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


if ($_POST["vin"])
{
  $ID = $_POST['Dealership_ID'];
  $year = $_POST['year'];
  $make = $_POST['make'];
  $vin = $_POST['vin'];
  $model = $_POST['model'];
  $comments = $_POST['comments'];
  $loan_amount = $_POST['loan_amount'];
  $APR_Rate = "3.3";
    #Connect To Database
	$conn = sqlsrv_connect($serverName, $connectionInfo);

	#Check Connection
    if (!$conn)
    {
        echo "Connection could not be established";
        die(print_r(sqlsrv_errors() , true));
	   }

	#Query Database

	$query = "exec INSERTLOANPROC @Dealer_ID=" . $ID . ", @CarYear=" . $year . ", @Make=" . $make . ", @Model=" . $model . ", @VIN=" . $vin . ", @Loan_Amount=" . $loan_amount . ", @APR_RATE=" . $APR_Rate;
  sqlsrv_query($conn , $query);
  echo $query;
		sqlsrv_close($conn);

    }


    if (isset($_SESSION['Is_Supervisor'])) {
    	header("Location: ./Supervisor/supervisorPage.php");
    }else {
      header("Location: ./Employee/mainPage.php");
    }

?>
