<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>
<!-- Visit codeastro.com for more projects -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Expenditure</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/uniform.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->
<!-- Visit codeastro.com for more projects -->
<!--sidebar-menu-->
<?php $page='staff-management'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="staffs.php" class="current">Expenditure</a> </div>
    <h1 class="text-center">Expenditure List <i class="fas fa-briefcase"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <a href="invoice-entry.php"><button class="btn btn-primary">Add Invoice</button></a>
      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Expenditure List</h5>
          </div>
          <div class='widget-content nopadding'>
	  
	  <?php

include "../dbcon.php";
      $qry="select * from invoices";
      $cnt=1;
        $result=mysqli_query($con,$qry);

        
          echo"<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Invoice no</th>
                  <th>paid to</th>
                  <th>Date of invoice</th>
                  <th>Datepaid</th>
                  <th>Reason for  payment</th>
                  <th>Proceed by</th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){
                
            echo"<tbody> 
                <tr class=''>
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['Invoiceno']."</div></td>
                <td><div class='text-center'>".$row['paidto']."</div></td>
                <td><div class='text-center'>".$row['dateofinvoice']."</div></td>
                <td><div class='text-center'>".$row['datepaid']."</div></td>
                <td><div class='text-center'>".$row['reason']."</div></td>
                <td><div class='text-center'>".$row['proceedby']."</div></td>
                <td><div class='text-center'><a href='edit-staff-form.php?id=".$row['Invoiceno']."'>
                <i class='fas fa-edit' style='color:#28b779'></i> Edit |</a> 
                <a href='invoice_delete.php?id=".$row['Invoiceno']."' style='color:#F66;'>
                <i class='fas fa-trash'></i> Remove</a></div></td>
                </tr>
                
              </tbody>";
              $cnt++;
          }
            ?>

            </table>
          </div>
        </div>
   
		
	
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy;Developed By ...</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<!--end-Footer-part-->
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.tables.js"></script>
</body>
</html>
