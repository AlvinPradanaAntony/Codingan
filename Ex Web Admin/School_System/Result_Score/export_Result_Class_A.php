<?php  
header('Access-Control-Allow-Origin: *');
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "system_school");
      mysqli_set_charset($connect,"utf8");
      $cfg['ExecTimeLimit'] = 100000;
      header('Content-Encoding: UTF-8');
      header('Content-Type: text/csv; charset=UTF-8');  
      header('Content-Disposition: attachment; filename=Report.csv');  
      $output = fopen("php://output", "w");
      // In Excel or CSV  
      fputcsv($output, array('Id','Student Name','Sex','Class','Khmer','Mathematics', 'Physics','Chemistry',
     'Biology', 'English', 'C_Program', 'C++_Program',
     'Total_Score','Average','Grade​','Date',));  
      //Query to CSV
      $query = "SELECT `id`, `Student_Name`, `Sex`, `Grand`, `Khmer`, `Mathematics`, `English`, `Physics`, `Chemistry`,
      `Biology`, `C_Program`, `C++_Program`, `Total_Score`, `Average`, `Grade`, `Date` FROM `tble_class_a`
     "; 
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  
