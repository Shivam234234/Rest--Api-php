<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Include your database configuration file
include "config.php";

// Assuming you are passing an ID for deletion
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["PersonID"])) {
    $id = $data["PersonID"];

    // Perform the delete operation
    $sql = "DELETE FROM student WHERE PersonID = $id";

    // Ensure that the connection is established
    if ($conn) {
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("status" => "true", "message" => "Record deleted successfully"));
        } else {
            echo json_encode(array("status" => "false", "message" => "Failed to delete record. Error: " . mysqli_error($conn)));
        }
    } else {
        echo json_encode(array("status" => "false", "message" => "Database connection failed"));
    }
} else {
    echo json_encode(array("status" => "false", "message" => "PersonID not provided for deletion"));
}

// Close the database connection if it's no longer needed
mysqli_close($conn);

?>
