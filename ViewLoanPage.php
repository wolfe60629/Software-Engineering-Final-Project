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

	if (empty($_POST['Dealership_ID']))
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
<link rel="stylesheet" href="CSS\MainPage.css?id=1234">

<title>Web Application Main</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark container-fluid-nav">
            <img src="./Images/bankLogo.png" height="80px" alt="bankLogo">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav" style="">
                <h1 class="text-center title-nav"></h1>
								<h4 class= "text-right"> <a href="<?php echo $locationToReturn; ?>" class="btn btn-secondary btn-lg active"> <b>Return To Dashboard</b></a></h4>
              <h4 class= "text-right"> <a href="./LogoutProc.php" class="btn btn-secondary btn-lg active"> <b>Logout</b></a></h4>
            </div>
        </div>
    </nav>


<div class="Assigned_Dealers">
<h2 class = "panel-heading">Current Loans</h2>
<div class="panel panel-default"> <div class="row"><div class="col-sm-12 col-md-12"><table ui-jq="dataTable"  class="table table-striped b-t b-b dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row" class="font-bold text-center no_border">
                            <th style="width: 150px;" class="sorting_asc no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descendig" aria-sort="ascending">Loan ID</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Vehicle Year</th>
                            <th style="width: 100px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Vehicle Make</th>
                            <th style="width: 200px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Vehicle Model</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Vehicle VIN</th>
                            <th style="width: 50px;"  class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Loan Amount</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Annual Percentage Rate (APR)</th>
                        </tr>
                    </thead>
                    <tbody>
					 <?php
						include 'GetLoanRecordsProc.php';
					 ?>
					 </tbody>
                    </table>
									</div>
								</div>
              </div>
				</div>

</body>
</html>
