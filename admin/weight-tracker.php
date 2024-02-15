<?php

// Connect to the db
$db = new mysqli('localhost','root','safaricom','gymnsb');

// Check form submitted
if(isset($_POST['submit'])) {

  // Get member details
  $sql = "SELECT * FROM members WHERE user_id = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('i', $_POST['user_id']);
  $stmt->execute(); 
  $stmt->bind_result($user_id, $fullname);
  $stmt->fetch();

  // Update weight 
  $weight = $_POST['weight'];
  $sql = "INSERT INTO weight_log(user_id, weight, entry_date) 
          VALUES(?, ?, CURDATE())";
  
  $stmt = $db->prepare($sql);
  $stmt->bind_param('id', $user_id, $weight);
  $stmt->execute();
  
  echo "Weight updated!";

} else {

  // Output form
  echo "<form method='post'>";
  echo "Member: <select name='user_id'>";
  
  // List members
  $sql = "SELECT * FROM members";
  $result = $db->query($sql);
  
  while($row = $result->fetch_assoc()) {
    echo "<option value='{$row['user_id']}'>{$row['fullname']}</option>";
  }
  
  echo "</select>";
  
  echo "Weight: <input type='text' name='weight'/>";
  echo "<button type='submit' name='submit'>Update</button>";
  echo "</form>";
}

?>