<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"hamro_kishan");

    $Name=trim($_POST['Name']);
    $Email=trim($_POST['Email']);
    $Password=trim($_POST['Password']);
    $Mobile=trim($_POST['Mobile']);
    $Address=trim($_POST['Address']);

$qry="select * from tbl_uer where email='$Email' ";
$raw=mysqli_query($conn,$qry);
    $count=mysqli_num_rows($raw);
     if($count>0)
     {
            $response['message']='exist';
     }
     else
     {
            $qry2="INSERT INTO `tbl_user` (`id`, `Name`, `Email`, `Password`, `Mobile`, `Address`) 
            VALUES (NULL, '$Name', '$Email', '$Password', '$Mobile', '$Address')";
            $res=mysqli_query($conn,$qry2);
            if($res==true)
                $response['message']='inserted';
            else
                $response['message']='failed';
     }
            
    echo json_encode($response); 

?>