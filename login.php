<?php
$servername = "localhost";
$username = "root";
$password = "mahantswami1933";
$database = "adsbot";
$conn =  new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo ("can't connect to database");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo ("connected");
    $deviceId = $_POST["deviceId"];

    $sql = "SELECT deviceId from device where deviceId = '$_POST[deviceId]' ";

    $response = $conn->query($sql);

    if ($response) {
        if ($response->num_rows > 0) {
            $isset = setcookie("DeviceId", $deviceId, time() + 365 * 24 * 60 * 60);
            echo json_encode(["success" => true, "message" => "Device ID found"]);
            echo "is set cookie? " . $isset . "<br>";
            echo "cookie value: " . $_COOKIE["DeviceId"] . "<br>";
            while ($row = $response->fetch_assoc()) {
                echo "<h3>" . "deviceId: " . $row["deviceId"] . "<h3>" . "<br>";
            }

            echo json_encode("cookies" . $_COOKIE["DeviceId"]);

            // header('Location: dashKOboard.html');
        } else {
            echo json_encode(["success" => false, "message" => "No matching device ID found"]);
        }
    }
} else {
    echo json_encode(["success" => false, "message" => "Query execution error: " . $conn->error]);
}

$conn->close();
