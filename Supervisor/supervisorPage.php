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
<link rel="stylesheet" href="CSS\MainPage.css?id=1234">

<title>Web Application Main</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark container-fluid-nav">
            <img src="../Images/bankLogo.png" height="80px" alt="bankLogo">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav" style="">
                <h1 class="text-center title-nav"><?php echo $_SESSION['userlogin'];?>'s Dashboard - Supervisor Level</h1>
              <h4 class= "text-right"> <a href="../LogoutProc.php" class="btn btn-secondary btn-lg active"> <b>Logout</b></a></h4>
            </div>
        </div>
    </nav>


<div class="Assigned_Dealers">
<h2 class = "panel-heading">Assigned Dealerships</h2>
<div class="panel panel-default"> <div class="row"><div class="col-sm-12 col-md-12"><table ui-jq="dataTable"  class="table table-striped b-t b-b dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row" class="font-bold text-center no_border">
                            <th style="width: 150px;" class="sorting_asc no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descendig" aria-sort="ascending">Dealership Name</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Active Loans</th>
                            <th style="width: 100px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Address 1</th>
                            <th style="width: 200px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Address 2</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">City</th>
                            <th style="width: 50px;"  class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">State</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Zip</th>
                            <th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Internal Dealer Score</th>
							<th style="width: 150px;" class="sorting no_border" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Loans</th>
                        </tr>
                    </thead>
                    <tbody>
					 <?php
						include 'GetDealerRecordsProc.php';
					 ?>
					 </tbody>
                    </table>
									</div>
								</div>
              </div>
				</div>

</body>
</html>

<script>
function sendPostAddLoanProc(Dealership_ID,Dealership_Name)  {
	var form = $('<form action="' + '../LoanRequestPage.php' + '" method="post">' +
  '<input type="text" name="Dealership_ID" value="' + Dealership_ID + '" />' +
	'<input type="text" name="Dealership_Name" value="' + Dealership_Name + '" />' +
  '</form>');
$('body').append(form);
form.submit();
}
</script>
<script>
function sendPostViewLoanProc(Dealership_ID)  {
	var form = $('<form action= "../ViewLoanPage.php" method="post">' +
  '<input type="text" name="Dealership_ID" value="' + Dealership_ID + '" />' +
  '</form>');
$('body').append(form);
form.submit();
}
</script>
