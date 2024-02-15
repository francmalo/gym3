<?php

include(__DIR__.'/../../dbcon.php');

$sql = "SELECT * FROM announcements";
                $query = $con->query($sql);

                echo "$query->num_rows";
?><!-- Visit codeastro.com for more projects -->
