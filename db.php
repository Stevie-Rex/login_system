<?php
$con = mysqli_connect("localhost", "stevie", "Yukinagato1@", "loginsystem");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

echo "Connected successfully";
?>
```