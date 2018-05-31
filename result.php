
<!DOCTYPE html>
<html>
<head>
	<title>Result site </title>
	

</head>
<body>
<form action="result.php" method="get">
    <input type="text"  name="user-keyword" size="120"/>
    <input type="submit" name="result" value="Search"/>
</form>
<a href="localhost/projekt/">Nazad</a>
<?php 
	$conn = mysqli_connect("localhost","root","","search");

if (mysqli_connect_errno("")){
    echo "Nije uspješno spojeno".mysqli_connect_error();}

if(isset($_GET['search'])){
	
	$get_value = $_GET['user-query'];
	
	if($get_value == ''){
		echo "<center>Nema rezultata</center>";

		exit ();
	}

	$result_query = "select * from sites where site_keywords like '%$get_value%'";
	
	$run_result = mysqli_query($conn,$result_query);
	
          
	if(mysqli_num_rows($run_result)<1){


		echo "<center>Nista nije pronadjeno</center>";

		exit ();

	}
	?>
<table class="table table-responsive">
				<th>Id</th>
				<th>Datum i vrijeme</th>
				<th>Kategorija</th>
				<th>Ime autora</th>

<?php 

	$result_query = "select * from sites where site_keywords like '%$get_value%'";
	
	$run_result = mysqli_query($conn,$result_query);
    $No=0;

	while($row_result = mysqli_fetch_array($run_result)){
		$site_title=$row_result['site_title'];
		$site_link=$row_result['site_link'];
		$site_desc=$row_result['site_desc'];
		$site_image=$row_result['site_image'];

		
		$No++;
		}

?>

<tr>

			<td><?php echo $site_title; ?></td>
			<td><?php echo $site_link;?></td>
			<td><?php echo $site_desc;  ?> </td>
			<td> <?php echo $site_image; ?></td>
</tr>
			
<?php } ?>

</table>



	

			
</div>


</body>
</html>


