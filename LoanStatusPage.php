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


				$Dealer_Name = $_POST['Dealer_Name'];
				$APR_Rate = $_POST['APR_Rate'];
				$Loan_Amount = $_POST['loan_amount'];
				$Loan_Status = $_POST['Loan_Status'];
				$Loan_ID = $_POST['Loan_ID'];

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS\LoanStatusPage.css?id=1234">

<title>Loan Status Page</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark container-fluid-nav">
            <img src="./Images/bankLogo.png" height="80px" alt="bankLogo">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav" style="">
                <h1 class="text-center title-nav">Loan Status Page</h1>
							<h4 class= "text-right"> <a href="<?php echo $locationToReturn; ?>" class="btn btn-secondary btn-lg active"> <b>Return To Dashboard</b></a></h4>
              <h4 class= "text-right"> <a href="./LogoutProc.php" class="btn btn-secondary btn-lg active"> <b>Logout</b></a></h4>
            </div>
        </div>
    </nav>

<div style = "margin-left: 28%; margin-top:100px;">
<h2 style = "color:white;">Name of Dealer: <?php echo $Dealer_Name ?></h2>
<h3 style = "color:white;">Loan ID Number: <?php echo $Loan_ID ?></h3>
<h3 style = "color:white;">Loan Amount: $<?php echo $Loan_Amount ?></h3>
<h3 style = "color:white;">Loan Status: <?php echo $Loan_Status ?></h3>
<h3 style = "color:white;">APR Rate: <?php echo $APR_Rate ?>%</h3>
<button class="btn btn-secondary btn-lg active" onclick="window.print();return false;" style="margin-top:10px;">Print this Page!</button>
</div>



</body>
</html>
