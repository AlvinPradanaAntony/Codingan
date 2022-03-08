<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
$connect = mysqli_connect("localhost", "root", "", "system_school");
mysqli_set_charset($connect,"utf8"); 
$result = '';
$query = "SELECT * FROM tble_class_a WHERE 	Date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
$sql = mysqli_query($connect, $query);
$result .='
<table class="table table-bordered">
<tr>
<td>Id</td>
<td>Student Name</td>
 <td >Sex</td>
 <td >Class</td>
 <td >Khmer</td>
 <td >Mathematics</td>       
 <td >Physics</td>
 <td >Chemistry</td>
 <td >Biology</td> 
 <td >English</td> 
 <td >C_Program</td> 
 <td >C++_Program</td> 
 <td >Total_Score</td>
 <td >Average</td>
 <td >Grade</td>  
 <td>Date</td>  
</tr>';
if(mysqli_num_rows($sql) > 0)
{
while($row = mysqli_fetch_array($sql))
{
$result .='
<tr>
<td style="color:red;">'.$row["id"].'</td>
<td style="color:MediumSeaGreen;">'.$row["Student_Name"].'</td>
<td>'.$row["Sex"].'</td>
<td>'.$row["Grand"].'</td>
<td>'.$row["Khmer"].'</td>
<td>'.$row["Mathematics"].'</td>
<td>'.$row["Physics"].'</td>
<td>'.$row["Chemistry"].'</td>
<td>'.$row["Biology"].'</td>
<td>'.$row["English"].'</td>
<td>'.$row["C_Program"].'</td>
<td>'.$row["C++_Program"].'</td>
<td>'.$row["Total_Score"].'</td>
<td>'.$row["Average"].'</td>
<td>'.$row["Grade"].'</td>
<td>'.$row["Date"].'</td>
</tr>';
}
}
else
{
$result .='
<tr>
<td colspan="16">No Date Item Found</td>
</tr>';
}
$result .='</table>';
echo $result;
}
?>
