<?php
$connect = mysqli_connect("localhost", "root", "", "system_school");
mysqli_set_charset($connect,"utf8"); 
$query = "SELECT `id`, `Student_Name`, `Sex`, `Grand`, `Khmer`, `Mathematics`, `English`, `Physics`, `Chemistry`,
 `Biology`, `C_Program`, `C++_Program`, `Total_Score`, `Average`, `Grade`, `Date` FROM `tble_class_a`
"; 
$sql = mysqli_query($connect, $query);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Report Data</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Bayon|Francois+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="script/bootbox.min.js"></script>
<script type="text/javascript" src="script/deleteRecords.js"></script>
</head>
<body>
<br/>
<div>
<h2 align="center" style="font-family: 'Francois One','Bayon'; font-size: 16px;">Report</h2>
<br/>
<form method="post" action="export_Result_Class_A.php" align="center">
<input type="submit" name="export" value="CSV Export" class="btn btn-success" /> 
</form>
<br/>
 
<div class="col-md-2">
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2">
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<input type="button" name="range" id="range" value="Search" class="btn btn-success"/>
 

<div class="clearfix"></div>
<br/>
<div id="purchase_order">
<table class="table table-bordered">
<tr>
<td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Id</td>
<td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Student Name</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Sex</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Class</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Khmer</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Mathematics</td>       
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Physics</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Chemistry</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Biology</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">English</td> 
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">C_Program</td> 
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">C++_Program</td> 
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Total_Score</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Average</td>
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Grade</td>  
 <td style="font-family: 'Francois One','Bayon'; font-size: 16px;">Date</td>  
</tr>
<?php
while($row= mysqli_fetch_array($sql))
{
	?>
    <tr>
    <td style="color:red;"><?php echo $row["id"]; ?></td>
    <td style="color:MediumSeaGreen;"><?php echo $row["Student_Name"]; ?></td>    
    <td><?php echo $row["Sex"]; ?></td>  
    <td><?php echo $row["Grand"]; ?></td>  
    <td><?php echo $row["Khmer"]; ?></td>  
    <td><?php echo $row["Mathematics"]; ?></td>   
    <td><?php echo $row["Physics"]; ?></td>  
    <td><?php echo $row["Chemistry"]; ?></td>   
	<td><?php echo $row["Biology"]; ?></td>  
	<td><?php echo $row["English"]; ?></td>  
	<td><?php echo $row["C_Program"]; ?></td>  
	<td><?php echo $row["C++_Program"]; ?></td>  
    <td><?php echo $row["Total_Score"]; ?></td>  
    <td><?php echo $row["Average"]; ?></td>  
    <td><?php echo $row["Grade"]; ?></td>  
    <td><?php echo $row["Date"]; ?></td>  
    </tr>
    <?php
}
?>
</table>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"Search_Class_A.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
</body>
</html>