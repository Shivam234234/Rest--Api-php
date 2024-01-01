<?php 


header('Content-Type: application/json');
header('Access-Control-Allow-origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

if (
    isset($data["PersonID"]) && $data["PersonID"] !== null &&
    isset($data["LastName"]) && $data["LastName"] !== null &&
    isset($data["FirstName"]) && $data["FirstName"] !== null &&
    isset($data["Address"]) && $data["Address"] !== null &&
    isset($data["City"]) && $data["City"] !== null
) {
$PersonID =  $data["PersonID"];
$LastName =  $data["LastName"];
$FirstName = $data["FirstName"];
$Address =   $data["Address"];
$City =      $data["City"];

include "config.php";

$sql = "INSERT INTO student (PersonID, LastName, FirstName, Address, City) VALUES ('{$PersonID}','{$LastName}','{$FirstName}','{$Address}','{$City}')";

if(mysqli_query($conn, $sql)){
echo json_encode(array("status"=> "true","message"=> "Recode are save"));
}else{
echo json_encode(array("status"=> "false","message"=>"Record are faild"));
}
}else{
echo json_encode(array("status" => "false", "message" => "One or more required fields are missing or null"));
}

?>