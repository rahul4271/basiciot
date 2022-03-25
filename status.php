<?php
include("connect.php");
$status= $_GET['status'];
$queryd="UPDATE time SET status='$status' WHERE id=1";
$datad=mysqli_query($conn,$queryd);
$query = "SELECT * FROM led ";
$data=mysqli_query($conn,$query);
$numrows = mysqli_num_rows($data);
if($numrows>0)
{     
    $querya = "SELECT * FROM led WHERE id=1 ";
    $dataa=mysqli_query($conn,$querya);
    $arraya=mysqli_fetch_assoc($dataa);
    echo $arraya['id'];
    echo $arraya['state'];
    $queryb = "SELECT * FROM led WHERE id=2 ";
    $datab=mysqli_query($conn,$queryb);
    $arrayb=mysqli_fetch_assoc($datab);
    echo $arrayb['id'];
    echo $arrayb['state']; 
    $queryc = "SELECT * FROM led WHERE id=3 ";
    $datac=mysqli_query($conn,$queryc);
    $arrayc=mysqli_fetch_assoc($datac);
    echo $arrayc['id'];
    echo $arrayc['state'];    
}
else
{
    echo "Error in query or no data";    
}
	
?>

