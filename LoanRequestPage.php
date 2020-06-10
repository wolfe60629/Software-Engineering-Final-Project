<?php
	session_start();
	if(!isset($_SESSION['userlogin'])) {
		header("Location: ../Login.php");
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
<link rel="stylesheet" href="CSS\LoanRequestPage.css?id=1234">

<title>Web Application Main</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark container-fluid-nav">
            <img src="../Images/bankLogo.png" height="80px" alt="bankLogo">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav" style="">
                <h1 class="text-center title-nav">Loan Request</h1>
							<h4 class= "text-right"> <a href="../Supervisor/supervisorPage.php" class="btn btn-secondary btn-lg active"> <b>Return To Dashboard</b></a></h4>
              <h4 class= "text-right"> <a href="../LogoutProc.php" class="btn btn-secondary btn-lg active"> <b>Logout</b></a></h4>
            </div>
        </div>
    </nav>

		<form class = "Vehicle_Information" action= "AddLoanProc.php" id = "Vehicle_Information" method = "POST" autocomplete="off">
<div class="form-row">
			<div class="col-md-4">
			<input type="text" style = "" name = "Dealership_Name" class="form-control form-control-lg" id="Dealership_Name" placeholder="Dealership Name" readonly>
		</div>
		<div class="col-md-4">
		<input type="text" style = "margin-bottom:20px" name = "Dealership_ID" class="form-control form-control-lg" id="Dealership_ID" placeholder="Dealership ID" readonly>
	</div>
		</div>
		  <div class="form-row">
		    <div class="form-group col-md-4">
					<h3>Vehicle Information</h3>
		      <input type="text" name = "year" class="form-control form-control-lg" id="year" placeholder="Year">
					<input type="text" name = "make" class="form-control form-control-lg" id="make" placeholder="Make">
					<input type="text" name = "model" class="form-control form-control-lg" id="model" placeholder="Model">
					<input type="text" name = "vin" class="form-control form-control-lg" id="vin" placeholder="VIN">
		    </div>

		    <div class="form-group col-md-4">
					<h3>Requested Loan Amount</h3>
		      <input type="text" name = "loan_amount" class="form-control form-control-lg" id="Loan_Amount" placeholder="Loan Amount">
					<h3>Addional Comments</h3>
					<input type="text"  name = "comments" class="form-control form-control-lg" id="Loan_Amount" placeholder="Addional Comments">
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary" form = "Vehicle_Information">Submit Loan</button>
		</form>

</body>
</html>
<script>
var hashParams = window.location.hash.substr(1).split('&'); // substr(1) to remove the `#`
for(var i = 0; i < hashParams.length; i++){
    var p = hashParams[i].split('=');
    document.getElementById(p[0]).value = decodeURIComponent(p[1]);;
}
</script>
