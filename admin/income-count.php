<?php

include "../dbcon.php";

$sql = "SELECT SUM( amount) FROM members";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM( amount)'];
?><!-- Visit codeastro.com for more projects -->
