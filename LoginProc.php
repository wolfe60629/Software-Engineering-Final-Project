<?php
#DEFINE
session_start();


#Added for linux development
$devPlatform = parse_ini_file('devPlatform.ini')['platform'];

if ($devPlatform === 'linux') {
  $config = parse_ini_file('/home/jeremy/Documents/SoftwareEngineeringFinalProject/Temporary/db.ini');
} elseif ($devPlatform === 'windows') {
  $config = parse_ini_file('C:\ServerFolders\PHP\Project\db.ini');
}

$username = $_POST['username'];
$password = $_POST['password'];
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
        echo "Connection could not be established.<br />";
        die(print_r(sqlsrv_errors() , true));
	}

	#Query Database
	$query = "select USER_ID, IS_SUPERVISOR from users where username= '" . $username . "' AND password_hash = HASHBYTES('SHA2_512', '" . $password . "');";
    $result = sqlsrv_query($conn , $query);

    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);


	#CHECK TO SEE IF CRED ARE RIGHT
			if ($row != NULL) {

				$_SESSION['userlogin'] = $username;
        $_SESSION['User_ID'] = $row['USER_ID'];

        #set supervisor if supervisor
        if ($row['IS_SUPERVISOR'] == 1) {
          		$_SESSION['Is_Supervisor'] = 1;
              echo $row['IS_SUPERVISOR'];
        }
        if ($row['IS_SUPERVISOR'] == 0){
              echo $row['IS_SUPERVISOR'];
        }

			}else {
				$message = "Username and/or Password incorrect.";
				echo $message;
			}
		sqlsrv_close($conn);

    }


?>
