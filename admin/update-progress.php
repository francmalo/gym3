
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
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>
<!--close-Header-part--> 
<!-- Visit codeastro.com for more projects -->

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

<!--sidebar-menu-->
<?php $page='manage-customer-progress'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<?php
include '../dbcon.php';
$id=$_GET['id'];
$qry = "SELECT * FROM members WHERE user_id='$id'";
$result = mysqli_query($con, $qry);
$member = mysqli_fetch_assoc($result);

// Insert weight if submitted
// if (isset($_POST['weight'])) {
//     $user_id = $_POST['id'];
//     $weight = $_POST['weight'];

//     $sql = "INSERT INTO weight_log(user_id, weight, entry_date)  
//             VALUES ($user_id, $weight, CURDATE())";

//     mysqli_query($con, $sql);
// }

if ($_POST) {

  // Validation & insert
  $weight = validate_input($_POST['weight']);

  if (!empty($weight)) {

      $sql = "INSERT INTO weight_log(user_id, weight, entry_date)  
          VALUES ({$member['user_id']}, $weight, CURDATE())";

      if (mysqli_query($con, $sql)) {
          echo '<script>
                  if (window.history.replaceState) {
                      window.history.replaceState(null, null, window.location.href);
                  }
                  alert("Weight entered successfully");
                  location.reload();
                </script>';
          exit();
      }
  }
}


// Validation function
function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="customer-progress.php">Customer Progress</a> <a href="#" class="current">Update Progress</a> </div>
    <h1 class="text-center">Update Customer's Progress <i class="fas fa-signal"></i></h1>
  </div>
  
  
  <div class="container-fluid" style="margin-top:-38px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-signal"></i> </span>
            <h5>Progress </h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              
			  <div class="span2"></div>
			  
              <div class="span8">
                <table class="table table-bordered table-invoice">
				
                  <tbody>

                  
        


                  <?php if(!empty($success_msg)){ ?>
   <div class="alert alert-success">
     <?php echo $success_msg; ?>
   </div>
   
   <?php
     $success_msg = "";  
   ?>
<?php } ?>

				  <form method="POST">
                    <tr>
                    <tr>
                      <td class="width30">Member's Fullname:</td>
                      <td class="width70"><strong><?php echo $member['fullname']; ?></strong></td>
                    </tr>
                    <tr>
                      <td>Service Taken:</td>
                      <td><strong><?php echo $member['services']; ?></strong></td>
                    </tr>
                    <tr>
  <td>Enter Weight:</td>
  <td>
    <input type="number" step="0.01" name="weight"> 
  </td>  
</tr>
                  
              </div>
			  
                      </td>
					  
					  <tr>
                     
                    </tr>

              </div>
			  

                      </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
			  
			  
            </div> <!-- row-fluid ends here -->
			
			
            <div class="row-fluid">
              <div class="span12">
                
				
			
                <div class="text-center">
                  <!-- user's ID is hidden here -->
             <input type="hidden" name="id" value="<?php echo $member['user_id'];?>">
                  <button class="btn btn-primary btn-large" type="submit" href="">Save Weight</button> 
				</div>
				  
     
				  </form>
              </div><!-- span12 ends here -->
            </div><!-- row-fluid ends here -->
            </div><!-- widget-content ends here -->
            <?php

// Query to get weight log for this user
$weight_log_sql = "SELECT * FROM weight_log WHERE user_id = {$member['user_id']} ORDER BY entry_date DESC";

$weight_result = mysqli_query($con, $weight_log_sql);

?>
            <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Date</th>
      <th>Weight (kg)</th>
    </tr>
  </thead>
  
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($weight_result)): ?>

    <tr>
      <td><?php echo date('M d, Y', strtotime($row['entry_date'])); ?></td>
      <td><?php echo number_format($row['weight'], 2); ?></td>
    </tr>

  <?php endwhile; ?>
  
  </tbody>
</table>
  
  </tbody>
</table>
 
       
		  
		  
        </div><!-- widget-box ends here -->
      </div><!-- span12 ends here -->

      <?php

// Query to get weight log for this user
$weight_log_sql = "SELECT *, DATE_FORMAT(entry_date,'%d %b %Y') AS entry_date FROM weight_log WHERE user_id = {$member['user_id']} ORDER BY entry_date";

$result = mysqli_query($con, $weight_log_sql);

$weights = array();
$dates = array();

while ($row = mysqli_fetch_assoc($result)) {
  $weights[] = $row['weight'];
  $dates[] = $row['entry_date']; 
}

?>

<canvas id="weight-chart"></canvas>

<script>
var ctx = document.getElementById("weight-chart");

var weightChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($dates); ?>,
    datasets: [{ 
        data: <?php echo json_encode($weights); ?>,
        borderColor: "#458af7",
        fill: false
      }]
  },
  options: {
    title: {
      display: true,
      text: 'Weight Progress Chart'
    }
  }
});
</script>


    </div> <!-- row-fluid ends here -->
  </div> <!-- container-fluid ends here -->
</div> <!-- div id content ends here -->



<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By Zinjara</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 


</body>
</html>