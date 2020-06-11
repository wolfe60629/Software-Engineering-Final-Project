<?php
	session_start();
	if(!isset($_SESSION['userlogin'])) {
		header("Location: ./Login.php");
	}

	if (isset($_SESSION['Is_Supervisor'])) {
		$locationToReturn = "./Supervisor/supervisorPage.php";
	}else {
		$locationToReturn = "./Employee/mainPage.php";
	}

	if (empty($_GET['Dealership_ID']))
{
  header('Location:' . $locationToReturn);
  exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<script src="JScript/SendLogin.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS\LoanStatusPage.css?id=1234">

<title>Web Application Main</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark container-fluid-nav">
            <img src="./Images/bankLogo.png" height="80px" alt="bankLogo">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav" style="">
                <h1 class="text-center title-nav">Loan Request</h1>
							<h4 class= "text-right"> <a href="<?php echo $locationToReturn; ?>" class="btn btn-secondary btn-lg active"> <b>Return To Dashboard</b></a></h4>
              <h4 class= "text-right"> <a href="./LogoutProc.php" class="btn btn-secondary btn-lg active"> <b>Logout</b></a></h4>
            </div>
        </div>
    </nav>



</body>
</html>
