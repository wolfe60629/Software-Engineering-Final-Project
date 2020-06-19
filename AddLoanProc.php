<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


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

$loanAccepted = False;
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


#Data From Last Form
  $ID = $_POST['Dealership_ID'];
  $year = $_POST['year'];
  $make = $_POST['make'];
  $vin = $_POST['vin'];
  $model = $_POST['model'];
  $comments = $_POST['comments'];
  $loan_amount = $_POST['loan_amount'];
  $Dealer_Name = $_POST['Dealership_Name'];

    #Connect To Database
	$conn = sqlsrv_connect($serverName, $connectionInfo);

	#Check Connection
    if (!$conn)
    {
        $queryErrors = sqlsrv_errors();
        echo "<script type='text/javascript'>alert('$queryErrors');</script>";
        die(print_r(sqlsrv_errors() , true));

	   }

	#Query Database

  #add loan
  $query = "exec INSERTLOANPROC @Dealer_ID=" . $ID . ", @CarYear=" . $year . ", @Make='" . $make . "', @Model='" . $model . "', @VIN='" . $vin . "', @Loan_Amount=" . $loan_amount;
  $sql = sqlsrv_query($conn , $query);

  $query = "select apr_rate, loan_id from loan l join vehicle v on l.vehicle_id = v.vehicle_id where v.vin = '" . $vin . "'";
  $sql = sqlsrv_query($conn , $query);

    while ($data = sqlsrv_fetch_array($sql)) {
        $loanAccepted = True;
        $APR_Rate = $data['apr_rate'];
        $Loan_ID = $data['loan_id'];
  }


    #Check if loan Accepted
  if ($loanAccepted) {
    $Loan_Status= "Loan Accepted";
  }

  if (!$loanAccepted) {
    $APR_Rate = 0;
    $Loan_Status= "Loan Denied";
    $Loan_ID = 0;
  }


  #close SQL connection
		sqlsrv_close($conn);



    ## Call Javascipt For Form Posting to LoanStatusPage



?>
<html>

<form style: "visibility:none;" name="post" id="form" action="LoanStatusPage.php" method="post">
    <input type="text" name="APR_Rate" value="<?php echo $APR_Rate ?>"/>
              <input type="text" name="Dealer_Name" value="<?php echo $Dealer_Name ?>"/>
              <input type="text" name="loan_amount" value="<?php echo $loan_amount ?>"/>
               <input type="text" name="Loan_Status" value="<?php  echo $Loan_Status ?>"/>
              <input type="text" name="Loan_ID" value="<?php echo $Loan_ID ?>"/>
            </form>

</html>
<script>
var form = document.getElementById("form");
form.submit();
</script>
