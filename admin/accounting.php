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
<title>Gym System Admin</title>
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
<?php $page='accounting'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="accounting.php" class="current">Staff Members</a> </div>
    <h1 class="text-center">GYM's Staff List <i class="fas fa-briefcase"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>


    <?php
// Connect to the database
$db = mysqli_connect("localhost", "username", "password","transactions");

// SQL to create tables
$sql = "CREATE TABLE income (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date DATE, 
  description VARCHAR(255),
  amount DECIMAL(10,2)
)";

$sql .= "CREATE TABLE expenses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date DATE,
  description VARCHAR(255),
  amount DECIMAL(10, 2)  
)";

mysqli_multi_query($db, $sql);


// Insert income record
if(isset($_POST['income_desc']) && isset($_POST['income_amount'])) {

  $date = date('Y-m-d'); 
  $desc = $_POST['income_desc'];
  $amount = $_POST['income_amount'];

  $sql = "INSERT INTO income(date, description, amount) 
          VALUES ('$date', '$desc', $amount)";
  
  mysqli_query($db, $sql);

}


// Insert expense record
if(isset($_POST['expense_desc']) && isset($_POST['expense_amount'])) {

  $date = date('Y-m-d');
  $desc = $_POST['expense_desc']; 
  $amount = $_POST['expense_amount'];

  $sql = "INSERT INTO expenses(date, description, amount) 
          VALUES ('$date', '$desc', $amount)";
  
  mysqli_query($db, $sql);
  
}


// Get income total
function total_income($db) {
  $sql = "SELECT SUM(amount) AS total FROM income";  
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['total'];
}


// Get expense total
function total_expenses($db) {
  $sql = "SELECT SUM(amount) AS total FROM expenses";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['total'];  
}

// Calculate profit 
$income = total_income($db);
$expenses = total_expenses($db);
$profit = $income - $expenses;

?>

<!-- HTML Form -->

<form method="POST">

  Income: <input name="income_desc"> 
  <input name="income_amount" type="number">
  <input type="submit" value="Add Income">

</form>

<form method="POST">

  Expense: <input name="expense_desc">
  <input name="expense_amount" type="number"> 
  <input type="submit" value="Add Expense">

</form>


<!-- Display Results -->

<h3>Profit & Loss Statement</h3>
Total Income: <?php echo $income; ?> <br>
Total Expenses: <?php echo $expenses; ?> <br> 
Net Profit: <?php echo $profit; ?>





    <!-- <div class="row-fluid">
      <div class="span12">
        <a href=""><button class="btn btn-primary">Add Staff Members</button></a>
      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Staff table</h5>
          </div>
          <div class='widget-content nopadding'> -->
<!-- 	  
	  <php

      include "dbcon.php";
      $qry="select * from staffs";
      $cnt=1;
        $result=mysqli_query($con,$qry);

        
          echo"<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Gender</th>
                  <th>Designation</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Actions</th>
                </tr>
              </thead>";
               -->
            <!-- while($row=mysqli_fetch_array($result)){
            
            echo"<tbody> 
                <tr class=''>
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['fullname']."</div></td>
                <td><div class='text-center'>@".$row['username']."</div></td>
                <td><div class='text-center'>".$row['gender']."</div></td>
                <td><div class='text-center'>".$row['designation']."</div></td>
                <td><div class='text-center'>".$row['email']."</div></td>
                <td><div class='text-center'>".$row['address']."</div></td>
                <td><div class='text-center'>".$row['contact']."</div></td>
                <td><div class='text-center'><a href='edit-staff-form.php?id=".$row['user_id']."'><i class='fas fa-edit' style='color:#28b779'></i> Edit |</a> <a href='remove-staff.php?id=".$row['user_id']."' style='color:#F66;'><i class='fas fa-trash'></i> Remove</a></div></td>
                </tr>
                
              </tbody>";
              $cnt++;
          }
            ?> -->
<!-- 
            </table>
          </div>
        </div>
    -->
		
<!-- 	
      </div>
    </div>
  </div> -->
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
