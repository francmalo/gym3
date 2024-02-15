<?php

include(__DIR__.'/../../dbcon.php');
$sql = "SELECT * FROM members WHERE status ='Active'";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>
