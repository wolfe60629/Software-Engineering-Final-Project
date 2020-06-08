<?php
#DEFINE
session_start();
$config = parse_ini_file('C:\ServerFolders\PHP\Project\db.ini');
#Temporary INI FIle For Linux Server
$config = parse_ini_file('/home/jeremy/Documents/SoftwareEngineeringProject/Temporary/db.ini');
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
	$query = "select count(*) as \"Count\" from users where username= '" . $username . "' AND password_hash = HASHBYTES('SHA2_512', '" . $password . "');";
    $result = sqlsrv_query($conn , $query);

    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);


	#CHECK TO SEE IF CRED ARE RIGHT
			if ($row['Count'] == 1) {
				echo "1";
				$_SESSION['userlogin'] = $username;
			}else {
				$message = "Username and/or Password incorrect.";
				echo $message;

			}
		sqlsrv_close($conn);

    }


?>
