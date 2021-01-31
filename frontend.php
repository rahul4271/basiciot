<?php
 include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
   <head>
	  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="nishanchettri" content="www.stemduniya.com">
	  <meta http-equiv="Access-Control-Allow-Origin" content="*">
	  
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 
	 <script type="text/javascript">
	 //This script should not be removed
		document.write([
			"\<script src='",
			("https:" == document.location.protocol) ? "https://" : "http://",
			"ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'>\<\/script>" 
		].join(''));
	 </script>
	
		<!--This script is used to reload the page
		Page Reload Script-->
	  </script>
	        <script type="text/javascript">
			function refreshPage(){
					location.reload();
			}
		</script>
		      <style>
dv {
  background-color: lightgrey;
  width: 35px;
  border-radius: 4px ;
  padding: 8px;
  margin: 0px;
}
</style>

      <title>LED control</title>

   </head>
   <body style="background-color: #f8efa4;">


   
   <div class="container card text-center"style="margin-top: 10%;">
	<div class="card-body">
	   
       <form action="" method="get" style="padding-bottom:5px">
              <button type="button" id="D1-on" class="btn btn-outline-success" onclick='refreshPage()'>D1 ON</button>
			  <button type="button" id="D1-off" class="btn btn-outline-danger" onclick='refreshPage()'>D1 OFF</button>
        </form>
        
        <form action="" method="get"  style="padding-top: 5px;padding-bottom:5px ">
              <button type="button" id="D2-on" class="btn btn-outline-success" onclick='refreshPage()'>D2 ON</button>
			  <button type="button" id="D2-off" class="btn btn-outline-danger" onclick='refreshPage()'>D2 OFF</button>
        </form>
        
        
        <form action="" method="get" style="padding-top:5px;padding-bottom:10px">
              <button type="button" id="D3-on" class="btn btn-outline-success" onclick='refreshPage()'>D3 ON</button>
			  <button type="button" id="D3-off" class="btn btn-outline-danger" onclick='refreshPage()'>D3 OFF</button>
        </form>
        
        
          <div class="card-footer text-muted">
            <?php
                $query = "SELECT * FROM led ";
$data=mysqli_query($conn,$query);
$numrows = mysqli_num_rows($data);
if($numrows>0)
{
    $querya = "SELECT * FROM led WHERE id=1 ";
    $dataa=mysqli_query($conn,$querya);
    $arraya=mysqli_fetch_assoc($dataa);
    echo $arraya['id'];
    echo " ";
    // $val1=
    echo $arraya['state'];
    // echo $val1=='N' ? 'ON' : 'OFF'; 
    echo " ";
    $queryb = "SELECT * FROM led WHERE id=2 ";
    $datab=mysqli_query($conn,$queryb);
    $arrayb=mysqli_fetch_assoc($datab);
    echo $arrayb['id'];
    echo " ";
    // $val2=
    echo $arrayb['state']; 
    // echo $val1=='NNN' ? 'ON' : 'OFF'; 
    echo " ";
    $queryc = "SELECT * FROM led WHERE id=3 ";
    $datac=mysqli_query($conn,$queryc);
    $arrayc=mysqli_fetch_assoc($datac);
    echo $arrayc['id'];
    echo " ";
    echo $arrayc['state'];    
    echo " ";
}
else
{
    echo "Error in query or no data";
}
            ?>
          </div>
         </div>
		<br><br>
	 </div>

	
	<script>
		document.getElementById('D1-on').addEventListener('click', function() {
		       //Add your on or off url here
				var url = "https://basiciot.000webhostapp.com/led/update.php?state=ON&id=1";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		document.getElementById('D1-off').addEventListener('click', function() {
				var url = "https://basiciot.000webhostapp.com/led/update.php?state=OFF&id=1";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
			document.getElementById('D2-on').addEventListener('click', function() {
		       //Add your on or off url here
				var url = "https://basiciot.000webhostapp.com/led/update.php?state=ON&id=2";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		document.getElementById('D2-off').addEventListener('click', function() {
				var url = "https://basiciot.000webhostapp.com/led/update.php?state=OFF&id=2";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		document.getElementById('D3-on').addEventListener('click', function() {
		       //Add your on or off url here
				var url = "https://basiciot.000webhostapp.com/led/update.php?state=ON&id=3";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});
		
		document.getElementById('D3-off').addEventListener('click', function() {
				var url = "https://basiciot.000webhostapp.com/led/update.php?state=OFF&id=3";
				$.getJSON(url, function(data) {
					console.log(data);
				});
		});	
	</script>

	
    </body>
    

</html>