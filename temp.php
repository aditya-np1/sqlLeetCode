<?php
$servername = "localhost";
$username = "root";
$password = "mahantswami1933";
$database = "adsbot"; 
$conn =  new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    echo("can't connect to database");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo("connected");
    $deviceId = $_POST["deviceId"];

    $sql = "SELECT deviceId from device where deviceId = $deviceId";

    $response = $conn->query($sql);


if ($response) {
    if($response->num_rows > 0){
        session_start();
        // $_SESSION["time"] = time();
        setcookie("DeviceId", "$deviceId", time() + 365 * 24 * 60 * 60);
        // $netTime = time() - $_SESSION["time"];
        echo json_encode($_COOKIE["DeviceId"]);
    } else {
        echo json_encode(["success" => false, "message" => "No matching device ID found"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Query execution error: " . $conn->error]);
}
    
}
$conn->close();