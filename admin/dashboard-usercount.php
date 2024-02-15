<?php

include_once '../dbcon.php';

$sql = "SELECT * FROM members";
                $query = $con->query($sql);

                echo "$query->num_rows";
?><!-- Visit codeastro.com for more projects -->
