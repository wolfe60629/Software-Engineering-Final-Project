<?php
#DEFINE
session_start();
if(!isset($_SESSION['userlogin'])) {
  header("Location: ../Login.php");
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




if ($_POST["username"] || $_POST["password"])
{

    #Connect To Database
	$conn = sqlsrv_connect($serverName, $connectionInfo);

	#Check Connection
    if (!$conn)
    {
        echo "Connection could not be established";
        die(print_r(sqlsrv_errors() , true));
	   }

	#Query Database
#	$query = "select USER_ID, IS_SUPERVISOR from users where username= '" . $username . "' AND password_hash = HASHBYTES('SHA2_512', '" . $password . "');";
#    $result = sqlsrv_query($conn , $query);

#    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);




		sqlsrv_close($conn);

    }


    if (isset($_SESSION['Is_Supervisor'])) {
    	header("Location: ../Supervisor/supervisorPage.php");
    }else {
      header("Location: ../Employee/mainPage.php");
    }

?>
