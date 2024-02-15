<?php

include(__DIR__.'/../../dbcon.php');

$sql = "SELECT SUM( amount) FROM equipment";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM( amount)'];
?>
