<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');
}
?>
<!-- Visit codeastro.com for more projects -->
<?php

            if(isset($_POST['name'])){
            $name = $_POST["name"];
            $username = $_POST["username"];
            $gender = $_POST["gender"];
            $contact = $_POST["contact"];
            $address = $_POST["address"];
            $designation = $_POST["designation"];
            $email = $_POST["email"];
            $nationalid = $_POST["nationalid"];
            $payrollno = $_POST["payrollno"];
           
            $user_id = $_POST["user_id"];
            // <!-- Visit codeastro.com for more projects -->
            include_once '../dbcon.php';
            //code after connection is successfull
            //update query
            $qry = "update admin set name='$name', username='$username', gender='$gender', contact='$contact',  address='$address', designation='$designation',email='$email',payrollno='$payrollno',nationalid='$nationalid' where user_id='$user_id'";
            $result = mysqli_query($con,$qry); //query executes

            if(!$result){
                echo"ERROR!!";
            }else {

                header('Location:staffs.php');

            }

            }else{
                echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
            }
?>
