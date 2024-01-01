<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-origin: *');

$data = json_decode(file_get_contents("php://input"), true);

$search_value = $data["search"];

include "config.php";

$sql = "SELECT  * From student  WHERE FirstName Like '%{$student_id}%'";

$result = mysqli_query($conn , $sql) or die ("Sql Query Failed");

if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_all($result , MYSQLI_ASSOC);
    
    echo json_encode($row) ;
   echo" <br> ";
  

}else{

    echo json_encode(array('massage'=>'No Recode Found.','stauts'=> 'false'));
    
}


?>