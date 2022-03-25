<?php
include("connect.php");
$light=strtoupper($_GET['state']);
$id=$_GET['id'];
if($light!="")
{
  $query="UPDATE led SET state='$light' WHERE id=$id";
  $data=mysqli_query($conn,$query);
  // connection variable, query variable
  if($data)
  {
    // echo $id;
    // echo ($light);
  
  }
}
else {
  echo "Parameters empty";
}

 ?>
